<?php
//文件系统
namespace core\lib\drive\log;
use core\lib\config;
class file
{
    public $path;#日志缓存位置
    public function __construct(){
        $conf = config::get('OPTION','log');
        $this->path = $conf['PATH'];
    }
    public function log($massage,$file='log')
    {
        /**
         * 1.确定文件存储位置是否存在
         * 新建目录
         * 2.写入日志
         */
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),'0777',true);//这里有个报错，提示file 已近存在
        }
        
        $massage = date('Y-m-d H:i:s').'  '.json_encode($massage).PHP_EOL;
        return file_put_contents($this->path.date('YmdH').'\\'.$file.'.php',$massage,FILE_APPEND);
    }
}