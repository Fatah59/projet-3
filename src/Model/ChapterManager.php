<?php

namespace App\Model;
use \PDO;

class ChapterManager extends DbManager
{
    private $db;
    public function __construct(){
        $this->db = self::dbConnect();
    }

    public function getChaptersForHomepage(){
        $req = $this->db->query('SELECT id, title, text, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ORDER BY creation_date DESC LIMIT 0,3' );
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach ($result as $data)
        {
            $chapter = new Chapter($data);
            $chapters[]= $chapter;
        }
        return $chapters;
    }

    public function getFirstChapterForHomepage(){
        $req = $this->db->query('SELECT id, title, text, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ORDER BY creation_date ASC LIMIT 0,1' );
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $chapter = new Chapter($result);
        return $chapter;
    }

    public function getAllChapters(){
        $req = $this->db->query('SELECT id, title, text, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ORDER BY creation_date' );
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach ($result as $data)
        {
            $chapter = new Chapter($data);
            $chapters[]= $chapter;
        }
        return $chapters;
    }

    public function getChapterWithComments($id){
        $req = $this->db->prepare('SELECT ch.id AS ch_id, ch.title, ch.text AS ch_text, DATE_FORMAT(ch.creation_date, "%d/%m/%Y à %Hh:%i") AS creation_date, com.id AS com_id, com.pseudo, com.text AS com_text, com.report, com.moderate, DATE_FORMAT(com.creationDate, "%d/%m/%Y à %Hh:%i") AS com_creationDate FROM chapter ch LEFT JOIN comment com ON com.chapterId=ch.id WHERE ch.id=?');
        $req->execute([$id]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        $chapter = new Chapter();
        foreach ($result as $data)
        {
            $chapter->setId($data['ch_id']);
            $chapter->setTitle($data['title']);
            $chapter->setText($data['ch_text']);
            $chapter->setCreationDate($data['creation_date']);
            if ($data['com_id']){
                $comment = new Comment();
                $comment->setId($data['com_id']);
                $comment->setPseudo($data['pseudo']);
                $comment->setText($data['com_text']);
                $comment->setCreationDate($data['com_creationDate']);
                $comment->setReport($data['report']);
                $comment->setModerate($data['moderate']);
                $comments[] = $comment;
            }
        }
        $chapter->setComments($comments);
        return $chapter;
    }

    public function chapterCount(){
        $req=$this->db->query('SELECT COUNT(*) AS chaptercount FROM chapter');
        $chaptercount=$req->fetchColumn();
        return $chaptercount;
    }


    public function addChapter(Chapter $chapter){
        $req=$this->db->prepare('INSERT INTO chapter(title, text, creation_date) VALUES (:title, :text, NOW())');
        $addchapter=$req->execute([
            'title'=>$chapter->getTitle(),
            'text'=>$chapter->getText(),
        ]);
        return $addchapter;
    }

    public function getChapterForEdit($id){
        $req = $this->db->prepare('SELECT id, title, text FROM chapter WHERE id=?');
        $req->execute([$id]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapterForEdit = [];
        foreach ($result as $data) {
            $chapter = new Chapter($data);
            $chapterForEdit[] = $chapter;
        }
        return $chapterForEdit;
    }

    public function updateChapter(Chapter $chapterform){
        $req = $this->db->prepare('UPDATE chapter SET title=(:title), text=(:text), creation_date=(NOW()) WHERE id=(:chapterId)');
        $updatedchapter = $req->execute([
            'title'=>$chapterform->getTitle(),
            'text'=>$chapterform->getText(),
            'chapterId'=>$chapterform->getId(),
        ]);
        return $updatedchapter;
    }

    public function deleteChapter($id){
        $req = $this->db->prepare('DELETE FROM chapter WHERE id=?');
        $deletedchapter=$req->execute([$id]);
        return $deletedchapter;
    }
}
