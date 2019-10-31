<?php
namespace app\Packet;

/**
 * 操作码
 */
class OpCode
{
    // For User login Process
    const CM_PROTOCOL        = 2000;
    const CM_IDPASSWORD      = 2001; //登录 客户端向服务器发送ID和密码
    const CM_IDPASSWORD_2    = 22001;
    const CM_ADDNEWUSER      = 2002; //注册
    const CM_CHANGEPASSWORD  = 2003; //修改密码
    const CM_UPDATEUSER      = 2004; // 更新注册资料
    const CM_GETBACKPASSWORD = 2010; // 密码找回

    const CM_SELECTSERVER        = 104;
    const SM_CERTIFICATION_FAIL  = 501; //登录世界认证失败
    const SM_ID_NOTFOUND         = 502; //账户未找到
    const SM_PASSWD_FAIL         = 503; //验证失败,"服务器验证失败,需要重新登录"
    const SM_NEWID_SUCCESS       = 504; //创建用户成功
    const SM_NEWID_FAIL          = 505; //创建账户失败重名
    const SM_CHGPASSWD_SUCCESS   = 506; //密码修改成功
    const SM_PASSOK_SELECTSERVER = 529; //码验证完成且密码正确,开始选服
    const SM_SELECTSERVER_OK     = 530; //选服成功

    // For Select Player Process;
    const CM_QUERYCHR       = 100;
    const CM_NEWCHR         = 101;
    const CM_DELCHR         = 102;
    const CM_SELCHR         = 103;
    const SM_QUERYCHR       = 520;
    const SM_NEWCHR_SUCCESS = 521;
    const SM_NEWCHR_FAIL    = 522;
    const SM_DELCHR_SUCCESS = 523;
    const SM_DELCHR_FAIL    = 524;
    const SM_STARTPLAY      = 525;
    const SM_STARTFAIL      = 526;
    const SM_QUERYCHR_FAIL  = 527;

    public static $OpCodeMap;

    //加载操作码
    public static function LoadOpCode()
    {
        //获取类的所有常量
        $objClass = new \ReflectionClass(new OpCode());
        $arrConst = $objClass->getConstants();

        $OpCodeList = [];
        foreach ($arrConst as $k => $v) {
            $OpCodeList[$v] = $k;
        }

        WORLD_LOG('Load Opcode Success , The total number: ' . count($OpCodeList), 'success');

        self::$OpCodeMap = $OpCodeList;
    }

    //获取操作码
    public static function GetOpCode($OpCode, $fd)
    {
        $OpCodeName = isset(self::$OpCodeMap[$OpCode]) ? self::$OpCodeMap[$OpCode] : false;

        if ($OpCodeName) {
            AUTH_LOG('[' . $OpCodeName . '] Client : ' . $fd, 'warning');
        }

        return $OpCodeName;
    }
}
