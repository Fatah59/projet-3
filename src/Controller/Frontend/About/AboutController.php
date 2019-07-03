<?php


namespace App\Controller\Frontend\About;

use App\Model\AboutManager;

class AboutController
{
    public function about()
    {
        $about = new AboutManager();
        $result = $about->getAbout();
        require 'src/View/about/about.php';
    }

}