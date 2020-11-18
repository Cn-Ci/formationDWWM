<?php 
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : ../utilisateur/formCon.php');
} 

include_once('../serviceCouche/servService.php');

/************************************** Ajouter */
if (isset($_GET['action']) && $_GET['action']=="add" && !empty($_POST))
{
    $service = new Service;
    $service->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
            ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
            ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);
            
    ServiceMysqliDAO::add($service);   
}
/************************************** Modifier */
elseif (isset($_GET['action']) && $_GET['action']=="modif" && !empty($_POST))
{ 
    $service = new Service;
    $service->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
            ->setService(empty($_POST['modifservice']) ? NULL : $_POST['modifservice'])
            ->setVille(empty($_POST['modifville']) ? NULL : $_POST['modifville']);

    $noserv = new ServiceMysqliDAO;
    
    $noserv::modifier($service, $_GET['noserv']);
}
/************************************** Supprimer */
elseif (isset($_GET["action"]) && $_GET['action']=="delete" )
{  
    $service = new Service;
    $service->setNoserv($_GET['noserv']);
  
    ServiceMysqliDAO::supprimer($service);
    }

/************************************** Tout les services */
$dataR = servService::research(); 

/************************************** ne peux pas sup service */
$dataSOS = servService::supOne(); 

/************************************** Profil */
$admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

