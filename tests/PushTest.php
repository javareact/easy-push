<?php

namespace Test\EasyPay;

use JavaReact\EasyPush\core\PushFactory;
use PHPUnit\Framework\TestCase;

/**
 * 推送测试
 * @internal
 */
class PushTest extends TestCase
{
    public  $driveName     = 'Umeng';
    public  $drive;
    public  $config        = [
        'android' => [
            'appKey'          => 'appKey',
            'appMasterSecret' => 'appMasterSecret'
        ],
        'IOS'     => [
            'appKey'          => 'appKey',
            'appMasterSecret' => 'appMasterSecret'
        ]
    ];
    public $title         = '标题';
    public $body          = '消息正文';
    public $systemMessage = '设备码';
    public $extendedData  = ['a' => 1, 'b' => 2];

    protected function initDrive()
    {
        if (!empty($this->drive)) return $this->drive;
        $this->drive                = PushFactory::getInstance($this->driveName)::init($this->config);
        $this->drive->title         = $this->title;
        $this->drive->body          = $this->body;
        $this->drive->systemMessage = $this->systemMessage;
        $this->drive->extendedData  = $this->extendedData;
    }

    // 发送广播
    public function testSendAll()
    {
        $this->initDrive();
        $this->testSendAllAndroid();
        $this->testSendAllIOS();
    }

    // 安卓 - 广播
    public function testSendAllAndroid()
    {
        $this->initDrive();
        return $this->drive->sendAllAndroid();
    }

    // IOS - 广播
    public function testSendAllIOS()
    {
        $this->initDrive();
        return $this->drive->sendAllIOS();
    }

    /**
     * 单播：所有平台
     * @param string $device
     */
    public function testSendOne($device)
    {
        $this->initDrive();
        return $this->drive->sendOne($device);
    }

    /**
     * 安卓 - 单播
     * @param string $device 发送设备
     */
    public function testSendOneAndroid($device)
    {
        $this->initDrive();
        return $this->drive->sendOneAndroid($device);
    }

    /**
     * IOS - 单播
     * @param string $device 发送设备
     */
    public function testSendOneIOS($device)
    {
        $this->initDrive();
        return $this->drive->sendOneIOS($device);
    }

    // 发送组播
    public function testSendGroup()
    {
        $this->initDrive();
        return $this->drive->sendGroup();
    }

    // 安卓 - 组播
    public function testSendGroupAndroid()
    {
        $this->initDrive();
        return $this->drive->sendGroupAndroid();
    }

    // IOS - 组播
    public function testSendGroupIOS()
    {
        $this->initDrive();
        return $this->drive->sendGroupIOS();
    }

    public function getError()
    {
        return $this->drive->getError();
    }

    public function getResult()
    {
        return $this->drive->getResult();
    }
}