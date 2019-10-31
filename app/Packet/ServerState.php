<?php
namespace app\Packet;

/**
 * 代码
 */
class ServerState
{
    //登录信息状态
    const UserNotFound   = 0;
    const WrongPwd       = -1;
    const WrongPwd3Times = -2;
    const AlreadyLogin   = -3;
    const NoPay          = -4;
    const BeLock         = -5;

    // 全局(服务器和客户端通用)消息,数据结构,函数等
    const MAXPATHLEN           = 255;
    const DIRPATHLEN           = 80;
    const MAPNAMELEN           = 16;
    const ACTORNAMELEN         = 14;
    const DEFBLOCKSIZE         = 32;
    const GROUPMAX             = 11;
    const BAGGOLD              = 5000000;
    const BODYLUCKUNIT         = 10;
    const MAX_STATUS_ATTRIBUTE = 12;

    // 传奇中人物只有8个方向,但是打符,锲蛾飞行,神鹰都有16方向
    const DR_UP        = 0; // 北
    const DR_UPRIGHT   = 1; // 东北向
    const DR_RIGHT     = 2; // 东
    const DR_DOWNRIGHT = 3; // 东南向
    const DR_DOWN      = 4; // 南
    const DR_DOWNLEFT  = 5; // 西南向
    const DR_LEFT      = 6; // 西
    const DR_UPLEFT    = 7; // 西北向

    // 装备项目

    /// <summary>
    /// 修补火龙之心
    /// </summary>
    const X_RepairFir = 20;
    /// <summary>
    /// 中毒类型：绿毒
    /// </summary>
    const POISON_DECHEALTH = 0;
    /// <summary>
    /// 中毒类型：红毒
    /// </summary>
    const POISON_DAMAGEARMOR = 1;
    /// <summary>
    /// 不能攻击
    /// </summary>
    const POISON_LOCKSPELL = 2;
    /// <summary>
    /// 不能移动
    /// </summary>
    const POISON_DONTMOVE = 4;
    /// <summary>
    /// 中毒类型:麻痹
    /// </summary>
    const POISON_STONE = 5;
    /// <summary>
    /// 被石化
    /// </summary>
    const STATE_STONE_MODE = 1;
    /// <summary>
    /// 不能跑动(中蛛网)
    /// </summary>
    const STATE_LOCKRUN = 3;
    /// <summary>
    /// 护体神盾
    /// </summary>
    const STATE_ProtectionDEFENCE = 7;
    /// <summary>
    /// 隐身
    /// </summary>
    const STATE_TRANSPARENT = 8;
    /// <summary>
    /// 神圣战甲术(防御力)
    /// </summary>
    const STATE_DEFENCEUP = 9;
    /// <summary>
    /// 幽灵盾  魔御力
    /// </summary>
    const STATE_MAGDEFENCEUP = 10;
    /// <summary>
    /// 魔法盾
    /// </summary>
    const STATE_BUBBLEDEFENCEUP = 11;

    const USERMODE_PLAYGAME = 1;
    const USERMODE_LOGIN    = 2;
    const USERMODE_LOGOFF   = 3;
    const USERMODE_NOTICE   = 4;
    const RUNGATEMAX        = 20;
    const uintRUNGATECODE   = 0xAA55AA55;
    const OS_MOVINGOBJECT   = 1;
    /// <summary>
    /// 物品对象
    /// </summary>
    const OS_ITEMOBJECT = 2;
    /// <summary>
    /// 事件对象
    /// </summary>
    const OS_EVENTOBJECT  = 3;
    const OS_GATEOBJECT   = 4;
    const OS_SWITCHOBJECT = 5;
    const OS_MAPEVENT     = 6;
    const OS_DOOR         = 7;
    const OS_ROON         = 8;
    /// <summary>
    /// 人物
    /// </summary>
    const RC_PLAYOBJECT = 0;
    /// <summary>
    /// 人形怪物
    /// </summary>
    const RC_PLAYMOSTER = 150;
    /// <summary>
    /// 英雄
    /// </summary>
    const RC_HEROOBJECT = 66;
    /// <summary>
    /// 大刀守卫
    /// </summary>
    const RC_GUARD    = 12;
    const RC_PEACENPC = 15;
    const RC_ANIMAL   = 50;
    const RC_MONSTER  = 80;
    /// <summary>
    /// NPC
    /// </summary>
    const RC_NPC = 10;
    /// <summary>
    /// 弓箭手
    /// </summary>
    const RC_ARCHERGUARD  = 112;
    const RCC_USERHUMAN   = RC_PLAYOBJECT;
    const RCC_GUARD       = RC_GUARD;
    const RCC_MERCHANT    = RC_ANIMAL;
    const ISM_WHISPER     = 1234;
    const CM_QUERYCHR     = 100; // 登录成功,客户端显出左右角色的那一瞬
    const CM_NEWCHR       = 101; // 创建角色
    const CM_DELCHR       = 102; // 删除角色
    const CM_SELCHR       = 103; // 选择角色
    const CM_SELECTSERVER = 104; // 服务器,注意不是选区,盛大一区往往有(至多8个??group.dat中是这么写的)不止一个的服务器
    const CM_QUERYDELCHR  = 105; // 查询删除过的角色信息 20080706
    const CM_RESDELCHR    = 106; // 恢复删除的角色 20080706
    const SM_RUSH         = 6; // 跑动中改变方向
    const SM_RUSHKUNG     = 7; // 野蛮冲撞
    const SM_FIREHIT      = 8; // 烈火
    const SM_4FIREHIT     = 58; // 4级烈火 20080112
    const SM_BACKSTEP     = 9; // 后退,野蛮效果? //半兽统领公箭手攻击玩家的后退??axemon.pas中procedure   TDualAxeOma.Run
    const SM_TURN         = 10; // 转向
    const SM_WALK         = 11; // 走
    const SM_SITDOWN      = 12;
    const SM_RUN          = 13; // 跑
    const SM_HIT          = 14; // 砍
    const SM_HEAVYHIT     = 15;
    const SM_BIGHIT       = 16;
    const SM_SPELL        = 17; // 使用魔法
    const SM_POWERHIT     = 18; // 攻杀
    const SM_LONGHIT      = 19; // 刺杀
    const SM_DIGUP        = 20; // 挖是一"起"一"坐",这里是挖动作的"起"
    const SM_DIGDOWN      = 21; // 挖动作的"坐"
    const SM_FLYAXE       = 22; // 飞斧,半兽统领的攻击方式?
    const SM_LIGHTING     = 23; // 免蜡开关
    const SM_WIDEHIT      = 24; // 半月
    const SM_CRSHIT       = 25; // 抱月刀
    const SM_TWINHIT      = 26; // 开天斩重击
    const SM_QTWINHIT     = 59; // 开天斩轻击
    const SM_CIDHIT       = 57; // 龙影剑法
    const SM_SANJUEHIT    = 60; // 三绝杀
    const SM_ZHUIXINHIT   = 61; // 追心刺
    const SM_DUANYUEHIT   = 62; // 断岳斩
    const SM_HENGSAOHIT   = 63; // 横扫千军
    const SM_YTPDHIT      = 64; // 倚天劈地
    const SM_XPYJHIT      = 65; // 血魄一击
    const SM_4LONGHIT     = 66; // 四级刺杀
    const SM_YUANYUEHIT   = 67; // 圆月弯刀
    const SM_ALIVE        = 27; // 复活??复活戒指
    const SM_MOVEFAIL     = 28; // 移动失败,走动或跑动
    const SM_HIDE         = 29; // 隐身?
    const SM_DISAPPEAR    = 30; // 地上物品消失
    const SM_STRUCK       = 31; // 受攻击
    const SM_DEATH        = 32; // 正常死亡
    const SM_SKELETON     = 33; // 尸体
    const SM_NOWDEATH     = 34; // 秒杀?
    const SM_ACTION_MIN   = SM_RUSH;
    const SM_ACTION_MAX   = SM_WIDEHIT;
    const SM_ACTION2_MIN  = 65072;
    const SM_ACTION2_MAX  = 65073;
    const SM_HEAR         = 40;
    // 有人回你的话
    const SM_FEATURECHANGED     = 41;
    const SM_USERNAME           = 42;
    const SM_WINEXP             = 44; // 获得经验
    const SM_LEVELUP            = 45; // 升级,左上角出现墨绿的升级字样
    const SM_DAYCHANGING        = 46; // 传奇界面右下角的太阳星星月亮
    const SM_LOGON              = 50; // logon
    const SM_NEWMAP             = 51; // 新地图??
    const SM_ABILITY            = 52; // 打开属性对话框,F11
    const SM_HEALTHSPELLCHANGED = 53; // 治愈术使你的体力增加
    const SM_MAPDESCRIPTION     = 54; // 地图描述,行会战地图?攻城区域?安全区域?
    const SM_SPELL2             = 117; // 对话消息
    const SM_MOVEMESSAGE        = 99;
    const SM_SYSMESSAGE         = 100; // 系统消息,盛大一般红字,私服蓝字
    const SM_GROUPMESSAGE       = 101; // 组内聊天!!
    const SM_CRY                = 102; // 喊话
    const SM_WHISPER            = 103; // 私聊
    const SM_GUILDMESSAGE       = 104; // 行会聊天!~
    const SM_ADDITEM            = 200;
    const SM_BAGITEMS           = 201;
    const SM_DELITEM            = 202;
    const SM_UPDATEITEM         = 203;
    const SM_ADDMAGIC           = 210;
    const SM_SENDMYMAGIC        = 211;
    const SM_DELMAGIC           = 212;
    const SM_BACKSTEPEX         = 250;

