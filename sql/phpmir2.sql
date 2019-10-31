
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for players
-- ----------------------------
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '角色名称',
  `job` int(3) NOT NULL DEFAULT '0' COMMENT '职业?',
  `hair` int(6) NOT NULL DEFAULT '0' COMMENT '头发',
  `level` int(6) NOT NULL DEFAULT '0' COMMENT '等级',
  `gender` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `level` (`level`),
  KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='玩家角色表';

-- ----------------------------
-- Records of players
-- ----------------------------
INSERT INTO `players` VALUES ('1', '1', '2222', '0', '2', '1', '0');

-- ----------------------------
-- Table structure for server_infos
-- ----------------------------
DROP TABLE IF EXISTS `server_infos`;
CREATE TABLE `server_infos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '服务器名称',
  `login_server_ip` varchar(15) NOT NULL DEFAULT '登录服务器地址',
  `login_server_port` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录服务器端口',
  `game_server_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '游戏服务器地址',
  `game_server_port` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '游戏服务器端口',
  `gameversion` varchar(20) DEFAULT '' COMMENT '版本',
  PRIMARY KEY (`id`),
  KEY `login_server_ip` (`login_server_ip`),
  KEY `game_server_ip` (`game_server_ip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='服务器列表';

-- ----------------------------
-- Records of server_infos
-- ----------------------------
INSERT INTO `server_infos` VALUES ('1', 'PMIR2服务器', '127.0.0.1', '7000', '127.0.0.1', '7400', '1.75');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(50) CHARACTER SET utf8 DEFAULT '' COMMENT '账户名称',
  `password` varchar(40) DEFAULT '' COMMENT '密码',
  `name` varchar(20) DEFAULT '0' COMMENT '姓名',
  `cert` varchar(40) DEFAULT '' COMMENT '证书',
  `question1` varchar(100) DEFAULT '' COMMENT '问题1',
  `answer1` varchar(100) DEFAULT '' COMMENT '回答1',
  `email` varchar(20) DEFAULT '' COMMENT '邮箱',
  `question2` varchar(100) DEFAULT '' COMMENT '问题2',
  `answer2` varchar(100) DEFAULT '' COMMENT '回答2',
  `birthday` varchar(20) DEFAULT '' COMMENT '生日',
  `wrongpwdtimes` tinyint(3) unsigned DEFAULT '0' COMMENT '密码错误次数',
  `online` tinyint(3) unsigned DEFAULT '0' COMMENT '是否在线 0:不在线 1:在线',
  `belock` tinyint(3) unsigned DEFAULT '0' COMMENT '锁定状态 0:正常 1:锁定中',
  `logintime` timestamp NULL DEFAULT NULL COMMENT '登录时间',
  `loginip` varchar(30) DEFAULT '' COMMENT '登录ip',
  `ctime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `utime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `online` (`online`),
  KEY `belock` (`belock`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='账户表';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'test', '9e3279c4e1f2b1c20df760e9c67d95cf8e7207a7', 'pmir2', '650101-1455111', '你好吗', '我好啊', 'fan3750060@163.com', '你真的好吗', '我真的好啊', '1999/11/11', '0', '0', '0', '2019-10-31 17:20:23', '124.202.218.102', '2019-10-31 15:27:06', '2019-10-31 17:20:30');
INSERT INTO `users` VALUES ('4', 'admin', 'd2e7a4fe167f57d7e088cdf96f4676db6e9a70c4', 'asd', '650101-1455111', '11', '1', '1', '1', '1', '1999/11/11', '4', '0', '0', null, '', '2019-10-31 15:27:06', '2019-10-31 17:18:15');
