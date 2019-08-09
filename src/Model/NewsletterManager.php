<?php


namespace App\Model;
use \PDO;

class NewsletterManager extends DbManager
{
    private $db;
    public function __construct(){
        $this->db = self::dbConnect();
    }

    public function addEmail($newMail){
        $req=$this->db->prepare('INSERT INTO newsletter(email) VALUES (:email)' );
        $add=$req->execute(['email'=>$newMail]);
        return $add;
    }

    public function emailVerif($email){
        $req=$this->db->prepare('SELECT email FROM newsletter WHERE email=?');
        $req->execute([$email->getEmail()]);
        $result= $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteEmail($delete){
        $req = $this->db->prepare('DELETE FROM newsletter WHERE email=?');
        $deletedemail=$req->execute([$delete->getEmail()]);
        return $deletedemail;
    }
}
