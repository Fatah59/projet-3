<?php


namespace App\Controller\Frontend\Newsletter;


use App\Model\NewsletterManager;

class NewsletterController
{
    public function newMail($newMail){
        $newsletter = new NewsletterManager();
        $newsletter->addEmail($newMail);
        $_SESSION['newsletter-success']="Vous êtes bien inscrit à la newsletter";
        header('Location: accueil');
    }

}