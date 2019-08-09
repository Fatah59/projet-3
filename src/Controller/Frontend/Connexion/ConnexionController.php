<?php

namespace App\Controller\Frontend\Connexion;

use App\Model\Member;
use App\Model\MemberManager;

class ConnexionController
{
    public function connexionPage(){
        require 'src/View/connexion/connexion.php';
    }

    public function newConnexionAdmin($username, $password){
        $member = new Member();
        $member->setLogin($username);
        $member->setPassword($password);
        $mManager = new MemberManager();
        $verif = $mManager->memberVerif($member);
        if ($verif != false){
            if (password_verify($password, $verif['password'])){
                $_SESSION['id']=$verif['id'];
                header ('Location: admin');
            }else {
                $_SESSION['connexion-fail']="Login ou mot de passe incorrect";
                header ('Location: connexion');
            }
        }else {
            $_SESSION['connexion-fail']="Login ou mot de passe incorrect";
            header ('Location: connexion');
        }
        $_SESSION['connexion-success']="Bienvenue sur la page d'administration";
        header('Location: admin');
    }
}