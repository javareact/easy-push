<?php

namespace Test\EasyPay;

use PHPUnit\Framework\TestCase;

/**
 * 推送测试
 * @internal
 */
class PushTest extends TestCase
{

    public $device    = 'AitXtLWl7qd3eh2zOxjoGysPtMrcw0I7_9YwBD5w1ZGz';
    public $driveName = 'Umeng';
    public $drive;
    public $config    = [
        'android' => [
            'appKey'          => '5edddbc8570df3bb7400041b',
            'appMasterSecret' => 'xq2l6oqwhnhbf5i99quxmrijz8wlmpzq'
        ],
        'IOS'     => [
            'appKey'          => 'appKey',
            'appMasterSecret' => 'appMasterSecret'
        ]
    ];

    /**
     * 打印消息
     * @param $message
     */
    public function dump($message)
    {
        echo $message;
        echo PHP_EOL;
    }

    /**
     * 初始化驱动
     * @return mixed
     * @throws \Exception
     */
    protected function setUp(): void
    {
        if (!empty($this->drive)) return;
        $this->drive = \JavaReact\EasyPush\core\PushFactory::getInstance($this->driveName)::init($this->config)
            ->setSystemMessage(true)
            ->setTitle('标题')
            ->setBody('消息正文')
            ->setExtendedData(['a' => 1, 'b' => 2]);// 自定义扩展参数
    }

    /**
     * 广播：所有平台
     */
    public function testSendAll()
    {
        $result = $this->drive->sendAll();
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

    /**
     * 广播：安卓
     */
    public function testSendAllAndroid()
    {
        $result = $this->drive->sendAllAndroid();
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

    /**
     * 广播：IOS
     */
    public function testsendAllIOS()
    {
        $result = $this->drive->sendAllIOS();
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

    /**
     * 单播：所有平台
     */
    public function testSendOne()
    {
        $result = $this->drive->sendOne($this->device);
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

    /**
     * 单播：安卓
     */
    public function testSendOneAndroid()
    {
        $result = $this->drive->sendOneAndroid($this->device);
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

    /**
     * 单播：IOS
     */
    public function testSendOneIOS()
    {
        $result = $this->drive->sendOneIOS($this->device);
        $result || $this->dump($this->drive->getError());
        $this->assertTrue($result);
    }

}