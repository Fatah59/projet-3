<?php


namespace App\Controller\Frontend\Comment;

use App\Model\CommentManager;

class CommentController
{
    public function viewComment($id)
    {
        $getComment = new CommentManager();
        $result = $getComment->getComment($id);
       /* require "src/View/"
    }

}