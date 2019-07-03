<?php


namespace App\Model;
use \PDO;

class CommentManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }


    public function addComment(Comment $comment){
        $req=$this->db->prepare('INSERT INTO comment(pseudo, text, creationDate, report, moderate, chapterId) VALUES (:pseudo, :text, NOW(), false, false, :chapterId)');
        $addcomment=$req->execute([
            'pseudo'=>$comment->getPseudo(),
            'text'=>$comment->getText(),
            'chapterId'=>$comment->getChapterId(),
        ]);
        return $addcomment;
    }

    public function addSignalComment(Comment $signalcomment){
        $req=$this->db->prepare('UPDATE comment SET report = 1 WHERE id=?');
        $addsignal=$req->execute([
            $signalcomment->getId(),
        ]);
        return $addsignal;
    }
}