<?php

namespace App\Controller\Backend\Report;

use App\Model\CommentManager;

class ReportController
{
    public function Report(){
        $reportdisplay = new CommentManager();
        $result = $reportdisplay->getAllReport();
        require 'src/View/admin/report/adminReport.php';
    }
}