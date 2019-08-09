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

    public function getAllComments(){
        $req = $this->db->query('SELECT id, pseudo, text, creationDate, chapterId FROM comment WHERE report=0 && moderate=0 ORDER BY creationDate DESC LIMIT 0,30' );
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        foreach ($result as $data)
        {
            $comment = new Comment($data);
            $comments[]= $comment;
        }
        return $comments;
    }

    public function addSignalComment(Comment $signalcomment){
        $req=$this->db->prepare('UPDATE comment SET report = 1 WHERE id=?');
        $addsignal=$req->execute([$signalcomment->getId()]);
        return $addsignal;
    }

    public function reportCount(){
        $req=$this->db->query('SELECT COUNT(*) AS comreport FROM comment WHERE report=1 && moderate=0');
        $reportcount=$req->fetchColumn();
        return $reportcount;
    }

    public function commentCount(){
        $req=$this->db->query('SELECT COUNT(*) AS comcount FROM comment');
        $commentcount=$req->fetchColumn();
        return $commentcount;
    }

    public function getAllReport(){
        $req = $this->db->query('SELECT id, text, creationDate, chapterId FROM comment WHERE report=1 && moderate=0 ORDER BY creationDate DESC LIMIT 0,10' );
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $reports = [];
        foreach ($result as $data)
        {
            $comment = new Comment($data);
            $reports[]= $comment;
        }
        return $reports;
    }

    public function removeSignalComment(Comment $signalcomment){
        $req=$this->db->prepare('UPDATE comment SET report = 0 WHERE id=?');
        $removesignal=$req->execute([$signalcomment->getId(),]);
        return $removesignal;
    }

    public function moderateSignalComment(Comment $signalmoderate){
        $req=$this->db->prepare('UPDATE comment SET moderate = 1 WHERE id=?');
        $moderatesignal=$req->execute([$signalmoderate->getId(),]);
        return $moderatesignal;
    }
}