    // 服务器端发送的命令 SM:server msg,服务端向客户端发送的消息
    // 登录、新帐号、新角色、查询角色等
    const SM_CERTIFICATION_FAIL    = 501; //世界服务器认证失败
    const SM_ID_NOTFOUND           = 502;
    const SM_PASSWD_FAIL           = 503; // 验证失败,"服务器验证失败,需要重新登录"??
    const SM_NEWID_SUCCESS         = 504; // 创建新账号成功
    const SM_NEWID_FAIL            = 505; // 创建新账号失败
    const SM_CHGPASSWD_SUCCESS     = 506; // 修改密码成功
    const SM_CHGPASSWD_FAIL        = 507; // 修改密码失败
    const SM_GETBACKPASSWD_SUCCESS = 508; // 密码找回成功
    const SM_GETBACKPASSWD_FAIL    = 509; // 密码找回失败
    const SM_QUERYCHR              = 520; // 返回角色信息到客户端
    const SM_NEWCHR_SUCCESS        = 521; // 新建角色成功
    const SM_NEWCHR_FAIL           = 522; // 新建角色失败
    const SM_DELCHR_SUCCESS        = 523; // 删除角色成功
    const SM_DELCHR_FAIL           = 524; // 删除角色失败
    const SM_STARTPLAY             = 525; // 开始进入游戏世界(点了健康游戏忠告后进入游戏画面)
    const SM_STARTFAIL             = 526; // //开始失败,玩传奇深有体会,有时选择角色,点健康游戏忠告后黑屏
    const SM_QUERYCHR_FAIL         = 527; // 返回角色信息到客户端失败
    const SM_OUTOFCONNECTION       = 528; // 超过最大连接数,强迫用户下线
    const SM_PASSOK_SELECTSERVER   = 529; // 密码验证完成且密码正确,开始选服
    const SM_SELECTSERVER_OK       = 530; // 选服成功
    const SM_NEEDUPDATE_ACCOUNT    = 531; // 需要更新,注册后的ID会发生什么变化?私服中的普通ID经过充值??或者由普通ID变为会员ID,GM?
    const SM_UPDATEID_SUCCESS      = 532; // 更新成功
    const SM_UPDATEID_FAIL         = 533; // 更新失败
    const SM_QUERYDELCHR           = 534; // 返回删除过的角色 20080706
    const SM_QUERYDELCHR_FAIL      = 535; // 返回删除过的角色失败 20080706
    const SM_RESDELCHR_SUCCESS     = 536; // 恢复删除角色成功 20080706
    const SM_RESDELCHR_FAIL        = 537; // 恢复删除角色失败 20080706
    const SM_NOCANRESDELCHR        = 538; // 禁止恢复删除角色,即不可查看 200800706
    const SM_DROPITEM_SUCCESS      = 600;
    const SM_DROPITEM_FAIL         = 601;
    const SM_ITEMSHOW              = 610;
    const SM_ITEMHIDE              = 611;
    // SM_DOOROPEN           = 612;
    const SM_OPENDOOR_OK = 612;
    // 通过过门点成功
    const SM_OPENDOOR_LOCK = 613;
    // 发现过门口是封锁的,以前盛大秘密通道去赤月的门要5分钟开一次
    const SM_CLOSEDOOR = 614;
    // 用户过门,门自行关闭
    const SM_TAKEON_OK     = 615;
    const SM_TAKEON_FAIL   = 616;
    const SM_TAKEOFF_OK    = 619;
    const SM_TAKEOFF_FAIL  = 620;
    const SM_SENDUSEITEMS  = 621;
    const SM_WEIGHTCHANGED = 622;
    const SM_CLEAROBJECTS  = 633;
    const SM_CHANGEMAP     = 634;// 地图改变,进入新地图
    const SM_EAT_OK   = 635;
    const SM_EAT_FAIL = 636;
    const SM_BUTCH    = 637;
    // 野蛮?
    const SM_MAGICFIRE = 638;
    // 地狱火,火墙??
    const SM_MAGICFIRE_FAIL    = 639;
    const SM_MAGIC_LVEXP       = 640;
    const SM_DURACHANGE        = 642;
    const SM_MERCHANTSAY       = 643;
    const SM_MERCHANTDLGCLOSE  = 644;
    const SM_SENDGOODSLIST     = 645;
    const SM_SENDUSERSELL      = 646;
    const SM_SENDBUYPRICE      = 647;
    const SM_USERSELLITEM_OK   = 648;
    const SM_USERSELLITEM_FAIL = 649;
    const SM_BUYITEM_SUCCESS   = 650;
    // ?
    const SM_BUYITEM_FAIL = 651;
    // ?
    const SM_SENDDETAILGOODSLIST = 652;
    const SM_GOLDCHANGED         = 653;
    const SM_CHANGELIGHT         = 654;
    // 负重改变
    const SM_LAMPCHANGEDURA = 655;
    // 蜡烛持久改变
    const SM_CHANGENAMECOLOR = 656;
    // 名字颜色改变,白名,灰名,红名,黄名
    const SM_CHARSTATUSCHANGED = 657;
    const SM_SENDNOTICE        = 658;
    // 发送健康游戏忠告(公告)
    const SM_GROUPMODECHANGED = 659;
    // 组队模式改变
    const SM_CREATEGROUP_OK      = 660;
    const SM_CREATEGROUP_FAIL    = 661;
    const SM_GROUPADDMEM_OK      = 662;
    const SM_GROUPDELMEM_OK      = 663;
    const SM_GROUPADDMEM_FAIL    = 664;
    const SM_GROUPDELMEM_FAIL    = 665;
    const SM_GROUPCANCEL         = 666;
    const SM_GROUPMEMBERS        = 667;
    const SM_SENDUSERREPAIR      = 668;
    const SM_USERREPAIRITEM_OK   = 669;
    const SM_USERREPAIRITEM_FAIL = 670;
    const SM_SENDREPAIRCOST      = 671;
    const SM_DEALMENU            = 673;
    const SM_DEALTRY_FAIL        = 674;
    const SM_DEALADDITEM_OK      = 675;
    const SM_DEALADDITEM_FAIL    = 676;
    const SM_DEALDELITEM_OK      = 677;
    /// <summary>
    /// 交易失败
    /// </summary>
    const SM_DEALDELITEM_FAIL    = 678;
    const SM_DEALCANCEL          = 681;
    const SM_DEALREMOTEADDITEM   = 682;
    const SM_DEALREMOTEDELITEM   = 683;
    const SM_DEALCHGGOLD_OK      = 684;
    const SM_DEALCHGGOLD_FAIL    = 685;
    const SM_DEALREMOTECHGGOLD   = 686;
    const SM_DEALSUCCESS         = 687;
    const SM_SENDUSERSTORAGEITEM = 700;
    /// <summary>
    /// 存储物品成功
    /// </summary>
    const SM_STORAGE_OK = 701;
    /// <summary>
    /// 仓库物品满
    /// </summary>
    const SM_STORAGE_FULL = 702;
    /// <summary>
    /// 存储物品失败
    /// </summary>
    const SM_STORAGE_FAIL                = 703;
    const SM_SAVEITEMLIST                = 704;
    const SM_TAKEBACKSTORAGEITEM_OK      = 705;
    const SM_TAKEBACKSTORAGEITEM_FAIL    = 706;
    const SM_TAKEBACKSTORAGEITEM_FULLBAG = 707;
    const SM_AREASTATE                   = 708;
    // 周围状态
    const SM_MYSTATUS = 766;
    // 我的状态,最近一次下线状态,如是否被毒,挂了就强制回城
    const SM_DELITEMS                 = 709;
    const SM_READMINIMAP_OK           = 710;
    const SM_READMINIMAP_FAIL         = 711;
    const SM_SENDUSERMAKEDRUGITEMLIST = 712;
    const SM_MAKEDRUG_SUCCESS         = 713;
    // 714
    // 716
    const SM_MAKEDRUG_FAIL   = 65036;
    const SM_CHANGEGUILDNAME = 750;
    const SM_SENDUSERSTATE   = 751;
    const SM_SUBABILITY      = 752;
    // 打开输助属性对话框
    const SM_OPENGUILDDLG         = 753;
    const SM_OPENGUILDDLG_FAIL    = 754;
    const SM_SENDGUILDMEMBERLIST  = 756;
    const SM_GUILDADDMEMBER_OK    = 757;
    const SM_GUILDADDMEMBER_FAIL  = 758;
    const SM_GUILDDELMEMBER_OK    = 759;
    const SM_GUILDDELMEMBER_FAIL  = 760;
    const SM_GUILDRANKUPDATE_FAIL = 761;
    const SM_BUILDGUILD_OK        = 762;
    const SM_BUILDGUILD_FAIL      = 763;
    const SM_DONATE_OK            = 764;
    const SM_DONATE_FAIL          = 765;
    const SM_MENU_OK              = 767;
    // ?
    const SM_GUILDMAKEALLY_OK   = 768;
    const SM_GUILDMAKEALLY_FAIL = 769;
    const SM_GUILDBREAKALLY_OK  = 770;
    // ?
    const SM_GUILDBREAKALLY_FAIL = 771;
    // ?
    const SM_DLGMSG = 772;
    // Jacky
    const SM_SPACEMOVE_HIDE = 800;
    // 道士走一下隐身
    const SM_SPACEMOVE_SHOW = 801;
    // 道士走一下由隐身变为现身
    const SM_RECONNECT = 802;
    // 与服务器重连
    const SM_GHOST = 803;
    // 尸体清除,虹魔教主死的效果?
    const SM_SHOWEVENT = 804;
    // 显示事件
    const SM_HIDEEVENT = 805;
    // 隐藏事件
    const SM_SPACEMOVE_HIDE2 = 806;
    const SM_SPACEMOVE_SHOW2 = 807;
    const SM_TIMECHECK_MSG   = 810;
    // 时钟检测,以免客户端作弊
    const SM_ADJUST_BONUS = 811;
    // ?
    // ----SM_消息 从6000开始添加----//
    const SM_OPENPULSE_OK     = 6000;
    const SM_OPENPULSE_FAIL   = 6001;
    const SM_RUSHPULSE_OK     = 6002;
    const SM_RUSHPULSE_FAIL   = 6003;
    const SM_PULSECHANGED     = 6004;
    const SM_BATTERORDER      = 6005;
    const SM_CANUSEBATTER     = 6006;
    const SM_BATTERUSEFINALLY = 6007;
    const SM_BATTERSTART      = 6008;
    const SM_OPENPULS         = 6009;
    // 打开经络
    const SM_HEROBATTERORDER       = 6010;
    const SM_HEROPULSECHANGED      = 6011;
    const SM_BATTERBACKSTEP        = 6012;
    const SM_STORMSRATE            = 6013;
    const SM_STORMSRATECHANGED     = 6014;
    const SM_HEROSTORMSRATECHANGED = 6015;
    const SM_OPENPULSENEEDLEV      = 6016;
    const SM_HEROATTECTMODE        = 6017;
    const SM_GETASSESSHEROINFO     = 6018;
    const SM_QUERYASSESSHERO       = 6019;
    const SM_SHOWASSESSDLG         = 6020;
    const SM_ISDEHERO              = 6021;
    const SM_OPENTRAININGDLG       = 6022;
    const SM_OPENHEALTH            = 1100;
    const SM_CLOSEHEALTH           = 1101;
    const SM_BREAKWEAPON           = 1102;
    // 武器破碎
    const SM_INSTANCEHEALGUAGE = 1103;
    // 实时治愈
    const SM_CHANGEFACE = 1104;
    // 变脸,发型改变?
    const SM_VERSION_FAIL = 1106;
    // 客户端版本验证失败
    const SM_ITEMUPDATE       = 1500;
    const SM_MONSTERSAY       = 1501;
    const SM_EXCHGTAKEON_OK   = 65023;
    const SM_EXCHGTAKEON_FAIL = 65024;
    const SM_TEST             = 65037;
    const SM_TESTHERO         = 65038;
    const SM_THROW            = 65069;
    const RM_DELITEMS         = 9000;
    // Jacky
    const RM_TURN     = 10001;
    const RM_WALK     = 10002;
    const RM_RUN      = 10003;
    const RM_HIT      = 10004;
    const RM_SPELL    = 10007;
    const RM_SPELL2   = 10008;
    const RM_POWERHIT = 10009;
    const RM_LONGHIT  = 10011;
    const RM_WIDEHIT  = 10012;
    const RM_PUSH     = 10013;
    const RM_FIREHIT  = 10014;
    // 烈火
    const RM_4FIREHIT = 10016;
    // 4级烈火 20080112
    const RM_RUSH   = 10015;
    const RM_STRUCK = 10020;
    // 受物理打击
    const RM_DEATH      = 10021;
    const RM_DISAPPEAR  = 10022;
    const RM_MAGSTRUCK  = 10025;
    const RM_MAGHEALING = 10026;
    const RM_STRUCK_MAG = 10027;
    // 受魔法打击
    const RM_MAGSTRUCK_MINE    = 10028;
    const RM_INSTANCEHEALGUAGE = 10029;
    // jacky
    const RM_HEAR = 10030;
    // 公聊
    const RM_WHISPER            = 10031;
    const RM_CRY                = 10032;
    const RM_RIDE               = 10033;
    const RM_WINEXP             = 10044;
    const RM_USERNAME           = 10043;
    const RM_LEVELUP            = 10045;
    const RM_CHANGENAMECOLOR    = 10046;
    const RM_PUSHEX             = 10047;
    const RM_LOGON              = 10050;
    const RM_ABILITY            = 10051;
    const RM_HEALTHSPELLCHANGED = 10052;
    const RM_DAYCHANGING        = 10053;
    const RM_MOVEMESSAGE        = 10099;
    // 滚动公告   清清 2007.11.13
    const RM_SYSMESSAGE   = 10100;
    const RM_GROUPMESSAGE = 10102;
    const RM_SYSMESSAGE2  = 10103;
    const RM_GUILDMESSAGE = 10104;
    const RM_SYSMESSAGE3  = 10105;
    /// <summary>
    /// 显示物品
    /// </summary>
    const RM_ITEMSHOW = 10110;
    /// <summary>
    /// 隐藏物品
    /// </summary>
    const RM_ITEMHIDE     = 10111;
    const RM_DOOROPEN     = 10112;
    const RM_DOORCLOSE    = 10113;
    const RM_SENDUSEITEMS = 10114;
    // 发送使用的物品
    const RM_WEIGHTCHANGED  = 10115;
    const RM_FEATURECHANGED = 10116;
    const RM_CLEAROBJECTS   = 10117;
    const RM_CHANGEMAP      = 10118;
    const RM_BUTCH          = 10119;
    // 挖
    const RM_MAGICFIRE   = 10120;
    const RM_SENDMYMAGIC = 10122;
    // 发送使用的魔法
    const RM_MAGIC_LVEXP = 10123;
    const RM_SKELETON    = 10024;
    const RM_DURACHANGE  = 10125;
    /// <summary>
    /// 持久改变
    /// </summary>
    const RM_MERCHANTSAY = 10126;
    /// <summary>
    /// 金币改变
    /// </summary>
    const RM_GOLDCHANGED       = 10136;
    const RM_CHANGELIGHT       = 10137;
    const RM_CHARSTATUSCHANGED = 10139;
    const RM_DELAYMAGIC        = 10154;
    const RM_DIGUP             = 10200;
    const RM_DIGDOWN           = 10201;
    const RM_FLYAXE            = 10202;
    const RM_LIGHTING          = 10204;
    const RM_SUBABILITY        = 10302;
    const RM_TRANSPARENT       = 10308;
    const RM_SPACEMOVE_SHOW    = 10331;
    const RM_RECONNECTION      = 11332;
    const RM_SPACEMOVE_SHOW2   = 10332;
    // 隐藏烟花
    const RM_HIDEEVENT = 10333;
    // 显示烟花
    const RM_SHOWEVENT    = 10334;
    const RM_ZEN_BEE      = 10337;
    const RM_OPENHEALTH   = 10410;
    const RM_CLOSEHEALTH  = 10411;
    const RM_DOOPENHEALTH = 10412;
    const RM_CHANGEFACE   = 10415;
    const RM_ITEMUPDATE   = 11000;
    const RM_MONSTERSAY   = 11001;
    const RM_MAKESLAVE    = 11002;
    const RM_MONMOVE      = 21004;
    const SS_200          = 200;
    const SS_201          = 201;
    const SS_202          = 202;
    const SS_WHISPER      = 203;
    const SS_204          = 204;
    const SS_205          = 205;
    const SS_206          = 206;
    const SS_207          = 207;
    const SS_208          = 208;
    const SS_209          = 219;
    const SS_210          = 210;
    const SS_211          = 211;
    const SS_212          = 212;
    const SS_213          = 213;
    const SS_214          = 214;
    const RM_10205        = 10205;
    const RM_10101        = 10101;
    const RM_ALIVE        = 10153;
    // 复活
    const RM_CHANGEGUILDNAME = 10301;
    const RM_10414           = 10414;
    const RM_POISON          = 10300;
    const LA_UNDEAD          = 1;
    // 不死系
    const RM_DELAYPUSHED     = 10555;
    const CM_GETBACKPASSWORD = 2010; // 密码找回
    const CM_SPELL           = 3017;
    // 施魔法
    const CM_QUERYUSERNAME = 80;
    // 进入游戏,服务器返回角色名到客户端
    const CM_DROPITEM = 1000;
    // 从包裹里扔出物品到地图,此时人物如果在安全区可能会提示安全区不允许扔东西
    const CM_PICKUP = 1001;
    // 捡东西
    const CM_TAKEONITEM = 1003;
    // 装配装备到身上的装备位置
    const CM_TAKEOFFITEM = 1004;
    // 从身上某个装备位置取下某个装备
    const CM_EAT = 1006;
    // 吃药
    const CM_BUTCH = 1007;
    // 挖
    const CM_MAGICKEYCHANGE = 1008;
    // 魔法快捷键改变
    const CM_HEROMAGICKEYCHANGE = 1046;
    // 英雄魔法开关设置 20080606
    const CM_1005 = 1005;
    // 与商店NPC交易相关
    const CM_CLICKNPC = 1010;
    // 用户点击了某个NPC进行交互
    const CM_MERCHANTDLGSELECT = 1011;
    // 商品选择,大类
    const CM_MERCHANTQUERYSELLPRICE = 1012;
    // 返回价格,标准价格,我们知道商店用户卖入的有些东西掉持久或有特殊
    const CM_USERSELLITEM = 1013;
    // 用户卖东西
    const CM_USERBUYITEM = 1014;
    // 用户买入东西
    const CM_USERGETDETAILITEM = 1015;
    // 取得商品清单,比如点击"蛇眼戒指"大类,会出现一列蛇眼戒指供你选择
    const CM_DROPGOLD = 1016;
    // 用户放下金钱到地上
    const CM_LOGINNOTICEOK = 1018;
    // 健康游戏忠告点了确实,进入游戏
    const CM_GROUPMODE = 1019;
    // 关组还是开组
    const CM_CREATEGROUP = 1020;
    // 新建组队
    const CM_ADDGROUPMEMBER = 1021;
    // 组内添人
    const CM_DELGROUPMEMBER = 1022;
    // 组内删人
    const CM_USERREPAIRITEM = 1023;
    // 用户修理东西
    const CM_MERCHANTQUERYREPAIRCOST = 1024;
    // 客户端向NPC取得修理费用
    const CM_DEALTRY = 1025;
    // 开始交易,交易开始
    const CM_DEALADDITEM = 1026;
    // 加东东到交易物品栏上
    const CM_DEALDELITEM = 1027;
    // 从交易物品栏上撤回东东???好像不允许哦
    const CM_DEALCANCEL = 1028;
    // 取消交易
    const CM_DEALCHGGOLD = 1029;
    // 本来交易栏上金钱为0,,如有金钱交易,交易双方都会有这个消息
    const CM_DEALEND = 1030;
    // 交易成功,完成交易
    const CM_USERSTORAGEITEM = 1031;
    // 用户寄存东西
    const CM_USERTAKEBACKSTORAGEITEM = 1032;
    // 用户向保管员取回东西
    const CM_WANTMINIMAP = 1033;
    // 用户点击了"小地图"按钮
    const CM_USERMAKEDRUGITEM = 1034;
    // 用户制造毒药(其它物品)
    const CM_OPENGUILDDLG = 1035;
    // 用户点击了"行会"按钮
    const CM_GUILDHOME = 1036;
    // 点击"行会主页"
    const CM_GUILDMEMBERLIST = 1037;
    // 点击"成员列表"
    const CM_GUILDADDMEMBER = 1038;
    // 增加成员
    const CM_GUILDDELMEMBER = 1039;
    // 踢人出行会
    const CM_GUILDUPDATENOTICE = 1040;
    // 修改行会公告
    const CM_GUILDUPDATERANKINFO = 1041;
    // 更新联盟信息(取消或建立联盟)
    const CM_ADJUST_BONUS = 1043;
    // 用户得到奖励??私服中比较明显,小号升级时会得出金钱声望等,不是很确定,//求经过测试的高手的验证
    const CM_SPEEDHACKUSER = 10430;
    // 用户加速作弊检测
    const CM_PASSWORD    = 1105;
    const CM_CHGPASSWORD = 1221;
    // ?
    const CM_SETPASSWORD = 1222;
    // ?
    const CM_HORSERUN = 3009;
    const CM_THROW    = 3005;
    // 抛符
    // 动作命令1
    const CM_TURN = 3010;
    // 转身(方向改变)
    const CM_WALK = 3011;
    // 走
    const CM_SITDOWN = 3012;
    // 挖(蹲下)
    const CM_RUN = 3013;
    // 跑

