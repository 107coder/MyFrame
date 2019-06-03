<?php
namespace core\lib;
use core\lib\config;
class log
{
    static $class;
    /**
     * 1.确定日志的存储方式
     * 
     * 2.写日志
     */

     static public function init(){
        //确定存储方式
        $drive = config::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
     }

     static public function log($name,$file='log')
     {
         self::$class->log($name,$file);
    }
}