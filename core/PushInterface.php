<?php

namespace JavaReact\EasyPush\core;


interface PushInterface
{

    /**
     * 发送广播
     * @return mixed
     */
    public function sendAll();

    /**
     * 安卓 - 广播
     * @return mixed
     */
    public function sendAllAndroid();

    /**
     * IOS - 广播
     * @return mixed
     */
    public function sendAllIOS();

    /**
     * 发送组播
     * @return mixed
     */
    public function sendGroup();

    /**
     * 安卓 - 组播
     * @return mixed
     */
    public function sendGroupAndroid();

    /**
     * IOS - 组播
     * @return mixed
     */
    public function sendGroupIOS();

    /**
     * 单播
     * @param $device
     * @return mixed
     */
    public function sendOne($device);

    /**
     * 安卓 - 单播
     * @param $device
     * @return mixed
     */
    public function sendOneAndroid($device);

    /**
     * IOS - 单播
     * @param $device
     * @return mixed
     */
    public function sendOneIOS($device);

    /**
     * 获取错误信息
     * @return mixed
     */
    public function getError();

    /**
     * 获取访问接口的结果
     * @return mixed
     */
    public function getResult();
}