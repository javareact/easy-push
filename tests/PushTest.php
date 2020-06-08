<?php

namespace Test\EasyPay;

use PHPUnit\Framework\TestCase;

/**
 * 推送测试
 * @internal
 */
class PushTest extends TestCase
{
    public $driveName = 'Umeng';
    public $drive;
    public $config    = [
        'android' => [
            'appKey'          => 'appKey',
            'appMasterSecret' => 'appMasterSecret'
        ],
        'IOS'     => [
            'appKey'          => 'appKey',
            'appMasterSecret' => 'appMasterSecret'
        ]
    ];

    /**
     * 初始化
     * @return mixed
     * @throws \Exception
     */
    protected function initDrive()
    {
        if (!empty($this->drive)) return $this->drive;
        $this->drive = \JavaReact\EasyPush\core\PushFactory::getInstance($this->driveName)::init($this->config)
            ->setTitle('标题')
            ->setBody('消息正文')
            ->setExtendedData(['a' => 1, 'b' => 2]);// 自定义扩展参数
    }

    /**
     * 广播：所有平台
     */
    public function testSendAll()
    {
        $this->drive->sendAll();
    }

    /**
     * 广播：安卓
     */
    public function testSendAllAndroid()
    {
        $this->drive->sendAllAndroid();
    }

    /**
     * 广播：IOS
     */
    public function testsendAllIOS()
    {
        $this->drive->sendAllIOS();
    }

    /**
     * 单播：所有平台
     */
    public function testSendOne()
    {
        $this->drive->sendOne('设备码');
    }

    /**
     * 单播：安卓
     */
    public function testSendOneAndroid()
    {
        $this->drive->sendOneAndroid('设备码');
    }

    /**
     * 单播：IOS
     */
    public function testSendOneIOS()
    {
        $this->drive->sendOneIOS('设备码');
    }

}