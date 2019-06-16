<?php
namespace core\lib;
use core\lib\config;
use Medoo\Medoo;
class model extends Medoo
{
    public $mysql;
    public function __construct(){
        $option = config::all('database');
        parent::__construct($option);
    }

    // $database = config::all('database');
    // $mysqli = new \mysqli($database['HOST'],$database['USERNAME'],$database['PASSWORD'],$database['DBNAME']);
    // $this->mysql = $mysqli;
}