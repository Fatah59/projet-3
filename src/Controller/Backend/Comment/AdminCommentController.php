<?php


namespace App\Controller\Backend\Comment;

use App\Model\CommentManager;

class AdminCommentController
{
    public function commentList(){
        $commentsdisplay = new CommentManager();
        $result = $commentsdisplay->getAllComments();
        require 'src/View/admin/comment/adminComment.php';
    }

}