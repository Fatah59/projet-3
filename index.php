<?php
require 'vendor/autoload.php';

use App\Controller\Backend\Admin\AdminController;
use App\Controller\Backend\Chapter\AdminChapterController;
use App\Controller\Backend\Comment\AdminCommentController;
use App\Controller\Backend\Disconnect\DisconnectController;
use App\Controller\Backend\Report\ReportController;
use App\Controller\Frontend\About\AboutController;
use App\Controller\Frontend\Cgu\CguController;
use App\Controller\Frontend\Chapters\ChapterController;
use App\Controller\Frontend\Chapters\ChaptersController;
use App\Controller\Frontend\Comment\CommentController;
use App\Controller\Frontend\Connexion\ConnexionController;
use App\Controller\Frontend\Contact\ContactController;
use App\Controller\Frontend\Home\HomeController;
use App\Controller\Frontend\Legalmention\LegalController;
use App\Controller\Frontend\Newsletter\NewsletterController;


session_start();
$url = '';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

/* Frontend Router */

if ($url === 'accueil'){
    $home = new HomeController();
    $home->home();
}

elseif ($url === 'a-propos') {
    $about = new AboutController();
    $about->about();
}

elseif ($url === 'chapitres'){
    $chapters = new ChaptersController();
    $chapters->viewAllChapters();
}

elseif ($url === 'contact'){
    $contact = new ContactController();
    $contact->contact();
}

elseif ($url === 'mentions-legales'){
    $legal = new LegalController();
    $legal->legal();
}

elseif ($url === 'cgu'){
    $cgu = new CguController();
    $cgu->cgu();
}

elseif ($url === 'chapitre'){
    $chapterController = new ChapterController();
    $chapterController->viewChapter($_GET['id']);
}
/* Adhésion Newsletter + confirmation par email */
elseif ($url === 'newsletter-add-mail'){
    if (isset($_POST['newsletter-mail'])&& !empty($_POST['newsletter-mail'])){
        if (preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['newsletter-mail'])){
            $newsletter = new NewsletterController();
            $newsletter->newMail($_POST['newsletter-mail']);
        }else {
            $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
        }
    }else {
        $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
    }
}
/* Page de désinsciption newsletter */
elseif ($url === 'desinscription-newsletter'){
    $unsubscribenews = new NewsletterController();
    $unsubscribenews->unsubscribePage();
}

/* Désinscription newsletter */
elseif ($url === 'newsletter-delete-mail'){
    if (isset($_POST['newsletter-mail'])&& !empty($_POST['newsletter-mail'])){
        if (preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['newsletter-mail'])){
            $unsubscribed = new NewsletterController();
            $unsubscribed->unsubscribe($_POST['newsletter-mail']);
        }else {
            $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
        }
    }else {
        $_SESSION['newsletter-error']='Veuillez saisir une adresse email valide';
    }
}
/* Envoyer un message de contact + un email à l'admin */
elseif ($url === 'contact-add-msg') {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['message']) && !empty($_POST['message'])){
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
/* Poster un commentaire */
elseif ($url === 'comment-post') {
    if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['chapterId']) && !empty($_POST['chapterId'])){
        $commentpost = new CommentController();
        $commentpost->newComment($_POST['pseudo'], $_POST['text'], $_POST['chapterId']);
    } else {
        $_SESSION['commentpost-error'] = 'Veuillez remplir tous les champs';
        header('Location: chapitre&id='.$_POST['chapterId'].'#commentpost-error');
    }
}
/* Signaler un commentaire */
elseif ($url === 'signal-comment'){
    if (isset($_GET['com_id']) && !empty($_GET['com_id']) && isset($_GET['chapter_id']) && !empty($_GET['chapter_id'])) {
        if (preg_match('#[0-9]+#', $_GET['com_id']) && preg_match('#[0-9]+#', $_GET['chapter_id'])) {
            $signal = new CommentController();
            $signal->signalComment($_GET['com_id'], $_GET['chapter_id']);
        }else {
            require 'src/View/error404/error404.php';
        }
    }else {
        require 'src/View/error404/error404.php';
    }
}
/* Page de connexion */
elseif ($url === 'connexion'){
    $contact = new ConnexionController();
    $contact->connexionPage();
}
/* Vérification connexion à l'administration */
elseif ($url === 'admincheck') {
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $connexionadmin = new ConnexionController();
        $connexionadmin->newConnexionAdmin($_POST['username'], $_POST['password']);
    } else {
        $_SESSION['connexion-error'] = 'Veuillez saisir tous les champs';
        header('Location: connexion');
    }
}

