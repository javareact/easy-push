<?php

namespace JavaReact\EasyPush\core;

/**
 * 推送工厂
 */
class PushFactory
{

    /**
     * @var array
     */
    private static $drive = [
        'Umeng' => '\JavaReact\EasyPush\drive\UmengService',
        'GeTui' => '\JavaReact\EasyPush\drive\GeTuiService',
    ];

    /**
     * @param string $driveName 推送
     * @return \JavaReact\EasyPush\drive\UmengService
     * @throws \Exception
     */
    public static function getInstance(string $driveName)
    {
        if (!isset(static::$drive[$driveName])) throw new \Exception('没有这个驱动');
        return new static::$drive[$driveName];
    }
}