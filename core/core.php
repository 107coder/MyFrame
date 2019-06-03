<?php 
namespace core;

use \core\lib\route;
class Core{
    public static $classMap = array();
    public $assign; 
    /**
     * 启动框架的函数
     */
    static public function run(){
        \core\lib\log::init();
        \core\lib\log::log($_SERVER,'server');
        $route = new route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'ctrl.php';
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $class = '\\app\\ctrl\\'.$ctrlClass.'ctrl';
            $ctrl= new $class();
            $ctrl->$action();
            \core\lib\log::log('ctrl:'.$ctrlClass.'action:'.$action);
        }else{
            p("控制器未找到");
        }

        $model = new \core\lib\model();
        $model = $model->mysql;
    }
    /**
     * 用来配合那个spl_autoload_register()函数做自动加载
     */
    static public function load($class){
        //类的自动加载函数

        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            
            $file = MYFRAME.'/'.$class.'.php';
            
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }

    /**
     * 为view文件传值
     */
    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }
    /**
     * 显示view试图文件
     */
    public function display($file){
        $file = APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }

    }
}