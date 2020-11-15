<?php
// A faire : Login
session_start();
include_once('../model/UtilService.php');
include_once("../presentation/utilIndex.php");  

if (isset($_GET['action']) && !empty($_GET['action']))
{    
    if ($_GET['action']=="afficherInscription")   
    {
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
            utilIndex();
    }   
    elseif ($_GET['action'] == "connexion" )
    {
        utilFormCon(); 
        if (isset($_POST['connecter']) &&
        isset($_POST['username'] ))
        {
            $utilisateur = new Utilisateur;
            $utilisateur->setUsername($_POST['username'])
                        ->setPassword($_POST['password']);
                        
            UtilService::connecter($utilisateur);   
        }
    }
    elseif (($_GET['action'] == "connect"))
    {
        utilConnect();
    }
    elseif ($_GET['action'] == "deconnexion" )
    {
        session_destroy();
        utilIndex();
    }  
}
elseif (!isset($_SESSION['username']) && !isset($_GET['action']))  
{
    utilIndex();
} 
?>