<?php
include_once('ServiceMysqliDAO.php');
/* Supprimer */
if (isset($_GET["action"]) && $_GET['action']=="delete" )
{  
    $service = new Service;
    $service->setNoserv($_GET['noserv']);
  
    ServiceMysqliDAO::supprimer($service);
    }
   