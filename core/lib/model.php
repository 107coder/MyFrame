<?php
namespace core\lib;
use core\lib\config;
class model{
    public $mysql;
    public function __construct(){
        $database = config::all('database');
        $mysqli = new \mysqli($database['HOST'],$database['USERNAME'],$database['PASSWORD'],$database['DBNAME']);
        $this->mysql = $mysqli;
    }
}