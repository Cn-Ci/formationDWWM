<?php
include_once('ServiceMysqliDAO.php');

 /* Modifier */
 if (isset($_GET['action']) && $_GET['action']=="modif" && !empty($_POST))
 { 
     $service = new Service;
     $service->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
             ->setService(empty($_POST['modifservice']) ? NULL : $_POST['modifservice'])
             ->setVille(empty($_POST['modifville']) ? NULL : $_POST['modifville']);
 
     $noserv = new ServiceMysqliDAO;
     
     $noserv::modifier($service, $_GET['noserv']);
 }