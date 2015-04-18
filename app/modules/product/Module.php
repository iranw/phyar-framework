<?php
namespace App\Modules\Product;

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
                'App\Modules\Product\Controllers' => __dir__ . '/controllers/',
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
            $dispatcher->setDefaultNamespace("App\Modules\Product\Controllers");
            return $dispatcher;
        });
    }

}