<?php 
include_once('ServiceMysqliDAO.php');

/* Ajouter */
if (isset($_GET['action']) && $_GET['action']=="add" && !empty($_POST))
{
    $service = new Service;
    $service->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
            ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
            ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);
            
    ServiceMysqliDAO::add($service);   
}