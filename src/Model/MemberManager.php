<?php

namespace App\Model;

use \PDO;

class MemberManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function memberVerif(Member $member){
        $req=$this->db->prepare('SELECT id, login, password FROM member WHERE login=?');
        $req->execute([$member->getLogin()]);
        $result= $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}