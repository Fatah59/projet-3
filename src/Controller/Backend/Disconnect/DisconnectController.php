<?php

namespace App\Controller\Backend\Disconnect;

class DisconnectController
{
    public function disconnectUser(){
        unset($_SESSION['id']);
        header ('Location: accueil');
    }
}