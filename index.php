<?php

/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

 define('MYFRAME',realpath('./'));
 define('CORE',MYFRAME.'/core');
 define('APP',MYFRAME.'/app');
 define('MODELE','/app');

 define('DEBUG','true');

 if(DEBUG){
     ini_set('display_error','On');
 }else{
     ini_set('display_error','Off');
 }

 include CORE.'/common/function.php';

 include CORE.'/core.php';

 use \core\core;
 spl_autoload_register('\core\core::load');
 core::run();

 