/* Backend router */
/* Page d'accueil administration */
elseif ($url === 'admin') {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $adminConnect = new AdminController();
        $adminConnect->adminConnect();
    }else {
        header('Location: connexion');
    }
}
/* Déconnexion */
elseif ($url === 'deconnexion'){
    $disconnect = new DisconnectController();
    $disconnect->disconnectUser();
}
/* Page de gestion des chapitres */
elseif ($url === 'chapitres-admin'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $chapteredit = new AdminChapterController;
        $chapteredit->adminChapter();
    }else {
        header('Location: connexion');
    }
}
/* Page ajouter un chapitre */
elseif ($url === 'ajout-chapitre'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $addchapter = new AdminChapterController();
        $addchapter->newChapterForm();
    }else {
        header('Location: connexion');
    }
}
/* Ajouter un chapitre */
elseif ($url === 'chapter-post') {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['text']) && !empty($_POST['text'])) {
            $chapterpost = new AdminChapterController();
            $chapterpost->newChapter($_POST['title'], $_POST['text']);
        } else {
            $_SESSION['chapterpost-error'] = 'Veuillez remplir tous les champs';
            header('Location: ajout-chapitre');
        }
    }else {
        header('Location: connexion');
    }
}
/* Page éditer un chapitre */
elseif ($url === 'editer-chapitre'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $editchapter = new AdminChapterController();
        $editchapter->editChapterForm($_GET['id']);
    }else {
        header('Location: connexion');
    }
}
/* Éditer un chapitre */
elseif ($url === 'chapter-edited') {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['chapterId']) && !empty($_POST['chapterId'])){
            $chapteredited = new AdminChapterController();
            $chapteredited->editedChapter($_POST['title'], $_POST['text'], $_POST['chapterId']);
        } else {
            $_SESSION['chapteredit-error'] = 'Veuillez remplir tous les champs';
            header('Location: editer-chapitre&id='.$_POST['chapterId']);
        }
    }else {
        header('Location: connexion');
    }
}
/* Supprimer un chapitre */
elseif ($url === 'supprimer-chapitre'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $deletechapter = new AdminChapterController();
        $deletechapter->removeChapter($_GET['id']);
    }else {
        header('Location: connexion');
    }
}
/* Page des commentaires */
elseif ($url === 'commentaires-admin'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $comment = new AdminCommentController;
        $comment->commentList();
    }else {
        header('Location: connexion');
    }
}
/* Page des signalements */
elseif ($url === 'signalement-admin'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $report = new ReportController;
        $report->report();
    }else {
        header('Location: connexion');
    }
}
/* Retirer un signalement */
elseif ($url === 'retirer-signalement'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if (isset($_GET['com_id']) && !empty($_GET['com_id']) && isset($_GET['chapter_id']) && !empty($_GET['chapter_id'])) {
            if (preg_match('#[0-9]+#', $_GET['com_id']) && preg_match('#[0-9]+#', $_GET['chapter_id'])) {
                $signal = new CommentController();
                $signal->removeSignal($_GET['com_id'], $_GET['chapter_id']);
            }else {
                require 'src/View/error404/error404.php';
            }
        }else {
            require 'src/View/error404/error404.php';
        }
    }else {
        header('Location: connexion');
    }
}
/* Modérer un signalement */
elseif ($url === 'moderer-signalement'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if (isset($_GET['com_id']) && !empty($_GET['com_id']) && isset($_GET['chapter_id']) && !empty($_GET['chapter_id'])) {
            if (preg_match('#[0-9]+#', $_GET['com_id']) && preg_match('#[0-9]+#', $_GET['chapter_id'])) {
                $signal = new CommentController();
                $signal->moderateSignal($_GET['com_id'], $_GET['chapter_id']);
            }else {
                require 'src/View/error404/error404.php';
            }
        }else {
            require 'src/View/error404/error404.php';
        }
    }else {
        header('Location: connexion');
    }
}

/* Modérer un commentaire */
elseif ($url === 'moderer-commentaire'){
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if (isset($_GET['com_id']) && !empty($_GET['com_id']) && isset($_GET['chapter_id']) && !empty($_GET['chapter_id'])) {
            if (preg_match('#[0-9]+#', $_GET['com_id']) && preg_match('#[0-9]+#', $_GET['chapter_id'])) {
                $signal = new CommentController();
                $signal->moderateComment($_GET['com_id'], $_GET['chapter_id']);
            }else {
                require 'src/View/error404/error404.php';
            }
        }else {
            require 'src/View/error404/error404.php';
        }
    }else {
        header('Location: connexion');
    }
}

/* Page d'erreur 404 */
else {
    require 'src/View/error404/error404.php';
}
