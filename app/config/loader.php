<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(array(
       "App\Bootstrap"          => $config->application->bootstrapDir,
       "App\Model"              => $config->application->modelsDir,
       "App\Library\Helper"     => $config->application->libraryDir."helper/",
    )
);

$loader->register();

