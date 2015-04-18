<?php
namespace App\Model;

class BaseModel extends \Phalcon\Mvc\Model{
    public function initialize() {
        $this->setReadConnectionService('dbRead');
        $this->setWriteConnectionService('dbWrite');
    }
}