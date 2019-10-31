<?php
namespace app;

use app\Common\Checksystem;
use app\Common\DbService;
use app\Message;
use app\Packet\OpCode;
use app\Reflection;
use app\Socket\SwooleTcp;
use core\lib\Cache;
use app\Auth\User;

/**
 * service
 */
class Server
{
    public static $clientparam = [];
    public static $ServerConfig;

    public $active;

    /**
     * [start 开始]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2019-04-19
     * ------------------------------------------------------------------------------
     * @return  [type]          [description]
     */
    public function start()
    {
        Checksystem::check();

        $GetServerInfos = DbService::Execution('GetServerInfos');

        User::Offline();//全部下线

        self::$ServerConfig = $GetServerInfos[0];

        $str = "

    MMMMMMMM       MMMM    MMMM     MMM     MMMMMMMMM        MMMMM
    MMM   MMM      MMMM   MMMMM     MMM     MMM   MMMM      MMM MMM
    MMM    MMM     MMMM   MMMMM     MMM     MMM    MMM     MMM   MMM
    MMM    MMM     MMMMM  MMMMM     MMM     MMM    MMM           MMM
    MMM    MMM     MMMMM MMMMMM     MMM     MMM    MMM          MMMM
    MMM   MMM      MMMMM MMMMMM     MMM     MMM   MMMM          MMM
    MMMMMMMM       MMMMMMMM MMM     MMM     MMMMMMMM           MMMM
    MMM            MMMMMMMM MMM     MMM     MMM  MMMM         MMMM
    MMM            MMM MMMM MMM     MMM     MMM   MMM        MMMM
    MMM            MMM MMM  MMM     MMM     MMM    MMM      MMM
    MMM            MMM      MMM     MMM     MMM    MMM     MMMM
    MMM            MMM      MMM     MMM     MMM    MMMM    MMMMMMMMM
        ";
        WORLD_LOG($str);
        WORLD_LOG('Server version 1.0.1');
        WORLD_LOG('author by.fan <fan3750060@163.com>');
        WORLD_LOG('Gameversion: ' . self::$ServerConfig['gameversion']);
        WORLD_LOG('bind login server port:' . self::$ServerConfig['login_server_ip'] . ' ' . self::$ServerConfig['login_server_port']);
        WORLD_LOG('bind world server port:' . self::$ServerConfig['game_server_ip'] . ' ' . self::$ServerConfig['game_server_port']);

        // 初始状态
        $this->active = true;

        $this->runAuthServer();
    }

    /**
     * [runAuthServer 运行服务器]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2019-04-19
     * ------------------------------------------------------------------------------
     * @return  [type]          [description]
     */
    public function runAuthServer()
    {
        if ($this->active) {

            $other = [
                [
                    'addr' => '0.0.0.0',
                    'port' => self::$ServerConfig['game_server_port'],
                    'type' => SWOOLE_SOCK_TCP,
                ],
            ];

            $this->serv = SwooleTcp::Listen('0.0.0.0', self::$ServerConfig['login_server_port'], new self(), $other);

            Cache::drive('redis')->delete('checkconnector');
        } else {
            WORLD_LOG('Error: Did not start the service according to the process...');
        }
    }

    /**
     * Server启动在主进程的主线程回调此函数
     *
     * @param unknown $serv
     */
    public function onStart($serv)
    {
        // 设置进程名称
        @cli_set_process_title("wow_mir2_master");
        WORLD_LOG("Start");
    }

    /**
     * 有新的连接进入时，在worker进程中回调
     *
     * @param swoole_server $serv
     * @param int $fd
     * @param int $from_id
     */
    public function onConnect($serv, $fd, $from_id)
    {
        if (!OpCode::$OpCodeMap) {
            OpCode::LoadOpCode(); //载入操作码
        }

        $this->clearcache($fd);

        WORLD_LOG("Client {$fd} connect");

        Server::$clientparam[$fd]['state'] = 1; //初始化状态

        Connection::saveCheckConnector($fd); //保存连接到待检池
    }

    /**
     * 接收到数据时回调此函数，发生在worker进程中
     *
     * @param swoole_server $serv
     * @param int $fd
     * @param int $from_id
     * @param var $data
     */
    public function onReceive($serv, $fd, $from_id, $data)
    {
        WORLD_LOG("Get Message From Client {$fd}");

        Connection::update_checkTable($fd);

        $info = $serv->connection_info($fd, $from_id);

        if ($info['server_port'] == self::$ServerConfig['login_server_port']) {
            (new Message())->serverreceive($serv, $fd, $data);

        } elseif ($info['server_port'] == self::$ServerConfig['game_server_port']) {
            (new Message())->serverreceive($serv, $fd, $data);
        }

        WORLD_LOG("Continue Handle Worker");
    }

    /**
     * TCP客户端连接关闭后，在worker进程中回调此函数
     *
     * @param swoole_server $serv
     * @param int $fd
     * @param int $from_id
     */
    public function onClose($serv, $fd, $from_id)
    {
        //清空用户信息
        $this->clearcache($fd);

        // 将连接从连接池中移除
        Connection::removeConnector($fd);
        WORLD_LOG("Client {$fd} close connection\n");
    }

    /**
     * 此事件在worker进程/task进程启动时发生
     *
     * @param swoole_server $serv
     * @param int $worker_id
     */
    public function onWorkerStart($serv, $worker_id)
    {
        WORLD_LOG("onWorkerStart");

        if ($worker_id == 0) {
            if (!$serv->taskworker) {
                $serv->tick(5000, function ($id) use ($serv) {
                    $this->tickerEvent($serv);
                });
            } else {
                $serv->addtimer(5000);
            }

            WORLD_LOG("start timer finished");
        }
    }

    /**
     * 定时任务
     *
     * @param swoole_server $serv
     */
    public function tickerEvent($serv)
    {
        Connection::clearInvalidConnection($serv);
    }

    //清空redis
    public function clearcache($fd)
    {
        WORLD_LOG("Clear Cache");

        if(!empty(Server::$clientparam[$fd]['UserInfo']))
        {
            User::Offline(Server::$clientparam[$fd]['UserInfo']['id']);//下线
        }

        Server::$clientparam[$fd] = [];
        unset(Server::$clientparam[$fd]);
    }

    public function onTask($serv, $task_id, $workd_id, $data)
    {
        WORLD_LOG("Task working... worker_id: " . $workd_id . " task_id: " . $task_id);

        Reflection::LoadClass($data['opcode'], $serv, $data['data']['fd'], $data['data']);

        return $data;
    }

    public function onFinish($serv, $task_id, $data)
    {
        WORLD_LOG('Task Finished task_id: ' . $task_id);

        if (!empty($data['callback'])) {
            Reflection::LoadClass($data['callback'], $serv, $data['data']['fd'], $data['data']);
        }
    }
}
