<?php

namespace app\model;

use core\lib\model;

class MessageModel extends model
{
    public $table = "messagebook";

    public function all()
    {
        return $this->select($this->table,'*');
    }

    public function addOne($data)
    {
        return $this->insert($this->table,$data);
    }

    public function delOne($id)
    {
         $ret = $this->delete($this->table,array('mid'=>$id));
        //  p($ret);exit();
         if($ret !== false)
         {
             return true;
         }else {
             return false;
         }
    }
}