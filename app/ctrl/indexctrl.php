<?php

namespace app\ctrl;
use core\lib\config;
use core\lib\model;
use app\model\userModel;
use app\model\MessageModel;
class IndexCtrl extends \core\core{
    
    //所有留言
    public function index(){
        $model = new MessageModel();
        $data = $model->all();
        $this->assign('data',$data);
        $this->display('all.html');
    }
    //添加留言
    public function add(){
        $this->display('add.html');
    }
    //保存留言
    public function save()
    {
        $data['title'] = post('title');
        $data['content'] = post('content');
        $data['time']   = time();

        $model = new \app\model\MessageModel();
        $ret = $model->addOne($data);
        if($ret){
            p('ok');
            jump('/');
        }else{
            p('error');
        }
    }

    //删除留言
    public function delOne()
    {
        $id = get('id',0,'int');
        if($id){
            $model = new MessageModel();
            $ret = $model->delOne($id);
            p($ret);
            if($ret){
                jump('/');

            }else{
                exit('参数错误');
            }
        }else {
            exit('参数错误');
        }


    }
}