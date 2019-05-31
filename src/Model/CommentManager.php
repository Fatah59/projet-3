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

    public function getComments($id)
    {
    $req = $this->db->prepare('SELECT id, pseudo, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s")AS creationDate, report, moderate, chapterId FROM comment WHERE chapterId=?');
    $req->execute([$id]);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $comments = [];
    foreach ($result as $data)
    {
        $comment = new Comment();
        $comment->setId($data['id']);
        $comment->setPseudo($data['pseudo']);
        $comment->setText($data['text']);
        $comment->setCreationDate($data['creationDate']);
        $comment->setReport($data['report']);
        $comment->setModerate($data['moderate']);
        $comment->setChapterId($data['chapterId']);

        $comments[] = $comment;
    }

    return $comments;
    }
}