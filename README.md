# push
设计概要：

工厂模式：可根据配置随时切换第三方推送

PHP版本：个推PHP7以上，友盟5.3以上，如果PHP版本低可自行改一下兼容的，应该只有一两处地方不兼容

目前支持的驱动有：友盟、个推

接口规范

其他说明：本包库没有对ui外观做定制功能，全都是使用推送平台的默认设置，如果以后需要定制外观时，会在配置文件配置切入。

## 运行示例

```php
<?php
                
// -------------------- 独立运行：工厂模式 ---------------------

# 赋值你要使用哪个平台的配置，说明文档最下面为各平台的配置参考

// 设置标题和消息、自定义参数
$push = PushFactory::getInstance($driveName)::init($config)
        ->setTitle('标题')
        ->setBody('消息正文')
        ->setExtendedData(['a' => 1, 'b' => 2]);// 自定义扩展参数

        
        
//   ***************  发送方法  **********   
# 广播：所有平台
$push->sendAll();
# 广播：安卓
$push->sendAllAndroid();
# 广播：IOS
$push->sendAllIOS();

# 单播：所有平台
$push->sendOne('设备码');
# 单播：安卓
$push->sendOneAndroid('设备码');
# 单播：IOS
$push->sendOneIOS('设备码');

```

## 各推送平台配置
以下为各推送平台的配置，你用哪个平台就复制哪个配置
```php
<?php
//  ***  初始化驱动
// 友盟配置
$config = [
    'android' => [
        'appKey' => 'appKey',
        'appMasterSecret' => 'appMasterSecret'
    ],
    'IOS' => [
        'appKey' => 'appKey',
        'appMasterSecret' => 'appMasterSecret'  
    ]
];
// 信使配置
$config = [
   'expireTime' => 86400,
    'android' => [
       'accessId' => 'accessId',
       'secret_key' => 'secret_key',
    ],
    'IOS' => [
       'accessId' => 'accessId',
       'secret_key' => 'secret_key',
    ]
];

// 个推配置
$config = [
  'AppID' => 'AppID',
  'AppKey' => 'AppKey',
  'MasterSecret' => 'AppKey',
];

```

## 配置
```php
<?php

// 接上面的配置

// 友盟
$driveName = 'Umeng';

// 信鸽
$driveName = 'Xingge';

// 个推
$driveName = 'GeTui';

// YII的components设置：
'components'=> [
        'push' => [
            'class' => 'xing\push\Yii',
            'driveName' => $driveName, // 驱动名
            // 配置
            'config' => $config
        ],
];

```

## 透传消息（自定义消息通知）

如无说明，默认都是透传消息。

其中友盟的安卓手机通知会发送两次通知，一次是消息通知，一次为透传通知

其中个推只要设置了扩展参数，就会发送透传消息，否则为默认通知。