<?php
namespace App\Bootstrap;

class Service{
    private $application;

    function __construct($application){
        $this->application = $application;
    }
    
    public function run($params=array()){
        $this->application->getDI()->setShared('params',function() use ($params){
            return $params;
        });
        // $this->application->getDI()->set('params',$params);
        return $this->application->handle()->getContent();
    }
}