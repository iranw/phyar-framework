# Phyar框架

RPC接口端框架，使用phalcon全栈框架+yar并发框架组装实现统一接口调取(restful/get/post/yar等请求)的全栈框架

####功能实现

> * 识别Post/Get接口请求
> * 实现Restful请求
> * 实现Yar单请求以及并发请求
> * 读写分离
> * 分布式缓存

注:同一url可以实现`post`/`get`/`restful`/`yar`请求

###框架目录

    ###### 组织架构如下: 
        phyar-framework                                 //根目录(这个无所谓随便起)
            |---README.md                               //帮助文档
            |---.htaccess                               //
            |---vendor                                  //第三方类库包目录
            |---public                                  //入口目录
                  |---index.php                         //入口文件
                  |---.htaccess                         //
            |---app                                     //应用目录
                  |---bootstrap
                        |---Service.php                 //yar数据分发中枢
                  |---config
                        |---loader.php                  //自动加载服务
                        |---routes.php                  //路由服务
                        |---services.php                //提供服务注入
                  |---controllers
                        |---IndexController.php
                  |---library
                        |---config
                               |---BasicCon.php         //应用配置文件 例如国家、会员等级等
                        |---helper
                               |---ArrayHelp.php        //扩展类库
                               |---StringHlep.php       //扩展类库
                  |---models
                        |---BaseModel.php               //模型基类
                        |---Member.php                  //样例
                  |---modules                           //多模块目录
                        |---user                        //user用户模块
                             |---controllers            
                                    |---IndexController.php
                             |---Module.php



### 样例演示
注:以下仅为概述，具体请求随后补充


以[http://192.168.8.234:7070/user/index/get](http://192.168.8.234:7070/user/index/get)为请求对象

###### 1、`Post/Get`请求 示例如下:

```php
<?php
//get请求
$url = "http://192.168.8.234:7070/user/index/get?uid=120";
$response = file_get_contents($url);
echo $response."<br>\n";

//post请求
$url = "http://192.168.8.234:7070/user/index/get";
$postArr = array('uid'=>200);
$response = curl_by_post($url,$postArr);
echo $response."<br>\n";

function curl_by_post($url,$post) {
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}
```

###### 2、`Restful`请求 示例如下:

```php
<?php
$url = "http://192.168.8.234:7070/user/index/get/uid/300";
$response = file_get_contents($url);
echo $response."<br>\n";

$url = "http://192.168.8.234:7070/user/index/del/uid/300";
$response = file_get_contents($url);
echo $response."<br>\n";
```

###### 3、yar请求 示例如下

```php
<?php
$params = array('uid'=>2548);
$rpcUrl = 'http://192.168.8.234:7070/user/index/get';
$client = new yar_client($rpcUrl);
$result = $client->run($params);
var_dump($result);
```

###### 4、yar并发请求 示例如下:

```php
<?php
$params = array('uid'=>2548);

Yar_Concurrent_Client::call("http://192.168.8.234:7070/user/index/get", "run", array($params), "callback");
Yar_Concurrent_Client::call("http://192.168.8.234:7070/user/index/del", "run", array($params), "callback");
Yar_Concurrent_Client::loop("callback", "error_callback"); //send the requests, 

function callback($retval, $callinfo) {
    echo $retval."\n<br>\n";
}
function error_callback($type, $error, $callinfo) {
    error_log($error);
}
```