<?php 
session_start (); 
if (!isset ($_SESSION['username'])) 
{
    header('location : ../utilisateur/formCon.php');
} 
include_once('../service/ServiceMysqliDAO.php');

    $service = new Service;
    $service->setNoserv($_GET['noserv']);
    
    $dataSOS = ServiceMysqliDAO::researchOneByNoserv($service);        
      