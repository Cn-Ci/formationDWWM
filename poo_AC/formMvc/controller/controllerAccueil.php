<?php

require_once ("model/modelAccueil.php");

class controllerAccueil{

    public static function accueil(){

        $donnees = New ModelAccueil;
        $listeEntrees = $donnees->getEntrees();

        $page = "pages";
        $view = 'accueil';
        require_once ('view/view.php');
    }
}