<?php

/**
 * 格式化打印函数
 */
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(NULL);
    }else{
        echo "<pre stype='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#f5f5f5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
    }
}

/**获取post数据 */
function post($name,$default =false,$fitt=false)
{
    if(isset($_POST[$name])){
        
        if($fitt){
            switch($fitt){
                case 'int':
                    if(is_number($_POST[$name])){
                        return $_POST[$name];
                    }else {
                        return $default;
                    }break;
                default: ;
            }
        }else {
            return $_POST[$name];
        }
    }else{
        return $default;
    }
}

/**获取get数据 */
function get($name,$default =false,$fitt=false)
{
    if(isset($_GET[$name])){
        
        if($fitt){
            switch($fitt){
                case 'int':
                    if(is_numeric($_GET[$name])){
                        return $_GET[$name];
                    }else {
                        return $default;
                    }break;
                default: ;
            }
        }else {
            return $_GET[$name];
        }
    }else{
        return $default;
    }
}

/**
*跳转函数
 */

 function jump($url)
 {
     header('location:'.$url);
     exit();
 }