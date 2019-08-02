<?php

namespace App\Model;
use \PDO;

class ContactManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function addContact(Contact $contact){
        $req=$this->db->prepare('INSERT INTO contact(username, userMessage, email, sendDate, processed, consent) VALUES (:username, :userMessage, :email, NOW(), FALSE, TRUE)');
        $addcontact=$req->execute([
            'username'=>$contact->getUsername(),
            'userMessage'=>$contact->getUserMessage(),
            'email'=>$contact->getEmail(),
        ]);
        return $addcontact;
    }
}