<?php 
session_start (); 
if (!isset ($_SESSION['username'])) 
{
    header('location : ../Utilisateur/formCon.php');
} 
include_once('../Service/ServiceMysqliDAO.php');

    $service = new Service;
    $service->setNoserv($_GET['noserv']);
    
    $dataSOS = ServiceMysqliDAO::researchOneByNoserv($service);        
      