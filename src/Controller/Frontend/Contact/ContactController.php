<?php


namespace App\Controller\Frontend\Contact;

use App\Model\Contact;
use App\Model\ContactManager;
use App\Service\Email;

class ContactController
{
    public function contact(){
        require 'src/View/contact/contact.php';
    }

    public function newContact($name, $email, $message){
        $contact = new Contact();
        $contact->setUsername($name);
        $contact->setEmail($email);
        $contact->setUserMessage($message);
        $contactform = new ContactManager();
        $contactform->addContact($contact);
        $mail = new Email();
        $mail->sendMail($name, $email, $message);
        $_SESSION['contactsend-success']="Votre message a bien été envoyé";
        header('Location: contact');
    }

}