<?php

namespace App\Controller\Backend\Admin;

use App\Model\CommentManager;
use App\Model\ChapterManager;



class AdminController
{
    public function adminConnect(){
        $reportcount = new CommentManager();
        $nbReports = $reportcount->reportCount();
        $commentcount = new CommentManager();
        $nbComments = $commentcount->commentCount();
        $chaptercount = new ChapterManager();
        $nbChapter = $chaptercount->chapterCount();
        require 'src/View/admin/admin.php';
    }
}