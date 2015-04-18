<?php

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new Phalcon\DI\FactoryDefault();

$di->set('config',$config);

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

$di->set('view', function(){
    $view = new Phalcon\Mvc\View();
    $view->disable();
    return $view;
}, true);

// $di->setShared('config', $config);
/**
 * add routing capabilities
 */
$di->set('router',function() use($config) {  
    require $config->application->appDir . 'config/routes.php';
    return $router;
});

$di->set("response", new \Phalcon\Http\Response);

$di->set("request", new \Phalcon\Http\Request);

//数据库配置
$di->set('dbRead', function () use ($config) {
    return new Phalcon\Db\Adapter\Pdo\Mysql(array(
        'host'      => $config->mysql->dbRead->host,
        'username'  => $config->mysql->dbRead->username,
        'password'  => $config->mysql->dbRead->password,
        'dbname'    => $config->mysql->dbRead->dbname
    ));
});
$di->set('dbWrite',function() use ($config) {
    return new Phalcon\Db\Adapter\Pdo\Mysql(array(
        'host'      => $config->mysql->dbWrite->host,
        'username'  => $config->mysql->dbWrite->username,
        'password'  => $config->mysql->dbWrite->password,
        'dbname'    => $config->mysql->dbWrite->dbname
    ));
});

$di->set('dbWrite',function() use ($config) {
    return new Phalcon\Db\Adapter\Pdo\Mysql(array(
        'host'      => $config->mysql->dbWrite->host,
        'username'  => $config->mysql->dbWrite->username,
        'password'  => $config->mysql->dbWrite->password,
        'dbname'    => $config->mysql->dbWrite->dbname
    ));
});

//缓存服务器配置
/**
 * Set the models cache service
 */
$di->set('Cache',function() use ($config){
    //Cache data for one day by default(86400s=1day)
    $frontCache = new \Phalcon\Cache\Frontend\Data(array(
        'lifetime'=>$config->memcache->lifetime,
    ));
    //Memcached connection settings
    $cache = new \Phalcon\Cache\Backend\Memcache($frontCache,array(
        "prefix" => $config->memcache->prefix,
        'host' => $config->memcache->host,
        'port' => $config->memcache->port,
        'persistent' => $config->memcache->persistent,
    ));
    return $cache;
},true);

