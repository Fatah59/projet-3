<?php

namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

    public function sendMail($name, $email, $message)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            //$mail->isSendmail();
            $mail->Host = 'santa.o2switch.net';
            $mail->SMTPAuth = true;
            $mail->Username = Login::EMAIL;
            $mail->Password = Login::PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');

            $mail->setFrom('projet3@derradjfatah.com', 'Projet3 : Blog écrivain');
            $mail->addAddress('projet3@derradjfatah.com');

            $mail->Subject = 'Vous avez recu un nouveau message !';
            $mail->Body = ' Email du contact : ' . $email . ' <br />
            <br />
            Nom du contact : ' . $name . ' <br />
            <p><h3>Message :</h3> '. $message .' </p> <br />';
            $mail->isHTML(true);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo $e;
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}