<?php
namespace App\Modules\User\Controllers;

class IndexController extends \Phalcon\Mvc\Controller {

    /**
     * 说明文档
     * 需要给参数($uid)默认一个初始值
     */
    public function indexAction($uid=false){
        $uid = $uid==false?$this->params['uid']:$uid;

        // $string = \App\Library\Helper\StringHelp::itest();
        // echo $string;
        // exit();

        // $mem = \App\Model\Member::findFirst($uid);
        // print_r($mem);

        // $content = "username:".$mem->username;
        $content = 'asd';

        return $this->di->get('response')->setContent($content);
        // return $this->di->get('response')->setJsonContent($content);
    }

    public function testAction(){
        // echo 'test';
        $content = 'asdf';
        return $this->di->get('response')->setContent($content);
    }

    public function getUserByUidAction($uid=0,$arr = array('a'=>'A')){
        // echo 'asdf';
        $uid = $this->request->get('uid',null,$uid);

        // // print_r($_GET);

        // echo $uid = $this->request->get('uid2',null,$uid);
        // $params = $this->di->get('params');
        // print_r($params);
        $content = "uid:".$uid;    
        return $response->setContent($content);
    }
}
