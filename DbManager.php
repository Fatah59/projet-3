<?php

namespace App\Model;

use \PDO;

class DbManager
{
    protected function dbConnect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        } catch (\Exception $e){
            die($e->getMessage());
        }
        return $db;
    }
}