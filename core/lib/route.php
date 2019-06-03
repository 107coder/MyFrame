<?php
namespace core\lib;
use core\lib\config;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
        
        //xxx.com/index/index
        /**
         * 1.隐藏index.php
         * 2.获取URL参数部分
         * 3.返回对应控制器和方法
         */
        // p($_SERVER);
        $url = $_SERVER['REQUEST_URI'];
        
        if(isset($url) && $url != '/'){
            $patharr = explode('/',trim($url,'/'));
            if(isset($patharr[0])){
                $this->ctrl=$patharr[0];
                unset($patharr[0]);
            }
            if(isset($patharr[1])){
                $this->action=$patharr[1];
                unset($patharr[1]);
            }else{
                $this->action=config::get('ACTION','route');
            }
            //url多余的部分转成成 GET
            //id/i/str/2/test/3
            $count =count($patharr)+2;
            $i =2;
            while($i<$count){
                if(isset($patharr[$i+1])){
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->ctrl = config::get('CTRL','route');
            $this->action = config::get('ACTION','route');
        }

        
    }
}