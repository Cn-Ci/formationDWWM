<?php
session_start();
include_once('../model/UtilService.php');
include_once("../presentation/utilIndex.php");  

if (isset($_GET['action']) && !empty($_GET['action']))
{    
    if ($_GET['action']=="afficherInscription")   
    {
        html();
        utilFormIns();
    } 
    elseif ($_GET['action']=="inscription")   
    { 
        if (isset($_POST['inscrire']) &&
        isset($_POST['username'] ))
        {
            $utilisateur = new Utilisateur;
            $utilisateur->setUsername($_POST['username'])
                        ->setPassword($_POST['password']);

            UtilService::send($utilisateur);
        }
        else
        html();
        utilIndex();
    }   
    elseif ($_GET['action'] == "connexion" )
    {
        html();
        utilFormCon();  
    }
    elseif (($_GET['action'] == "connect"))
    {
        if (isset($_POST['connecter']) &&
        isset($_POST['username'] ))
        {
            $utilisateur = new Utilisateur;
            $utilisateur->setUsername($_POST['username'])
                        ->setPassword($_POST['password']);
                        
            UtilService::connecter($utilisateur); 
            if (UtilService::connecter($utilisateur))
            {
                html();
                utilConnect();  
            }
            else 
            {
            header('location: controllerUtilIndex.php?erreur=notexist'); 
            }
        }
    }
    elseif ($_GET['action'] == "deconnexion" )
    {
        session_destroy();
        html();
        utilIndex();
    }  
}
else   
{
    html();
    utilIndex();
} 
?>