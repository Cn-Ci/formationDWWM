<?php
include_once('../serviceCouche/empService.php');


session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : ../utilisateur/formCon.php');
} 


if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['no_emp']))
{ 
    
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    $dataSOS = empService::researchOneByNoserv($employe);   
   
}else 
echo "erreur";
/************************************** Profil */
$admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
?>