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

    public function getChapter($id)
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
    }
        
    
/*
    public function send($title,$text){
        $req = $this->db->prepare('INSERT INTO chapter(title,text,creationDate) VALUES (?,?, NOW())');
        $send = $req->execute([$title,$text]);
        return $send;
    }

    public function getChapters()
    {
        $req = $this->db->query('SELECT * FROM chapter ORDER BY id DESC');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach ($result as $data){
            $chapter = new chapter($data);
            $chapters[]=$chapter;
        }
        return $chapters;
    }
}*/
}