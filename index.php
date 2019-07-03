<?php
require 'vendor/autoload.php';

use App\Controller\Frontend\Home\HomeController;
use App\Controller\Frontend\Chapters\ChaptersController;
use App\Controller\Frontend\Chapters\ChapterController;
use App\Controller\Frontend\About\AboutController;
use App\Controller\Frontend\Contact\ContactController;
use App\Controller\Frontend\Newsletter\NewsletterController;
use App\Controller\Frontend\Comment\CommentController;


session_start();

$url = '';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

if ($url === 'accueil'){
$home = new HomeController();
$home->home();
}
elseif ($url === 'test-send'){
   if (isset($_POST['pseudo']) && isset ($_POST['text']) && !empty($_POST['pseudo']) && !empty($_POST['text'])){
       $home = new HomeController();
       $home->testSend($_POST['pseudo'], $_POST['text']);
   }else {

       $_SESSION['flash']='Veuillez saisir tous les champs';
       header('Location: accueil');
   }
}
elseif ($url === 'a-propos') {
    $about = new AboutController();
    $about->about();
}

elseif ($url === 'chapitres'){
    $chapters = new ChaptersController();
    $chapters->viewAllChapters();
}
elseif ($url === 'chapitre'){
    $chapterController = new ChapterController();
    $chapterController->viewChapter($_GET['id']);
}
elseif ($url === 'contact'){
    $contact = new ContactController();
    $contact->contact();
}

elseif ($url === 'newsletter-add-mail'){
    if (isset($_POST['newsletter-mail'])&& !empty($_POST['newsletter-mail'])){
        if (preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['newsletter-mail'])){
            $newsletter = new NewsletterController();
            $newsletter->newMail($_POST['newsletter-mail']);
        } else {
            $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
        }
    }else {
        $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
    }
}

elseif ($url === 'contact-add-msg') {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['message']) && !empty($_POST['message'])) {
        if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $_POST['email'])) {
            $contactform = new ContactController();
            $contactform->newContact($_POST['name'], $_POST['email'], $_POST['message']);
        } else {
            $_SESSION['contactmail-error'] = 'Veuillez saisir une adresse email valide';
            header('Location: contact');
        }
    } else {
        $_SESSION['contactmail-error'] = 'Veuillez saisir une adresse email valide';
    }
}

elseif ($url === 'comment-post') {
    if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['chapterId']) && !empty($_POST['chapterId'])){
        $commentpost = new CommentController();
        $commentpost->newComment($_POST['pseudo'], $_POST['text'], $_POST['chapterId']);
    } else {
        $_SESSION['commentpost-error'] = 'Veuillez remplir tous les champs';
        header('Location: chapitre&id='.$_POST['chapterId'].'#commentpost-error');
    }
}

elseif ($url === 'signal-comment'){
    if (isset($_GET['com_id']) && !empty($_GET['com_id']) && isset($_GET['chapter_id']) && !empty($_GET['chapter_id'])) {
        if (preg_match('#[0-9]+#', $_GET['com_id']) && preg_match('#[0-9]+#', $_GET['chapter_id'])) {
            $signal = new CommentController();
            $signal->signalComment($_GET['com_id'], $_GET['chapter_id']);
        }else {
            echo '404';
        }
    }else {
        echo '404';
    }
}

/*
elsif ($url === 'connexion'){

}*/
else {
    echo '404';
}



