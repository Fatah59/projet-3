<?php
namespace App\Controller\Frontend\Home;

use App\Model\TestManager;

class HomeController
{
public function home(){
    require 'src/View/home/home.php';
}
public function testSend($pseudo,$text){
    $test = new TestManager();
    $test->send($pseudo,$text);
    header('Location: accueil');
}
}