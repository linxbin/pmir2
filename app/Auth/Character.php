<?php
namespace app\Auth;

use app\Packet\PacketHandler;
use app\Packet\ServerState;
use core\query\DB;

/**
 *  英雄角色
 */
class Character
{
	//召唤英雄
	public function RecallHero($serv, $fd, $data = null)
	{
		var_dump(ToStr($data));
	}
}