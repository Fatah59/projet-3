<?php

namespace App\Controller\Frontend\Home;

use App\Model\ChapterManager;

class HomeController
{
    public function home(){
        $chapters = new ChapterManager();
        $result = $chapters->getChaptersForHomepage();
        $firstChapter = $chapters->getFirstChapterForHomepage();
        require 'src/View/home/home.php';
    }
}