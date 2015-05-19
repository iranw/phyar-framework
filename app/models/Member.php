<?php
namespace App\Model;

\Phalcon\Mvc\Model::setup(array(
    'MODELS_PRIMARY_KEY ' => array('id'),
));

class Member extends \App\Model\BaseModel{

    public $username;

    public function getSource(){
        return 'member';
    }



}