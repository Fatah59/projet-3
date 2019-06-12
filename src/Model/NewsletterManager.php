<?php


namespace App\Model;
use \PDO;

class NewsletterManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function addEmail($email){
        $req=$this->db->prepare('INSERT INTO newsletter(email) VALUES (:email)' );
        $add=$req->execute([
            'email'=>$email
        ]);
        return $add;
    }
}
