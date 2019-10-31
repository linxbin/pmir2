<?php
namespace app\Packet;

/**
 * 
 */
class HUtil32
{
	
	//获取有效值
	public static function GetValidStr3($Str, &$Dest, $DividerAry='/')
    {
    	$Ary = explode($DividerAry, $Str);

    	if(count($Ary) > 0)
    	{
    		$Dest = $Ary[0];
    	}else{
    		$Dest = '';
    	}

    	if(count($Ary) > 1)
    	{
    		return $Ary[1];
    	}else{
    		return "";
    	}
    }
}