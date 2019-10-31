<?php
namespace app;

use app\Packet\OpCode;
use app\Packet\PacketHandler;
use app\Reflection;

class Message
{
    //消息分发
    public function serverreceive($serv, $fd, $data)
    {
        if (!empty($data)) {

            $packArray = explode('!', $data);
            $packArray = array_filter($packArray);

            //拆包
            foreach ($packArray as $k => $v) {
                $pack = $v . '!';

                $decodePacket = PacketHandler::Decode($pack);

                if (env('MSG_DEBUG', false)) {
                    AUTH_LOG('Receive:' . $pack, 'info');
                    AUTH_LOG("Receive: " . json_encode($decodePacket, JSON_UNESCAPED_UNICODE), 'info');
                }

                $this->handlePacket($serv, $fd, $decodePacket, Server::$clientparam[$fd]['state']);
            }
        }
    }

    //根据当前ClientState处理传入的数据包
    public function handlePacket($serv, $fd, $data, $state)
    {
        Reflection::LoadClass(OpCode::GetOpCode($data['Header']['Protocol'], $fd), $serv, $fd, $data['Data']);
    }

}
