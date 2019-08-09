<?php

namespace App\Controller\Frontend\About;

use App\Model\AboutManager;

class AboutController
{
    public function about(){
        require 'src/View/about/about.php';
    }
}