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
            $mail->Host = Login::HOST;
            $mail->SMTPAuth = true;
            $mail->Username = Login::EMAIL;
            $mail->Password = Login::PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');

            $mail->setFrom(Login::EMAIL, 'Jean FORTEROCHE : Le blog !');
            $mail->addAddress(Login::EMAIL);

            $mail->Subject = 'Vous avez recu un nouveau message !';
            $mail->Body = ' Email du contact : ' . $email . ' <br />
            <br />
            Nom du contact : ' . $name . ' <br />
            <p><h3>Message :</h3> '. $message .' </p> <br />';
            $mail->isHTML(true);
            $mail->AltBody = 'Email du contact : ' . $email . ' Nom du contact : ' . $name . ' Message : ' . $message . '';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo $e;
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    public function newsMail($newMail)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            //$mail->isSendmail();
            $mail->Host = Login::HOST;
            $mail->SMTPAuth = true;
            $mail->Username = Login::EMAIL;
            $mail->Password = Login::PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');

            $mail->setFrom(Login::EMAIL, 'Jean FORTEROCHE : Le blog !');
            $mail->addAddress($newMail);

            $mail->Subject = 'Inscription Newsletter Jean FORTEROCHE : Le blog !';
            $mail->Body = 'Bonjour,<br />
            <br />
            Je vous informe que vous êtes bien inscrit(e) à ma Newsletter. <br /><br />
            <p>Vous pouvez vous désinscrire à tout moment en cliquant <a href="http://projet-3.derradjfatah.com/desinscription-newsletter">ici</a> </p><br />';
            $mail->isHTML(true);
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo $e;
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
