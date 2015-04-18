<?php
namespace App\Modules\User;

class Module 
{

    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders() 
    {

        $loader = new \Phalcon\Loader;

        $loader->registerNamespaces(
            array(
                'App\Modules\User\Controllers' => __dir__ . '/controllers/',
                // 'App\Modules\User\Models'      => __dir__ . '/models/',
            )
        );
        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices($di)
    {
        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace("App\Modules\User\Controllers");
            return $dispatcher;
        });
    }

}