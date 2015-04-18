<?php

return new \Phalcon\Config(array(
    'application' => array(
        'bootstrapDir'      => __DIR__ . '/../../app/bootstrap/',
        'appDir'            => __DIR__ . '/../../app/',
        'controllersDir'    => __DIR__ . '/../../app/controllers/',
        'modelsDir'         => __DIR__ . '/../../app/models/',
        'viewsDir'          => __DIR__ . '/../../app/views/',
        'pluginsDir'        => __DIR__ . '/../../app/plugins/',
        'libraryDir'        => __DIR__ . '/../../app/library/',
        'cacheDir'          => __DIR__ . '/../../app/cache/',
        'extension'         => __DIR__ . '/../../app/library/extension/',
        'extOther'          => __DIR__ . '/../../app/library/other/',
        'baseUri'           => '/',
        'logDir'            => __DIR__ . '/../../app/logs/',
    ),

    //多模块配置
    'modules' => array(
        'user' => array(
            'className' => '\App\Modules\User\Module',
            'path'      => __DIR__ . '/../../app/modules/user/Module.php',
        )
    ),

    //数据库配置 读写分离
    'mysql' =>array(
        'dbRead' => array(
            'adapter'   => 'Mysql',
            'host'      => '192.168.8.7',
            'username'  => 'test',
            'password'  => '123456',
            'dbname'    => 'test',
        ),
        'dbWrite' => array(
            'adapter'   => 'Mysql',
            'host'      => '192.168.8.234',
            'username'  => 'root',
            'password'  => '7232275',
            'dbname'    => 'test',
        ),
    ),

    //缓存服务器配置
    'memcache' =>array(//分布式缓存
        'servers'=>array(
            array(
                'host'=>'192.168.1.52',
                'port'=>11211,
                'weight'=>1
            ),
            array(
                'host'=>'192.168.1.51',
                'port'=>11211,
                'weight'=>2
            ),
        ),
        'prefix'=>'gc_',//
        'lifetime'=> 259200,//memcache 3 days           
    ),

));
