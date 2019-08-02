<?php

namespace App\Controller\Backend\Chapter;

use App\Model\ChapterManager;
use App\Model\Chapter;

class AdminChapterController
{
    public function adminChapter(){
        $chapters = new ChapterManager();
        $result = $chapters->getAllChapters();
        require 'src/View/admin/chapter/adminChapter.php';
    }
    public function newChapterForm(){
        require 'src/View/admin/chapter/addChapter.php';
    }
    public function newChapter($title, $text){
        $chapterposted = new Chapter();
        $chapterposted->setTitle($title);
        $chapterposted->setText($text);
        $chapterform = new ChapterManager();
        $chapterform->addChapter($chapterposted);
        $_SESSION['chapterpost-success']="Votre chapitre a bien été publié";
        header('Location: chapitres-admin');
    }

    public function editChapterForm($id){
        $editChapter = new ChapterManager();
        $result = $editChapter->getChapterForEdit($id);
        require 'src/View/admin/chapter/editChapter.php';
    }

    public function editedChapter($title, $text, $chapterId){
        $chapteredited = new Chapter();
        $chapteredited->setTitle($title);
        $chapteredited->setText($text);
        $chapteredited->setId($chapterId);
        $chapterform = new ChapterManager();
        $chapterform->updateChapter($chapteredited);
        $_SESSION['chapterupdated-success']="Votre chapitre a bien été édité";
        header('Location: chapitres-admin');
    }

    public function removeChapter($id){
        $chapterdeleted = new ChapterManager();
        $chapterdeleted->deleteChapter($id);
        $_SESSION['chapterdeleted-success']="Votre chapitre a bien été supprimé";
        header('Location: chapitres-admin');
    }


}