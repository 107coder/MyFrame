<?php 

namespace app\model;
use core\lib\model;
class userModel extends model
{
    public $table = 'user';
    public function lists(){
        $ret = $this->select($this->table,'*');
        return $ret;
    }

    public function getOne($id)
    {
        $ret = $this->get($this->table,'*',array('id'=>$id));
        return $ret;
    }
}