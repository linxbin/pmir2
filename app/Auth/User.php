<?php
namespace app\Auth;

use app\Packet\PacketHandler;
use app\Packet\ServerState;
use app\Server;
use core\query\DB;

/**
 *  账户操作
 */
class User
{
    //注册新用户
    public static function AddNewUser($serv, $fd, $data = null)
    {
        $params = [];
        $num    = 0;
        $maxnum = 20; //mmp,各种版本字段排序都不一样

        //解密
        for ($i = 0; $i < count($data); $i++) {
            if ($num >= $maxnum) {
                break;
            }

            if ($data[$i] > 0) {
                $param    = ToStr(array_slice($data, $i + 1, $data[$i]));
                $param    = mb_convert_encoding($param, 'utf8', 'GB2312');
                $params[] = $param;
                $i += $data[$i];
                $num++;
            }
        }

        //检查用户重复
        if (DB::table('users')->where(['username' => $params[0]])->find()) {
            $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_NEWID_FAIL, 0, 0, 0, 0);
        } else {
            $UserInfo = [
                'username'  => $params[0],
                'password'  => sha1($params[0] . ':' . $params[1]),
                'name'      => $params[2],
                'cert'      => $params[3],
                'question1' => $params[4],
                'answer1'   => $params[5],
                'email'     => $params[6],
                'question2' => $params[7],
                'answer2'   => $params[8],
                'birthday'  => $params[9],
            ];

            if (DB::table('users')->insert($UserInfo)) {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_NEWID_SUCCESS, 0, 0, 0, 0);
            } else {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_NEWID_FAIL, 0, 0, 0, 0);
            }
        }

        return PacketHandler::Encode($EncodeHeader);
    }

    //修改密码
    public static function ChangePassWord($serv, $fd, $data = null)
    {
        $params = explode("\t", ToStr($data));

        $where = [
            'username' => $params[0],
            'password' => sha1($params[0] . ':' . $params[1]),
        ];

        if (DB::table('users')->where($where)->find()) {
            $UserInfo = [
                'password' => sha1($params[0] . ':' . $params[2]),
            ];

            if (DB::table('users')->where($where)->update($UserInfo) !== false) {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_CHGPASSWD_SUCCESS, 0, 0, 0, 0);
            } else {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_CHGPASSWD_FAIL, 0, 0, 0, 0);
            }
        } else {
            $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_CHGPASSWD_FAIL, 0, 0, 0, 0);
        }

        return PacketHandler::Encode($EncodeHeader);
    }

    //登录
    public static function UserLogin($serv, $fd, $data = null)
    {
        $params = explode("/", ToStr($data));

        $where = [
            'username' => $params[0],
        ];

        if (DB::table('users')->where($where)->find()) {
            $where['password'] = sha1($params[0] . ':' . $params[1]);

            if ($info = DB::table('users')->where($where)->find()) {

                if ($info['wrongpwdtimes'] >= config('maxlogintimes')) {
                    $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_PASSWD_FAIL, ServerState::WrongPwd3Times, 0, 0, 0);
                } elseif ($info['online'] == 1) {
                    $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_PASSWD_FAIL, ServerState::AlreadyLogin, 0, 0, 0);
                } elseif ($info['belock'] == 1) {
                    $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_PASSWD_FAIL, ServerState::BeLock, 0, 0, 0);
                } else {
                    Server::$clientparam[$fd]['UserInfo'] = $info; //保存数据

                    $UserInfo = [
                        'online'    => 1,
                        'logintime' => date('Y-m-d H:i:s'),
                        'loginip'   => $serv->getClientInfo($fd)['remote_ip'],
                    ];

                    go(function () use ($where, $UserInfo) {
                        //更新
                        DB::table('users')->where($where)->update($UserInfo);
                    });

                    //获取服务器列表
                    $ServerInfoList = DB::table('server_infos')->select();

                    $body = '';
                    foreach ($ServerInfoList as $k => $v) {
                        $body .= $v['name'] . '/' . $v['id'] . '/';
                    }

                    $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_PASSOK_SELECTSERVER, 0, 0, 0, count($ServerInfoList));

                    return array_merge(PacketHandler::Encode($EncodeHeader), PacketHandler::Encode($body));
                }
            } else {
                $username = $params[0];
                go(function () use ($username) {
                    //记录密码错误次数
                    $sql = 'update users set wrongpwdtimes = wrongpwdtimes + 1 where username="' . $username . '"';
                    DB::table('users')->query($sql);
                });

                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_PASSWD_FAIL, ServerState::WrongPwd, 0, 0, 0);
            }
        } else {
            $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_ID_NOTFOUND, ServerState::UserNotFound, 0, 0, 0);
        }

        return PacketHandler::Encode($EncodeHeader);
    }

    //下线
    public static function Offline($UserId = null)
    {
        if ($UserId) {
            $where = [
                'id' => $UserId,
            ];

            $UserInfo = [
	            'online' => 0,
	        ];

	        go(function () use ($where, $UserInfo) {
	            DB::table('users')->where($where)->update($UserInfo);
	        });
        }else{
        	go(function (){
        		$sql = 'update users set online = 0';
	            DB::table('users')->query($sql);
	        });
        }
    }

    //密码找回
    public static function GetBackPassWord($serv, $fd, $data = null)
    {
        $params = explode("\t", ToStr($data));

        $where = [
            'username'  => $params[0],
            'question1' => $params[1],
            'answer1'   => $params[3],
            'question2' => $params[4],
            'answer2'   => $params[5],
            'birthday'  => $params[6],
        ];

        if (DB::table('users')->where($where)->find()) {
            $UserInfo = [
                'password' => sha1(123456 . ':' . 123456), //重置密码为123456
            ];

            if (DB::table('users')->where($where)->update($UserInfo) !== false) {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_GETBACKPASSWD_SUCCESS, 0, 0, 0, 0);
            } else {
                $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_GETBACKPASSWD_FAIL, 0, 0, 0, 0);
            }
        } else {
            $EncodeHeader = PacketHandler::PacketHeader(ServerState::SM_GETBACKPASSWD_FAIL, 0, 0, 0, 0);
        }

        return PacketHandler::Encode($EncodeHeader);
    }
}
