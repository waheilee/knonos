<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'oss' => [
            'driver'        => 'oss',
            'access_id'     => env('ALIYUN_OSS_ACCESS_ID'),
            'access_key'    => env('ALIYUN_OSS_ACCESS_KEY'),
            'bucket'        => env('ALIYUN_OSS_BUCKET'),
            'endpoint'      => env('ALIYUN_OSS_ENDPOINT'), // OSS 外网节点或自定义外部域名
            'endpoint_internal' => env('ALIYUN_OSS_ENDPOINT_INTERNAL'), // v2.0.4 新增配置属性，如果为空，则默认使用 endpoint 配置(由于内网上传有点小问题未解决，请大家暂时不要使用内网节点上传，正在与阿里技术沟通中)
            'cdnDomain'     => env('ALIYUN_OSS_DOMAIN'), // 如果isCName为true, getUrl会判断cdnDomain是否设定来决定返回的url，如果cdnDomain未设置，则使用endpoint来生成url，否则使用cdn
            'ssl'           => false, // true to use 'https://' and false to use 'http://'. default is false,
            'isCName'       => true, // 是否使用自定义域名,true: 则Storage.url()会使用自定义的cdn或域名生成文件url， false: 则使用外部节点生成url
            'debug'         => true
        ],
        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => 'qiniuyun.yd-hb.com', //你的七牛域名
                'https'     => 'store.yd-hb.com/',         //你的HTTPS域名
                'custom'    => 'static.abc.com',                //Useless 没啥用，请直接使用上面的 default 项
            ],
            'access_key'=> '7oS5IzzbkZtebskuMJdMNNPBMD0ktYevRRc8NgM9',  //AccessKey
            'secret_key'=> 'bclrNqXTCLywP87TV66Wp_RWQONU6HPuCM-38e_r',  //SecretKey
            'bucket'    => 'yg2020',  //Bucket名字
            'notify_url'=> '',  //持久化处理回调地址
            'access'    => 'public',  //空间访问控制 public 或 private
            'hotlink_prevention_key' => 'afc89ff8bd2axxxxxxxxxxxxxxbb', // CDN 时间戳防盗链的 key。 设置为 null 则不启用本功能。
//            'hotlink_prevention_key' => 'cbab68a279xxxxxxxxxxab509a', // 同上，备用
        ],

    ],

];
