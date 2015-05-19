<?php
namespace App\Modules\User\Controllers;

class IndexController extends \Phalcon\Mvc\Controller {

    /**
     * 说明文档
     * 需要给参数($uid)默认一个初始值
     */
    public function indexAction($uid=false){
        $uid = $uid==false?$this->params['uid']:$uid;
        // $uid = $this->params['uid'];

        // $string = \App\Library\Helper\StringHelp::itest();
        // echo $string;
        // exit();

        $mem = \App\Model\Member::findFirst(1);
        $mem->username='2name';
        $mem->age="23";
        $mem->save();
        // print_r($mem);
        // echo $mem->username;

        $content = "username:".$mem->username;

        // return $this->di->get('response')->setContent($content);
        return $this->di->get('response')->setJsonContent($uid);
    }

    public function testAction(){
        // echo 'test';
        $content = 'asdf3232as22d';
        return $this->di->get('response')->setContent($content);
    }

    public function getUserByUidAction($uid=false){
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
