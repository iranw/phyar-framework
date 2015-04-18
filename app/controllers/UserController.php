<?php


class UserController extends Phalcon\Mvc\Controller {

    public function indexAction() {
        echo 'bv';
        return 'asdf';
    }

    public function getUidAction($uid=0){
        echo $uid;
    }

    public function testAction(){
        $year = $this->dispatcher->getParam("year");
        echo $year;
    }

}