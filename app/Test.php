<?php
namespace app;
use app\Packet\PacketHandler;
use app\Packet\HUtil32;
use app\Queue\RedisQueue;
use app\Packet\ServerState;
use app\Common\Srp6;
use app\Auth\User;

class Test
{
    public function run()
    {
        // var_dump(sha1('test:admin'));die;
        // $data = '#7Dfc_IYDC<<<<<<<<=CMaXsL<<<<<<<<@YBQoY<<<<<<<<<OQmX_y<<<<<<<<<<<<<<<<<<<<<<trIO<mH?@iHOLqIO@mHL<<<<<<<<<<<<<<<<<<<<SJnho^HL<<<<<<<<<<<<<<<<<<<<RpxG>tHL<<<<<<<<<NUbAjHoXqH?<rH@<mI_HjTryi<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<=XwFoJDn<<<<<<<<<<<<<<<<<<<<=WOlhG\n<<<<<<<<<<dmJO`lGo<mGo<m<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<!';
        // $decodePacket = PacketHandler::Decode($data);
        // var_dump(json_encode($decodePacket));
        // User::AddNewUser(1,2,$decodePacket['Data']);die;

    	// $DefMsg = PacketHandler::PacketHeader(ServerState::SM_NEWID_SUCCESS, 0, 0, 0, 0);
     //    $data = PacketHandler::Encode($DefMsg);
    	// var_dump(ToStr($data));die;

        $data = '#3^VqG[T`O<<<<<<<<IoXtJO<nJ@E=L_<pJO`mLoQ=H?@tI`LlMPDmHo\sMOHkH_<mJNplInplIL!';
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);die;

        $data = '#0<<<<<HTG<L<<<<<<!';//连接 recv:&{{0 3014 1 0 0} }
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);

    	$data = '#1tcJ@wIDC<<<<<<<<=CMaXsL<<<<<<<<ATRMiVRt<<<<<<<MjTRqa<<<<<<<<<<<<<<<<<<<<<<trIO<mH?@iHOLqIO@mHL<<<<<<<<<<<<<<<<<<<<UsURupVO@<<<<<<<<<<<<<<<<<<<UdYRa`TO@<<<<<<<<DZRyqZBa]WbX<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<=cYaWcMeH\<<<<<<<<<<<<<<<<<<=b]qVRM]H\<<<<<<<<dmJO`lGo<sGo@n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<!'; //注册 &{{-326863902 2002 0 0 0} test admin name  650101-1455111 wenti1 huida1 youxiang wenti2 huida2 1990/07/12 }
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);

        $data = '#2biLVgYHC<<<<<<<<YBQoY<a]UBqeW\`mH_HpIOTE>L!';//修改密码 &{{-1390750566 2003 0 0 0} test  admin   123456          }
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);
        
        $data = '#3pg?M?I@C<<<<<<<<YBQoY>y]UBqeW^xsIo\uH?DtL`A>H?LuJOA?IP@lHO\rM?=AL_@oJ?YAHl!';//登录 &{{215068882 2001 0 0 0} test/admin/7789028BAB04991C5A0186D0EB1387E3}
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);
        
        $data = '#7pwP^DIdC<<<<<<<<TRMiVRtEHL`m>O@EHL`mJO`uGo@mGo@m>L`!'; //找回密码 2010
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);

        $data = '#3^VqG[T`O<<<<<<<<IoXtJO<nJ@E=L_<pJO`mLoQ=H?@tI`LlMPDmHo\sMOHkH_<mJNplInplIL!';//获取英雄 5001
        $decodePacket = PacketHandler::Decode($data);
        var_dump($decodePacket);
    }

}

