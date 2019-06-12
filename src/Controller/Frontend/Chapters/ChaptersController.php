<?php


namespace App\Controller\Frontend\Chapters;


use App\Model\ChapterManager;

class ChaptersController
{
    public function viewAllChapters(){
        $chapters = new ChapterManager();
        $result = $chapters->getAllChapters();

        require 'src/View/chapter/allChapters.php';
    }
}