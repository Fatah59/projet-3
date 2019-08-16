<?php

namespace App\Model;

use \PDO;

class DbManagerSample
{
    protected function dbConnect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=dbname;charset=utf8', 'username', 'password');
        } catch (\Exception $e){
            die($e->getMessage());
        }
        return $db;
    }
}