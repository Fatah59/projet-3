<?php
require 'vendor/autoload.php';

use App\Controller\Frontend\Home\HomeController;
use App\Controller\Frontend\Chapters\ChaptersController;
use App\Controller\Frontend\Chapters\ChapterController;

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
elseif ($url === 'chapitres'){
    $chapters = new ChaptersController();
    $chapters->viewAllChapters();
}
elseif ($url === 'chapitre'){
    $chapterController = new ChapterController();
    $chapterController->viewChapter($_GET['id']);
}
else {
    echo '404';
}



