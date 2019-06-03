<?php

namespace app\ctrl;
use core\lib\config;
use core\lib\model;
class IndexCtrl extends \core\core{
    public function index(){
        $temp = config::get('CTRL','route');
        $temp = config::get('ACTION','route');
        p($temp);
        $model = new model();
        $mysqli = $model->mysql;
        // p($mysqli);
        $data = "Hello World";
        $title = 'title is woek';
        $this->assign('title',$title);
        $this->assign('data',$data);
        // $this->display('index.html');

        // p();
        // mkdir('E:\www\MyProject\Myframe\log\2019060317','0777',true);
        // var_dump(is_dir('E:\www\MyProject\Myframe\log\2019060317'));
    }
}