    /// <summary>
    /// 普通物理近身攻击
    /// </summary>
    const CM_HIT = 3014;
    //
    const CM_HEAVYHIT = 3015;
    // 跳起来打的动作
    const CM_BIGHIT   = 3016;
    const CM_POWERHIT = 3018;
    // 攻杀
    const CM_LONGHIT = 3019;
    // 刺杀
    const CM_4LONGHIT = 3066;
    // 4级刺杀
    const CM_YUANYUEHIT = 3067;
    // 圆月弯刀
    const CM_WIDEHIT = 3024;
    // 半月
    const CM_FIREHIT = 3025;
    // 烈火攻击
    const CM_4FIREHIT = 3031;
    // 4级烈火攻击
    const CM_CRSHIT = 3036;
    // 抱月刀
    const CM_TWNHIT = 3037;
    // 开天斩重击
    const CM_QTWINHIT = 3041;
    // 开天斩轻击
    const CM_CIDHIT = 3040;
    // 龙影剑法
    const CM_TWINHIT = CM_TWNHIT;
    const CM_PHHIT   = 3038;
    // 破魂斩
    const CM_DAILY = 3042;
    // 逐日剑法 20080511
    const CM_SANJUEHIT = 3060;
    // 三绝杀
    const CM_ZHUIXINHIT = 3061;
    // 追心刺
    const CM_DUANYUEHIT = 3062;
    // 断岳斩
    const CM_HENGSAOHIT = 3063;
    // 横扫千军
    const CM_YTPDHIT = 3064;
    // 倚天劈地
    const CM_XPYJHIT = 3065;
    // 血魄一击
    const RM_SANJUEHIT = 10060;
    // 三绝杀
    const RM_ZHUIXINHIT = 10061;
    // 追心刺  人刚刚开始的动作
    const RM_DUANYUEHIT = 10062;
    // 断岳斩
    const RM_HENGSAOHIT = 10063;
    // 横扫千军
    const RM_ZHUIXIN_OK = 10064;
    // 追心刺  冲撞过去的动作
    const RM_YTPDHIT = 10065;
    // 倚天劈地
    const RM_XPYJHIT = 10066;
    // 血魄一击
    // --RM_消息 添加处 36000起步--//
    const RM_OPENPULSE_OK          = 36000;
    const RM_OPENPULSE_FAIL        = 36001;
    const RM_RUSHPULSE_OK          = 36002;
    const RM_RUSHPULSE_FAIL        = 36003;
    const RM_PULSECHANGED          = 36004;
    const RM_BATTERORDER           = 36005;
    const RM_BATTERUSEFINALLY      = 36006;
    const RM_HEROBATTERORDER       = 36007;
    const RM_HEROPULSECHANGED      = 36008;
    const RM_STORMSRATE            = 36009;
    const RM_STORMSRATECHANGED     = 36010;
    const RM_HEROSTORMSRATECHANGED = 36011;
    const RM_OPENPULSENEEDLEV      = 36012;
    // 双英雄 相关
    // RM_GETDOUBLEHEROINFO     = 36013;
    const RM_HEROATTECTMODE    = 36014;
    const RM_GETASSESSHEROINFO = 36015;
    const RM_QUERYASSESSHERO   = 36016;
    const RM_SHOWASSESSDLG     = 36017;
    const RM_ISDEHERO          = 36018;
    const RM_OPENTRAININGDLG   = 36019;
    // 新技能和四级技能相关
    const RM_4LONGHIT   = 36020;
    const RM_YUANYUEHIT = 36021;
    const CM_SAY        = 3030;
    // 角色发言
    const CM_40HIT     = 3026;
    const CM_41HIT     = 3027;
    const CM_42HIT     = 3029;
    const CM_43HIT     = 3028;
    const CM_USEBATTER = 3080;
    // 使用连击
    const RM_10401 = 10401;
    /// <summary>
    /// 菜单
    /// </summary>
    const RM_MENU_OK          = 10309;
    const RM_MERCHANTDLGCLOSE = 10127;
    const RM_SENDDELITEMLIST  = 10148;
    // 发送删除项目的名单
    const RM_SENDUSERSREPAIR = 10141;
    // 发送用户修理
    const RM_SENDGOODSLIST = 10128;
    // 发送商品名单
    const RM_SENDUSERSELL = 10129;
    // 发送用户出售
    const RM_SENDUSERREPAIR = 11139;
    // 发送用户修理
    const RM_USERMAKEDRUGITEMLIST = 10149;
    // 用户做药品项目的名单
    const RM_USERSTORAGEITEM = 10146;
    // 用户仓库项目
    const RM_USERGETBACKITEM = 10147;
    // 用户获得回的仓库项目
    const RM_SPACEMOVE_FIRE2 = 11330;
    // 空间移动
    const RM_SPACEMOVE_FIRE = 11331;
    // 空间移动
    const RM_BUYITEM_SUCCESS = 10133;
    // 购买项目成功
    const RM_BUYITEM_FAIL = 10134;
    // 购买项目失败
    const RM_SENDDETAILGOODSLIST = 10135;
    // 发送详细的商品名单
    const RM_SENDBUYPRICE = 10130;
    // 发送购买价格
    const RM_USERSELLITEM_OK = 10131;
    // 用户出售成功
    const RM_USERSELLITEM_FAIL = 10132;
    // 用户出售失败
    const RM_MAKEDRUG_SUCCESS = 10150;
    // 做药成功
    const RM_MAKEDRUG_FAIL = 10151;
    // 做药失败
    const RM_SENDREPAIRCOST = 10142;
    // 发送修理成本
    const RM_USERREPAIRITEM_OK = 10143;
    // 用户修理项目成功
    const RM_USERREPAIRITEM_FAIL = 10144;
    // 用户修理项目失败
    const MAXBAGITEM = 46;
    // 人物背包最大数量
    const MAXHEROBAGITEM = 40;
    // 英雄包裹最大数量
    const RM_10155           = 10155;
    const RM_PLAYDICE        = 10500;
    const RM_ADJUST_BONUS    = 10400;
    const RM_BUILDGUILD_OK   = 10303;
    const RM_BUILDGUILD_FAIL = 10304;
    const RM_DONATE_OK       = 10305;
    const RM_GAMEGOLDCHANGED = 10666;
    const STATE_OPENHEATH    = 1;
    const POISON_68          = 68;
    const RM_MYSTATUS        = 10777;
    const CM_QUERYUSERSTATE  = 82;
    // 查询用户状态(用户登录进去,实际上是客户端向服务器索取查询最近一次,退出服务器前的状态的过程,
    // 服务器自动把用户最近一次下线以让游戏继续的一些信息返回到客户端)
    const CM_QUERYBAGITEMS = 81;
    // 查询包裹物品
    const CM_QUERYUSERSET = 49999;
    const CM_OPENDOOR     = 1002;
    // 开门,人物走到地图的某个过门点时
    const CM_SOFTCLOSE = 1009;
    // 退出传奇(游戏程序,可能是游戏中大退,也可能时选人时退出)
    const CM_1017           = 1017;
    const CM_1042           = 1042;
    const CM_GUILDALLY      = 1044;
    const CM_GUILDBREAKALLY = 1045;
    const RM_HORSERUN       = 11000;
    const RM_HEAVYHIT       = 10005;
    const RM_BIGHIT         = 10006;
    const RM_MOVEFAIL       = 10010;
    const RM_CRSHIT         = 11014;
    const RM_RUSHKUNG       = 11015;
    const RM_41             = 41;
    const RM_42             = 42;
    const RM_43             = 43;
    const RM_44             = 56;
    const RM_MAGICFIREFAIL  = 10121;
    const RM_LAMPCHANGEDURA = 10138;
    const RM_GROUPCANCEL    = 10140;
    const RM_DONATE_FAIL    = 10306;
    const RM_BREAKWEAPON    = 10413;
    const RM_PASSWORD       = 10416;
    const RM_PASSWORDSTATUS = 10601;
    const SM_40             = 35;
    const SM_41             = 36;
    const SM_42             = 37;
    const SM_43             = 38;
    const SM_44             = 39;
    // 龙影剑法
    const SM_HORSERUN       = 5;
    const SM_716            = 716;
    const SM_PASSWORD       = 3030;
    const SM_PLAYDICE       = 1200;
    const SM_PASSWORDSTATUS = 20001;
    const SM_GAMEGOLDNAME   = 55;
    // 向客户端发送游戏币,游戏点,金刚石,灵符数量
    const SM_SERVERCONFIG = 20002;
    const SM_GETREGINFO   = 20003;
    const ET_DIGOUTZOMBI  = 1;
    const ET_PILESTONES   = 3;
    const ET_HOLYCURTAIN  = 4;
    const ET_FIRE         = 5;
    const ET_SCULPEICE    = 6;
    // 6种烟花
    const ET_FIREFLOWER_1 = 7;
    // 一心一意
    const ET_FIREFLOWER_2 = 8;
    // 心心相印
    const ET_FIREFLOWER_3 = 9;
    const ET_FIREFLOWER_4 = 10;
    const ET_FIREFLOWER_5 = 11;
    const ET_FIREFLOWER_6 = 12;
    const ET_FIREFLOWER_7 = 13;
    const ET_FIREFLOWER_8 = 14;
    // 没有图片
    const ET_FOUNTAIN = 15;
    // 喷泉效果 20080624
    const ET_DIEEVENT = 16;
    // 人型庄主死亡动画效果 20080918
    const ET_FIREDRAGON = 17;
    // 守护兽小火圈效果 20090123
    const CM_PROTOCOL       = 2000;
    const CM_IDPASSWORD     = 2001; // 客户端向服务器发送ID和密码
    const CM_ADDNEWUSER     = 2002; // 新建用户,就是注册新账号,登录时选择了"新用户"并操作成功
    const CM_CHANGEPASSWORD = 2003; // 修改密码
    const CM_UPDATEUSER     = 2004; // 更新注册资料??
    const CM_RANDOMCODE     = 2006; // 取验证码 20080612
    const SM_RANDOMCODE     = 2007;

