<?php
require 'vendor/autoload.php';

use App\Controller\Frontend\Home\HomeController;
use App\Controller\Frontend\Chapters\ChaptersController;
use App\Controller\Frontend\Chapters\ChapterController;
use App\Controller\Frontend\About\AboutController;
use App\Controller\Frontend\Contact\ContactController;
use App\Controller\Frontend\Newsletter\NewsletterController;

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
/*
elsif ($url === 'connexion'){

}*/
else {
    echo '404';
}



