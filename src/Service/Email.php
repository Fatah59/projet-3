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
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = Login::EMAIL;
            $mail->Password = Login::PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');


            $mail->setFrom('derradjfatah@gmail.com', 'Mailer');
            $mail->addAddress('derradjfatah@gmail.com');


            $mail->Subject = 'Vous avez recu un nouveau message !';
            $mail->Body = 'Email du contact : ' . $email . ' <br />
            <br />
            <h3>' . $name . '</h3> <br />
            <br />
            <p> ' . $message . ' </p> <br />
            <br />
            ';
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
