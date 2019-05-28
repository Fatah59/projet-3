<?php


namespace App\Model;
use\PDO;

class CommentManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function $getComment($id)
    {
    $req = $this->db->prepare('SELECT id, pseudo, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s")AS creationDate FROM comment WHERE id=?');
    $req->execute([$id]);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $data)
    {
        $comment = new Comment();
        $comment->setId($data['id']);
        $comment->setPseudo($data['pseudo']);
        $comment->setText($data['text']);
        $comment->setCreationDate($data['creationDate']);
    }
    return $comment;
    }
}