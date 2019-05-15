<?php


namespace App\Model;
use \PDO;


class TestManager extends DbManager
{
private $db;
public function __construct()
{
    $this->db = self::dbConnect();
}
public function send($pseudo,$text){
    $req = $this->db->prepare('INSERT INTO test(pseudo,text) VALUES (?,?)');
    $send = $req->execute([$pseudo,$text]);
    return $send;
}

public function getChapters()
{
    $req = $this->db->query('SELECT * FROM test ORDER BY id DESC');
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $chapters = [];
    foreach ($result as $data){
        $chapter = new Test($data);
        $chapters[]=$chapter;
    }
    return $chapters;
}
}