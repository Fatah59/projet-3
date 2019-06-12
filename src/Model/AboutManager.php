<?php


namespace App\Model;
use \PDO;


class AboutManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function getAbout()
    {
        $req = $this->db->query('SELECT id, text FROM about');
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $about = new About($result);
        return $about;
    }

}