<?php

namespace App\Controller\Frontend\Chapters;

use App\Model\ChapterManager;


class ChapterController
{
    public function viewChapter($id)
    {
        $getChapter = new ChapterManager();
        $result = $getChapter->getChapterWithComments($id);
        require 'src/View/chapter/chapter.php';
    }

}