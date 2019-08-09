<?php

namespace App\Controller\Frontend\Newsletter;

use App\Model\Newsletter;
use App\Model\NewsletterManager;
use App\Service\Email;

class NewsletterController
{
    public function newMail($newMail){
        $newsletter = new NewsletterManager();
        $newsletter->addEmail($newMail);
        $mail = new Email();
        $mail->newsMail($newMail);
        $_SESSION['newsletter-success'] = "Vous êtes bien inscrit à la newsletter";
        header('Location: accueil' . '#anchor');
    }

    public function unsubscribePage(){
        require 'src/View/newsletter/unsubscribeNewsletter.php';
    }

    public function unsubscribe($email){
        $delete = new Newsletter();
        $delete->setEmail($email);
        $mEmail = new NewsletterManager();
        $verif = $mEmail->emailVerif($delete);
        if ($verif != false) {
            $deleted = new NewsletterManager();
            $deleted->deleteEmail($delete);
            $_SESSION['newsletter-deleted-success'] = "Votre désinscription est validée";
            header('Location: desinscription-newsletter' . '#anchor');
        } else {
            $_SESSION['newsletter-deleted-error'] = "Veuillez remplir tout les champs";
            header('Location: desinscription-newsletter' . '#anchor');
        }
    }
}