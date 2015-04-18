<?php
$start_time = microtime(true);

ini_set('display_errors','On');
error_reporting(E_ALL);



try {
    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include $config->application->appDir . "config/loader.php";


    /**
     * Read services
     */
    include $config->application->appDir . "config/services.php";


    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    // print_r($config->modules->toArray());exit();

    $application->registerModules($config->modules->toArray());

    if ( substr($di['request']->getUserAgent(), 0, 11) === 'PHP Yar Rpc') {
        $service = new Yar_Server(new \App\Bootstrap\Service($application));
        $service->handle();
    }else if($di['request']->getQuery('_method') == 'yar'){
        list($tmp,$module,$controller,$action) = explode('/', $di['request']->getURI());
        $className = "App\Modules\\".ucfirst($module)."\Controllers\\".ucfirst($controller)."Controller";
        include "../app/modules/user/controllers/IndexController.php";
        // $obj = "App\Modules\User\Controllers\IndexController()";
        $service = new Yar_Server();
        $service->handle();
    }else{
        $application->getDI()->set('params',function() use($di){
            return $di['request']->get();
        });
        echo $application->handle()->getContent();
        $end_time = microtime(true);
        echo "\n<br>\n";
        echo $end_time - $start_time;
    }
} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}


