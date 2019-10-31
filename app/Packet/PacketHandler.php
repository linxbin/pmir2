<?php
namespace app\Packet;

/**
 *  数据包加解密管理器
 */
class PacketHandler
{

    private static $decode6BitMask      = [0xfc, 0xf8, 0xf0, 0xe0, 0xc0];
    private static $DEFAULT_PACKET_SIZE = 12;
    private static $CONTENT_SEPARATOR   = '/';

    //加密
    public static function Encode($packet = '')
    {
        return self::Encode6BitBytes(GetBytes($packet));
    }

    //解密
    public static function Decode($packet = '')
    {
        $packetIndex = substr($packet, 1, 1);
        echolog('PacketIndex:' . $packetIndex, 'info');

        $packet      = substr($packet, 2, strlen($packet) - 1);
        $decodeFrame = self::Decode6BitBytes(GetBytes($packet));

        $packet = [];
        if (count($decodeFrame) > 2 && $decodeFrame[0] == GetBytes('*') && $decodeFrame[1] == GetBytes('*')) {
            $packet['Header']['Protocol'] = 65001;
            $data                         = array_slice($decodeFrame, 2);
            $packet['Data']               = $data;
        } else {
            $packet['Header'] = self::UnPacketHeader(array_slice($decodeFrame, 0, self::$DEFAULT_PACKET_SIZE));
            $data             = array_slice($decodeFrame, self::$DEFAULT_PACKET_SIZE);
            $packet['Data']   = $data;
        }

        return $packet;
    }

    //加密包头
    public static function PacketHeader($Protocol, $nRecog, $wParam, $wTag, $wSeries)
    {
        return pack('ls4', $nRecog, $Protocol, $wParam, $wTag, $wSeries);
    }

    //解包头
    public static function UnPacketHeader($packet)
    {
        return unpack('lRecog/sProtocol/sP1/sP2/sP3', ToStr($packet));
    }

    //解析参数
    public static function Params($packet)
    {
        return explode(self::$CONTENT_SEPARATOR, $packet);
    }

    //加密
    public static function Encode6BitBytes($pSrc)
    {
        $nRestCount = 0;
        $btRest     = 0;
        $nDestPos   = 0;

        $pDest = [];

        $size     = count($pSrc);
        $nDestLen = ($size / 3) * 4 + 10;

        for ($i = 0; $i < $size; $i++) {
            if ($nDestPos >= $nDestLen) {
                break;
            }

            $btCh   = $pSrc[$i];
            $btMade = ($btRest | ($btCh >> (2 + $nRestCount))) & 0x3F;
            $btRest = ($btCh << (8 - (2 + $nRestCount)) >> 2) & 0x3F;
            $nRestCount += 2;

            if ($nRestCount < 6) {
                $pDest[$nDestPos] = $btMade + 0x3C;
                $nDestPos++;
            } else {
                if ($nDestPos < $nDestLen - 1) {
                    $pDest[$nDestPos]     = $btMade + 0x3C;
                    $pDest[$nDestPos + 1] = $btRest + 0x3C;
                    $nDestPos += 2;
                } else {
                    $pDest[$nDestPos] = $btMade + 0x3C;
                    $nDestPos++;
                }
                $nRestCount = 0;
                $btRest     = 0;
            }
        }

        if ($nRestCount > 0) {
            $pDest[$nDestPos] = $btRest + 0x3C;
            $nDestPos++;
        }

        $pDest[$nDestPos] = 0;
        return $pDest;
    }

    //解密
    public static function Decode6BitBytes($sSource)
    {
        $Masks    = [0xFC, 0xF8, 0xF0, 0xE0, 0xC0];
        $nBitPos  = 2;
        $nMadeBit = 0;
        $nBufPos  = 0;
        $btCh     = 0;
        $btTmp    = 0;
        $btByte   = 0;

        $nSrcLen = count($sSource);

        $nBufLen = [];
        for ($i = 0; $i < ($nSrcLen * 3 / 4); $i++) {
            $nBufLen[] = 0;
        }

        for ($i = 0; $i < $nSrcLen; $i++) {

            if ($sSource[$i] - 0x3C >= 0) {
                $btCh = $sSource[$i] - 0x3C;
            } else {
                $nBufPos = 0;
                break;
            }

            if ($nBufPos >= count($nBufLen)) {
                break;
            }

            if ($nMadeBit + 6 >= 8) {
                $btByte         = $btTmp | ($btCh & 0x3F) >> (6 - $nBitPos);
                $pbuf[$nBufPos] = $btByte;
                $nBufPos++;
                $nMadeBit = 0;

                if ($nBitPos < 6) {
                    $nBitPos += 2;
                } else {
                    $nBitPos = 2;
                    continue;
                }
            }

            $btTmp = ($btCh << $nBitPos) & $Masks[$nBitPos - 2];

            $nMadeBit += 8 - $nBitPos;
        }

        $pbuf[$nBufPos] = 0;

        return $pbuf;
    }
}