    const CM_3037         = 3039; // 2007.10.15改了值  以前是  3037
    const SM_NEEDPASSWORD = 8003;
    const CM_POWERBLOCK   = 0;

    // 商铺相关
    const CM_OPENSHOP      = 9000; // 打开商铺
    const SM_SENGSHOPITEMS = 9001;
    // SERIES 7 每页的数量    wParam 总页数
    const CM_BUYSHOPITEM            = 9002;
    const SM_BUYSHOPITEM_SUCCESS    = 9003;
    const SM_BUYSHOPITEM_FAIL       = 9004;
    const SM_SENGSHOPSPECIALLYITEMS = 9005;
    // 奇珍类型
    const CM_BUYSHOPITEMGIVE = 9006;
    // 赠送
    const SM_BUYSHOPITEMGIVE_FAIL    = 9007;
    const SM_BUYSHOPITEMGIVE_SUCCESS = 9008;
    const RM_OPENSHOPSpecially       = 30000;
    const RM_OPENSHOP                = 30001;
    const RM_BUYSHOPITEM_FAIL        = 30003;
    // 商铺购买物品失败
    const RM_BUYSHOPITEMGIVE_FAIL    = 30004;
    const RM_BUYSHOPITEMGIVE_SUCCESS = 30005;
    // ==============================================================================
    const CM_QUERYUSERLEVELSORT = 3500;
    // 用户等级排行
    const RM_QUERYUSERLEVELSORT = 35000;
    const SM_QUERYUSERLEVELSORT = 2500;
    // ==============================新增物品寄售系统(拍卖)==========================
    const RM_SENDSELLOFFGOODSLIST = 21008;
    // 拍卖
    const SM_SENDSELLOFFGOODSLIST = 20008;
    // 拍卖
    const RM_SENDUSERSELLOFFITEM = 21005;
    // 寄售物品
    const SM_SENDUSERSELLOFFITEM = 20005;
    // 寄售物品
    const RM_SENDSELLOFFITEMLIST = 22009;
    // 查询得到的寄售物品
    const CM_SENDSELLOFFITEMLIST = 20009;
    // 查询得到的寄售物品
    const RM_SENDBUYSELLOFFITEM_OK = 21010;
    // 购买寄售物品成功
    const SM_SENDBUYSELLOFFITEM_OK = 20010;
    // 购买寄售物品成功
    const RM_SENDBUYSELLOFFITEM_FAIL = 21011;
    // 购买寄售物品失败
    const SM_SENDBUYSELLOFFITEM_FAIL = 20011;
    // 购买寄售物品失败
    const RM_SENDBUYSELLOFFITEM = 41005;
    // 购买选择寄售物品
    const CM_SENDBUYSELLOFFITEM = 4005;
    // 购买选择寄售物品
    const RM_SENDQUERYSELLOFFITEM = 41006;
    // 查询选择寄售物品
    const CM_SENDQUERYSELLOFFITEM = 4006;
    // 查询选择寄售物品
    const RM_SENDSELLOFFITEM = 41004;
    // 接受寄售物品
    const CM_SENDSELLOFFITEM = 4004;
    // 接受寄售物品
    const RM_SENDUSERSELLOFFITEM_FAIL = 2007;
    // R = -3  寄售物品失败
    const RM_SENDUSERSELLOFFITEM_OK = 2006;
    // 寄售物品成功
    const SM_SENDUSERSELLOFFITEM_FAIL = 20007;
    // R = -3  寄售物品失败
    const SM_SENDUSERSELLOFFITEM_OK = 20006;
    // 寄售物品成功
    // ==============================元宝寄售系统(20080316)==========================
    const RM_SENDDEALOFFFORM = 23000;
    // 打开出售物品窗口
    const SM_SENDDEALOFFFORM = 23001;
    // 打开出售物品窗口
    const CM_SELLOFFADDITEM = 23002;
    // 客户端往出售物品窗口里加物品
    const SM_SELLOFFADDITEM_OK = 23003;
    // 客户端往出售物品窗口里加物品 成功
    const RM_SELLOFFADDITEM_OK   = 23004;
    const SM_SellOffADDITEM_FAIL = 23005;
    // 客户端往出售物品窗口里加物品 失败
    const RM_SellOffADDITEM_FAIL = 23006;
    const CM_SELLOFFDELITEM      = 23007;
    // 客户端删除出售物品窗里的物品
    const SM_SELLOFFDELITEM_OK = 23008;
    // 客户端删除出售物品窗里的物品 成功
    const RM_SELLOFFDELITEM_OK   = 23009;
    const SM_SELLOFFDELITEM_FAIL = 23010;
    // 客户端删除出售物品窗里的物品 失败
    const RM_SELLOFFDELITEM_FAIL = 23011;
    /// <summary>
    /// 客户端取消元宝寄售
    /// </summary>
    const CM_SELLOFFCANCEL = 23012;
    /// <summary>
    /// 元宝寄售取消出售
    /// </summary>
    const RM_SELLOFFCANCEL = 23013;
    /// <summary>
    /// 元宝寄售取消出售
    /// </summary>
    const SM_SellOffCANCEL = 23014;
    /// <summary>
    /// 客户端元宝寄售结束
    /// </summary>
    const CM_SELLOFFEND = 23015;
    /// <summary>
    /// 客户端元宝寄售结束 成功
    /// </summary>
    const SM_SELLOFFEND_OK = 23016;
    /// <summary>
    /// 客户端元宝寄售结束 成功
    /// </summary>
    const RM_SELLOFFEND_OK = 23017;
    /// <summary>
    /// 客户端元宝寄售结束 失败
    /// </summary>
    const SM_SELLOFFEND_FAIL = 23018;
    /// <summary>
    /// 客户端元宝寄售结束 失败
    /// </summary>
    const RM_SELLOFFEND_FAIL = 23019;
    const RM_QUERYYBSELL     = 23020;
    // 查询正在出售的物品
    const SM_QUERYYBSELL = 23021;
    // 查询正在出售的物品
    const RM_QUERYYBDEAL = 23022;
    // 查询可以的购买物品
    const SM_QUERYYBDEAL = 23023;
    // 查询可以的购买物品
    const CM_CANCELSELLOFFITEMING = 23024;
    // 取消正在寄售的物品 20080318(出售人)
    // SM_CANCELSELLOFFITEMING_OK =23018;//取消正在寄售的物品 成功
    const CM_SELLOFFBUYCANCEL = 23025;
    // 取消寄售 物品购买 20080318(购买人)
    const CM_SELLOFFBUY = 23026;
    // 确定购买寄售物品 20080318
    const SM_SELLOFFBUY_OK = 23027;
    /// <summary>
    /// 购买成功
    /// </summary>
    const RM_SELLOFFBUY_OK = 23028;
    // ==============================================================================
    // 英雄
    // //////////////////////////////////////////////////////////////////////////////
    const CM_RECALLHERO = 5000;// 召唤英雄
    const SM_RECALLHERO = 5001;
    const CM_HEROLOGOUT = 5002;
    // 英雄退出
    const SM_HEROLOGOUT = 5003;
    const SM_CREATEHERO = 5004;
    // 创建英雄
    const SM_HERODEATH = 5005;
    // 创建死亡
    const CM_HEROCHGSTATUS = 5006;
    // 改变英雄状态
    const CM_HEROATTACKTARGET = 5007;
    // 英雄锁定目标
    const CM_HEROPROTECT = 5008;
    // 守护目标
    const CM_HEROTAKEONITEM = 5009;
    // 打开物品栏
    const CM_HEROTAKEOFFITEM = 5010;
    // 关闭物品栏
    const CM_TAKEOFFITEMHEROBAG = 5011;
    // 装备脱下到英雄包裹
    const CM_TAKEOFFITEMTOMASTERBAG = 5012;
    // 装备脱下到主人包裹
    const CM_SENDITEMTOMASTERBAG = 5013;
    // 主人包裹到英雄包裹
    const CM_SENDITEMTOHEROBAG = 5014;
    // 英雄包裹到主人包裹
    const SM_HEROTAKEON_OK               = 5015;
    const SM_HEROTAKEON_FAIL             = 5016;
    const SM_HEROTAKEOFF_OK              = 5017;
    const SM_HEROTAKEOFF_FAIL            = 5018;
    const SM_TAKEOFFTOHEROBAG_OK         = 5019;
    const SM_TAKEOFFTOHEROBAG_FAIL       = 5020;
    const SM_TAKEOFFTOMASTERBAG_OK       = 5021;
    const SM_TAKEOFFTOMASTERBAG_FAIL     = 5022;
    const CM_HEROTAKEONITEMFORMMASTERBAG = 5023;
    // 从主人包裹穿装备到英雄包裹
    const CM_TAKEONITEMFORMHEROBAG = 5024;
    // 从英雄包裹穿装备到主人包裹
    const SM_SENDITEMTOMASTERBAG_OK = 5025;
    // 主人包裹到英雄包裹成功
    const SM_SENDITEMTOMASTERBAG_FAIL = 5026;
    // 主人包裹到英雄包裹失败
    const SM_SENDITEMTOHEROBAG_OK = 5027;
    // 英雄包裹到主人包裹
    const SM_SENDITEMTOHEROBAG_FAIL = 5028;
    // 英雄包裹到主人包裹
    const CM_QUERYHEROBAGCOUNT = 5029;
    // 查看英雄包裹容量
    const SM_QUERYHEROBAGCOUNT = 5030;
    // 查看英雄包裹容量
    const CM_QUERYHEROBAGITEMS = 5031;
    // 查看英雄包裹
    const SM_SENDHEROUSEITEMS = 5032;
    // 发送英雄身上装备
    const SM_HEROBAGITEMS = 5033;
    // 接收英雄物品
    const SM_HEROADDITEM = 5034;
    // 英雄包裹添加物品
    const SM_HERODELITEM = 5035;
    // 英雄包裹删除物品
    const SM_HEROUPDATEITEM = 5036;
    // 英雄包裹更新物品
    const SM_HEROADDMAGIC = 5037;
    // 添加英雄魔法
    const SM_HEROSENDMYMAGIC = 5038;
    // 发送英雄的魔法
    const SM_HERODELMAGIC = 5039;
    // 删除英雄魔法
    const SM_HEROABILITY = 5040;
    // 英雄属性1
    const SM_HEROSUBABILITY = 5041;
    // 英雄属性2
    const SM_HEROWEIGHTCHANGED = 5042;
    const CM_HEROEAT           = 5043;
    // 吃东西
    const SM_HEROEAT_OK = 5044;
    // 吃东西成功
    const SM_HEROEAT_FAIL = 5045;
    // 吃东西失败
    const SM_HEROMAGIC_LVEXP = 5046;
    // 魔法等级
    const SM_HERODURACHANGE = 5047;
    // 英雄持久改变
    const SM_HEROWINEXP = 5048;
    // 英雄增加经验
    const SM_HEROLEVELUP = 5049;
    // 英雄升级
    const SM_HEROCHANGEITEM = 5050;
    // 好象没用上？
    const SM_HERODELITEMS = 5051;
    // 删除英雄物品
    const CM_HERODROPITEM = 5052;
    // 英雄往地上扔物品
    const SM_HERODROPITEM_SUCCESS = 5053;
    // 英雄扔物品成功
    const SM_HERODROPITEM_FAIL = 5054;
    // 英雄扔物品失败
    const CM_HEROGOTETHERUSESPELL = 5055;
    // 使用合击
    const SM_GOTETHERUSESPELL = 5056;
    // 使用合击
    const SM_FIRDRAGONPOINT = 5057;
    // 英雄怒气值
    const CM_REPAIRFIRDRAGON = 5058;
    // 修补火龙之心
    const SM_REPAIRFIRDRAGON_OK = 5059;
    // 修补火龙之心成功
    const SM_REPAIRFIRDRAGON_FAIL = 5060;
    // 修补火龙之心失败
    // ---------------------------------------------------
    // 祝福罐.魔令包功能 20080102
    const CM_REPAIRDRAGON = 5061;
    // 祝福罐.魔令包功能
    const SM_REPAIRDRAGON_OK = 5062;
    // 修补祝福罐.魔令包成功
    const SM_REPAIRDRAGON_FAIL = 5063;
    // 修补祝福罐.魔令包失败
    // ----------------------------------------------------
    // ----CM_消息 从26000开始添加----//
    // -------连击 经脉----- /
    const CM_OPENPULSE            = 26000;
    const CM_RUSHPULSE            = 26001;
    const CM_QUERYOPENPULSE       = 26002;
    const CM_SETBATTERORDER       = 26003;
    const CM_SETHEROBATTERORDER   = 26004;
    const CM_QUERYHEROOPENPULSE   = 26005;
    const CM_RUSHHEROPULSE        = 26006;
    const CM_CHANGEHEROATTECTMODE = 26007;
    // 改变副将英雄攻击模式
    const CM_QUERYASSESSHERO = 26008;
    const CM_ASSESSMENTHERO  = 26009;
    const CM_TRAININGHERO    = 26010;
    const RM_RECALLHERO      = 19999;
    // 召唤英雄
    const RM_HEROWEIGHTCHANGED = 20000;
    const RM_SENDHEROUSEITEMS  = 20001;
    const RM_SENDHEROMYMAGIC   = 20002;
    const RM_HEROMAGIC_LVEXP   = 20003;
    const RM_QUERYHEROBAGCOUNT = 20004;
    const RM_HEROABILITY       = 20005;
    const RM_HERODURACHANGE    = 20006;
    const RM_HERODEATH         = 20007;
    const RM_HEROLEVELUP       = 20008;
    const RM_HEROWINEXP        = 20009;
    // RM_HEROLOGOUT = 20010;
    const RM_CREATEHERO       = 20011;
    const RM_MAKEGHOSTHERO    = 20012;
    const RM_HEROSUBABILITY   = 20013;
    const RM_GOTETHERUSESPELL = 20014;
    // 使用合击
    const RM_FIRDRAGONPOINT = 20015;
    // 发送英雄怒气值
    const RM_CHANGETURN = 20016;
    // -----------------------------------月灵重击
    const RM_FAIRYATTACKRATE = 20017;
    const SM_FAIRYATTACKRATE = 20018;
    // -----------------------------------
    const SM_SERVERUNBIND = 20019;
    const RM_DESTROYHERO  = 20020;
    // 英雄销毁
    const SM_DESTROYHERO = 20021;
    // 英雄销毁
    const ET_PROTECTION_STRUCK = 20022;
    // 护体受攻击  20080108
    const ET_PROTECTION_PIP = 20023;
    // 护体被破
    const SM_MYSHOW = 20024;
    // 显示自身动画
    const RM_MYSHOW   = 20025;
    const RM_OPENBOXS = 20026;
    // 打开宝箱 20080115
    const SM_OPENBOXS = 5064;
    // 打开宝箱 20080115
    const CM_OPENBOXS = 20027;
    // 打开宝箱 20080115 清清加
    const CM_MOVEBOXS = 20028;
    // 转动宝箱 20080117
    const RM_MOVEBOXS = 20029;
    // 转动宝箱 20080117
    const SM_MOVEBOXS = 20030;
    // 转动宝箱 20080117
    const CM_GETBOXS = 20031;
    // 客户端取得宝箱物品 20080118
    const SM_GETBOXS   = 20032;
    const RM_GETBOXS   = 20033;
    const SM_OPENBOOKS = 20034;
    // 打开卧龙NPC 20080119
    const RM_OPENBOOKS   = 20035;
    const RM_DRAGONPOINT = 20036;
    // 发送黄条气值 20080201
    const SM_DRAGONPOINT   = 20037;
    const ET_OBJECTLEVELUP = 20038;
    // 人物升级动画显示 20080222
    const RM_CHANGEATTATCKMODE = 20039;
    // 改变攻击模式 20080228
    const SM_CHANGEATTATCKMODE = 20040;
    // 改变攻击模式 20080228
    const CM_EXCHANGEGAMEGIRD = 20042;
    // 商铺兑换灵符  20080302
    const SM_EXCHANGEGAMEGIRD_FAIL = 20043;
    // 商铺购买物品失败
    const SM_EXCHANGEGAMEGIRD_SUCCESS = 20044;
    const RM_EXCHANGEGAMEGIRD_FAIL    = 20045;
    const RM_EXCHANGEGAMEGIRD_SUCCESS = 20046;
    const RM_OPENDRAGONBOXS           = 20047;
    // 卧龙开宝箱 20080306
    const SM_OPENDRAGONBOXS = 20048;
    // 卧龙开宝箱 20080306
    // SM_OPENBOXS_OK = 20047; //打开宝箱成功 20080306
    const RM_OPENBOXS_FAIL = 20049;
    // 打开宝箱失败 20080306
    const SM_OPENBOXS_FAIL = 20050;
    // 打开宝箱失败 20080306
    const RM_EXPTIMEITEMS = 20051;
    // 聚灵珠 发送时间改变消息 20080306
    const SM_EXPTIMEITEMS = 20052;
    // 聚灵珠 发送时间改变消息 20080306
    const ET_OBJECTBUTCHMON = 20053;
    // 人物挖尸体得到物品显示 20080325
    const ET_DRINKDECDRAGON = 20054;
    // 喝酒抵御合击，显示自身效果 20090105
    // SM_CLOSEDRAGONPOINT = 20055;  //关闭龙影黄条 20080329
    // ---------------------------粹练系统------------------------------------------
    const RM_QUERYREFINEITEM = 20056;
    // 打开粹练框口
    const SM_QUERYREFINEITEM = 20057;
    // 打开粹练框口
    const CM_REFINEITEM = 20058;
    // 客户端发送粹练物品 20080507
    const SM_UPDATERYREFINEITEM = 20059;
    // 更新粹练物品 20080507
    const CM_REPAIRFINEITEM = 20060;
    // 修补火云石 20080507 20080507
    const SM_REPAIRFINEITEM_OK = 20061;
    // 修补火云石成功  20080507
    const SM_REPAIRFINEITEM_FAIL = 20062;
    // 修补火云石失败  20080507
    // -----------------------------------------------------------------------------
    const RM_DAILY = 20063;
    // 逐日剑法 20080511
    const SM_DAILY = 20064;
    // 逐日剑法 20080511
    const RM_GLORY = 20065;
    // 发送到客户端 荣誉值 20080511
    const SM_GLORY = 20066;
    // 发送到客户端 荣誉值 20080511
    const RM_GETHEROINFO = 20067;
    const SM_GETHEROINFO = 20068;
    // 获得英雄数据
    const CM_SELGETHERO = 20069;
    // 取出英雄
    const RM_SENDUSERPLAYDRINK = 20070;
    // 出现请酒对话框 20080515
    const SM_SENDUSERPLAYDRINK = 20071;
    // 出现请酒对话框 20080515
    const CM_USERPLAYDRINKITEM = 20072;
    // 请酒框放上物品发送到M2
    const SM_USERPLAYDRINK_OK = 20073;
    // 请酒成功  20080515
    const SM_USERPLAYDRINK_FAIL = 20074;
    // 请酒失败 20080515
    const RM_PLAYDRINKSAY       = 20075;
    const SM_PLAYDRINKSAY       = 20076;
    const CM_PlAYDRINKDLGSELECT = 20077;
    // 商品选择,大类
    const RM_OPENPLAYDRINK = 20078;
    // 打开窗口
    const SM_OPENPLAYDRINK = 20079;
    // 打开窗口
    const CM_PlAYDRINKGAME = 20080;
    // 发送猜拳码数 20080517
    const RM_PlayDrinkToDrink = 20081;
    // 发送到客户端谁赢谁输
    const SM_PlayDrinkToDrink = 20082;
    const CM_DrinkUpdateValue = 20083;
    // 发送喝酒
    const RM_DrinkUpdateValue = 20084;
    // 返回喝酒
    const SM_DrinkUpdateValue = 20085;
    // 返回喝酒
    const RM_CLOSEDRINK = 20086;
    // 关闭斗酒，请酒窗口
    const SM_CLOSEDRINK = 20087;
    // 关闭斗酒，请酒窗口
    const CM_USERPLAYDRINK = 20088;
    // 客户端发送请酒物品
    const SM_USERPLAYDRINKITEM_OK = 20089;
    // 请酒物品成功
    const SM_USERPLAYDRINKITEM_FAIL = 20090;
    // 请酒物品失败
    const RM_Browser = 20091;
    // 连接指定网站
    const SM_Browser   = 20092;
    const RM_PIXINGHIT = 20093;
    // 劈星斩效果 20080611
    const SM_PIXINGHIT  = 20094;
    const RM_LEITINGHIT = 20095;
    // 雷霆一击效果 20080611
    const SM_LEITINGHIT = 20096;
    const CM_CHECKNUM   = 20097;
    // 检测验证码 20080612
    const SM_CHECKNUM_OK    = 20098;
    const CM_CHANGECHECKNUM = 20099;
    const RM_AUTOGOTOXY     = 20100;
    // 自动寻路
    const SM_AUTOGOTOXY = 20101;
    // -----------------------酿酒系统---------------------------------------------
    const RM_OPENMAKEWINE = 20102;
    // 打开酿酒窗口
    const SM_OPENMAKEWINE = 20103;
    // 打开酿酒窗口
    const CM_BEGINMAKEWINE = 20104;
    // 开始酿酒(即把材料全放上窗口)
    const RM_MAKEWINE_OK = 20105;
    // 酿酒成功
    const SM_MAKEWINE_OK = 20106;
    // 酿酒成功
    const RM_MAKEWINE_FAIL = 20107;
    // 酿酒失败
    const SM_MAKEWINE_FAIL = 20108;
    // 酿酒失败
    const RM_NPCWALK = 20109;
    // 酿酒NPC走动
    const SM_NPCWALK = 20110;
    // 酿酒NPC走动
    const RM_MAGIC68SKILLEXP = 20111;
    // 酒气护体技能经验
    const SM_MAGIC68SKILLEXP = 20112;
    // 酒气护体技能经验
    // ------------------------挑战系统--------------------------------------------
    const SM_CHALLENGE_FAIL = 20113;
    // 挑战失败
    const SM_CHALLENGEMENU = 20114;
    // 打开挑战抵押物品窗口
    const CM_CHALLENGETRY = 20115;
    // 玩家点挑战
    const CM_CHALLENGEADDITEM = 20116;
    // 玩家把物品放到挑战框中
    const SM_CHALLENGEADDITEM_OK = 20117;
    // 玩家增加抵押物品成功
    const SM_CHALLENGEADDITEM_FAIL = 20118;
    // 玩家增加抵押物品失败
    const SM_CHALLENGEREMOTEADDITEM = 20119;
    // 发送增加抵押的物品后,给客户端显示
    const CM_CHALLENGEDELITEM = 20120;
    // 玩家从挑战框中取回物品
    const SM_CHALLENGEDELITEM_OK = 20121;
    // 玩家删除抵押物品成功
    const SM_CHALLENGEDELITEM_FAIL = 20122;
    // 玩家删除抵押物品失败
    const SM_CHALLENGEREMOTEDELITEM = 20123;
    // 发送删除抵押的物品后,给客户端显示
    const CM_CHALLENGECANCEL = 20124;
    // 玩家取消挑战
    const SM_CHALLENGECANCEL = 20125;
    // 玩家取消挑战
    const CM_CHALLENGECHGGOLD = 20126;
    // 客户端把金币放到挑战框中
    const SM_CHALLENCHGGOLD_FAIL = 20127;
    // 客户端把金币放到挑战框中失败
    const SM_CHALLENCHGGOLD_OK = 20128;
    // 客户端把金币放到挑战框中成功
    const SM_CHALLENREMOTECHGGOLD = 20129;
    // 客户端把金币放到挑战框中,给客户端显示
    const CM_CHALLENGECHGDIAMOND = 20130;
    // 客户端把金刚石放到挑战框中
    const SM_CHALLENCHGDIAMOND_FAIL = 20131;
    // 客户端把金刚石放到挑战框中失败
    const SM_CHALLENCHGDIAMOND_OK = 20132;
    // 客户端把金刚石放到挑战框中成功
    const SM_CHALLENREMOTECHGDIAMOND = 20133;
    // 客户端把金刚石放到挑战框中,给客户端显示
    const CM_CHALLENGEEND = 20134;
    // 挑战抵押物品结束
    const SM_CLOSECHALLENGE = 20135;
    // 关闭挑战抵押物品窗口
    // ----------------------------------------------------------------------------
    const RM_PLAYMAKEWINEABILITY = 20136;
    // 酒2相关属性 20080804
    const SM_PLAYMAKEWINEABILITY = 20137;
    // 酒2相关属性 20080804
    const RM_HEROMAKEWINEABILITY = 20138;
    // 酒2相关属性 20080804
    const SM_HEROMAKEWINEABILITY = 20139;
    // 酒2相关属性 20080804
    const RM_CANEXPLORATION = 20140;
    // 可探索 20080810
    const SM_CANEXPLORATION = 20141;
    // 可探索 20080810
    // ----------------------------------------------------------------------------
    const SM_SENDLOGINKEY = 20142;
    // 网关给客户端或登陆器发送登陆器封包码 20080901
    const SM_GATEPASS_FAIL = 20143;
    // 和网关的密码错误
    const RM_HEROMAGIC68SKILLEXP = 20144;
    // 英雄酒气护体技能经验  20080925
    const SM_HEROMAGIC68SKILLEXP = 20145;
    // 英雄酒气护体技能经验  20080925
    const RM_USERBIGSTORAGEITEM = 20146;
    // 用户无限仓库项目
    const RM_USERBIGGETBACKITEM = 20147;
    // 用户获得回的无限仓库项目
    const RM_USERLEVELORDER = 20148;
    // 用户等级命令
    const RM_HEROAUTOOPENDEFENCE = 20149;
    // 英雄内挂自动持续开盾 20080930
    const SM_HEROAUTOOPENDEFENCE = 20150;
    // 英雄内挂自动持续开盾 20080930
    const CM_HEROAUTOOPENDEFENCE = 20151;
    // 英雄内挂自动持续开盾 20080930
    const RM_MAGIC69SKILLEXP = 20152;
    // 内功心法经验
    const SM_MAGIC69SKILLEXP = 20153;
    // 内功心法经验
    const RM_HEROMAGIC69SKILLEXP = 20154;
    // 英雄内功心法经验  20080930
    const SM_HEROMAGIC69SKILLEXP = 20155;
    // 英雄内功心法经验  20080930
    const RM_MAGIC69SKILLNH = 20156;
    // 内力值(黄条) 20081002
    const SM_MAGIC69SKILLNH = 20157;
    // 内力值(黄条) 20081002
    const RM_WINNHEXP = 20158;
    // 取得内功经验 20081007
    const SM_WINNHEXP = 20159;
    // 取得内功经验 20081007
    const RM_HEROWINNHEXP = 20160;
    // 英雄取得内功经验 20081007
    const SM_HEROWINNHEXP = 20161;
    // 英雄取得内功经验 20081007
    const SM_SHOWSIGHICON = 20162;
    // 显示感叹号图标 20090126
    const RM_HIDESIGHICON = 20163;
    // 隐藏感叹号图标 20090126
    const SM_HIDESIGHICON = 20164;
    // 隐藏感叹号图标 20090126
    const CM_CLICKSIGHICON = 20165;
    // 点击感叹号图标 20090126
    const SM_UPDATETIME = 20166;
    // 统一与客户端的倒计时 20090129
    const RM_OPENEXPCRYSTAL = 20167;
    // 显示天地结晶图标 20090201
    const SM_OPENEXPCRYSTAL = 20168;
    // 显示天地结晶图标 20090201
    const SM_SENDCRYSTALNGEXP = 20169;
    // 发送天地结晶的内功经验 20090201
    const SM_SENDCRYSTALEXP = 20170;
    // 发送天地结晶的内功经验 20090201
    const SM_SENDCRYSTALLEVEL = 20171;
    // 发送天地结晶的等级 20090202
    const CM_CLICKCRYSTALEXPTOP = 20172;
    // 点击天地结晶获得经验 20090202
    const SM_ZHUIXIN_OK = 20172;
    // 追心刺
    // //////////////////////////////////////////////////////////////////////////////
    const UNITX = 48;
    const UNITY = 32;
    const HALFX = 24;
    const HALFY = 16;
    // MAXBAGITEM = 46; //用户背包最大数量
    // MAXMAGIC = 30{20}; //原来54; 200081227 注释
    const MAXSTORAGEITEM = 50;
    const LOGICALMAPUNIT = 40;

}
