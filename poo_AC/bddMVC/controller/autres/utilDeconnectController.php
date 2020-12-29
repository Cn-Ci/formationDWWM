<?php
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : ../Utilisateur/formCon.php');
} 

include_once('../serviceCouche/utilService.php');

if ($_GET['action'] == "deconnexion" )
    {
        session_start();
        session_destroy();
        header("location:index.php"); 
    } 