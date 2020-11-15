<?php
require_once('presentation.php');

session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : ../utilisateur/formCon.php');
} 

include_once('../serviceCouche/servService.php');

if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['noserv']))
{
    
    $service = new Service;
    $service->setNoserv($_GET['noserv']);

    $dataSOS = ServiceMysqliDAO::researchOneByNoserv($service); 

}