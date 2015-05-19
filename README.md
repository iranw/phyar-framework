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

文档：暂时参考[https://github.com/iranw/yarf-framework](https://github.com/iranw/yarf-framework)文档，

