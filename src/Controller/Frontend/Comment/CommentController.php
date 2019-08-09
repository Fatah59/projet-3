<?php

namespace App\Controller\Frontend\Comment;

use App\Model\Comment;
use App\Model\CommentManager;

class CommentController
{
    public function newComment($pseudo, $text, $chapterId){
        $commentposted = new Comment();
        $commentposted->setPseudo($pseudo);
        $commentposted->setText($text);
        $commentposted->setChapterId($chapterId);
        $commentform = new CommentManager();
        $commentform->addComment($commentposted);
        $_SESSION['commentsend-success']="Votre commentaire a bien été envoyé";
        header('Location: chapitre&id='.$chapterId.''.'#anchor');
    }

    public function signalComment($com_id, $chapter_id){
        $commentsignaled = new Comment();
        $commentsignaled->setId($com_id);
        $commentsignaled->setChapterId($chapter_id);
        $signalcomment = new CommentManager();
        $signalcomment->addSignalComment($commentsignaled);
        $_SESSION['signalcomment-success']="Votre signalement a bien été envoyé";
        header('Location: chapitre&id='.$chapter_id.'#anchor');
    }

    public function removeSignal($com_id, $chapter_id){
        $commentsignaled = new Comment();
        $commentsignaled->setId($com_id);
        $commentsignaled->setChapterId($chapter_id);
        $signalcomment = new CommentManager();
        $signalcomment->removeSignalComment($commentsignaled);
        $_SESSION['removesignalcomment-success']="Le signalement a bien été retiré";
        header('Location: signalement-admin');
    }

    public function moderateSignal($com_id, $chapter_id){
        $commentmoderate = new Comment();
        $commentmoderate->setId($com_id);
        $commentmoderate->setChapterId($chapter_id);
        $signalmoderate = new CommentManager();
        $signalmoderate->moderateSignalComment($commentmoderate);
        $_SESSION['moderatesignalcomment-success']="Le commentaire a bien été modéré";
        header('Location: signalement-admin');
    }
}



