<?php


namespace App\Controller\Frontend\Chapters;


use App\Model\TestManager;

class ChaptersController
{
public function viewAllChapters(){
    $manager = new TestManager();
    $chapters = $manager->getChapters();
    require 'src/View/chapter/allChapters.php';
}
}