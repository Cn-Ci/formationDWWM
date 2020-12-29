<?php

require_once ('controllerAccueil.php');
require_once ('controllerFormulaire.php');

if(isset($_GET['action'])){

    if($_GET['action'] == 'ajouter'){
        controllerFormulaire::ajouterEntree();
    }

    if($_GET['action'] == 'modifier'){
        controllerFormulaire::modifierEntree();
    }

    if($_GET['action'] == 'supprimer'){
        controllerFormulaire::supprimerEntree();
    }


}else{
    controllerAccueil::accueil();
}