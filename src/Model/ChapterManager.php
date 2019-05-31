<?php


namespace App\Model;
use \PDO;

class ChapterManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function getChaptersForHomepage()
    {
     $req = $this->db->query('SELECT id, title, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ORDER BY creationDate DESC LIMIT 0,3' );
     $result = $req->fetchAll(PDO::FETCH_ASSOC);
     $chapters = [];
     foreach ($result as $data)
     {
         $chapter = new Chapter($data);
         $chapters[]= $chapter;
     }
     return $chapters;
    }

    public function getAllChapters()
    {
        $req = $this->db->query('SELECT id, title, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ORDER BY creationDate' );
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach ($result as $data)
        {
            $chapter = new Chapter($data);
            $chapters[]= $chapter;
        }
        return $chapters;
    }

   /* public function getChapter($id)
    {
        $req = $this->db->prepare('SELECT id, title, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter WHERE id=?');
        $req->execute([$id]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data)
        {
            $chapter = new Chapter();
            $chapter->setId($data['id']);
            $chapter->setTitle($data['title']);
            $chapter->setText($data['text']);
            $chapter->setCreationDate($data['creationDate']);
        }
        return $chapter;
    }*/



    public function getChapterWithComments($id)
    {
        $req = $this->db->prepare('SELECT id, title, text, DATE_FORMAT(creationDate, "%d/%m/%Y à %Hh:%i:%s") AS creationDate FROM chapter ch LEFT JOIN comment com ON com.id=ch.id WHERE ch.id=?');
        $req->execute([$id]);
        var_dump($id);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapterwithcomments = new Chapter();
        foreach ($result as $data)
        {
            $chapterwithcomments->setId($data['ch.id']);
            $chapterwithcomments->setTitle($data['title']);
            $chapterwithcomments->setText($data['text']);
            $chapterwithcomments->setCreationDate($data['creationDate']);
        }
        var_dump($chapterwithcomments);
        return $chapterwithcomments;

    }
}