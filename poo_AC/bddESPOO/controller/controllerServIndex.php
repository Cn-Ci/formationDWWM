<?php 
session_start (); 
include_once('../model/ServService.php');
include_once('../presentation/servIndex.php');
include_once('../presentation/utilIndex.php'); 


echo "Bonjour " . ($_SESSION['username']);
/************************************** Ajouter */
if (isset($_GET['action']) && (isset($_SESSION['username'])))
{ 
    if($_GET["action"]=="afficheServ") 
    {
        /************************************** Tout les services */
        $tabResearch = ServService::research(); 

        /************************************** ne peux pas sup service */
        $dataSOS = ServService::supOne(); 

        /************************************** Profil */
        $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
        html();
        servIndex($admin, $tabResearch, $dataSOS);
    }  
    elseif($_GET['action']=="add")
    {
        html();
        servFormAjout();
    }
        if ($_GET["action"]=="ajouterOK")
        {
            $service = new Service;
            $service->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
                    ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
                    ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);
                
            ServService::add($service); 
            /************************************** Tout les services */
            $tabResearch = ServService::research(); 

            /************************************** ne peux pas sup service */
            $dataSOS = ServService::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
            html();
            servIndex($admin, $tabResearch, $dataSOS);
        } 
    /************************************** Modifier */
    if ($_GET['action']=="modif" && isset($_GET['noserv']))
    { 
        $service = new Service;
        $service->setNoserv($_GET['noserv']) 
                ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
                ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);

        $objectResearch = ServService::researchOneById($service);
        ServService::modifier($service);
        html();
        servFormModif($objectResearch);
    }
       if($_GET["action"]=="modifierOK") 
        {    
            $service = new Service;
            $service->setNoserv($_POST['noserv'])
            ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
                ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);

            ServService::modifier($service);
           
            /************************************** Tout les services */
            $tabResearch = servService::research(); 

            /************************************** ne peux pas sup service */
            $dataSOS = servService::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
            html();
            servIndex($admin, $tabResearch, $dataSOS);
    }
    /************************************** Supprimer */
    elseif ($_GET['action']=="delete" )
    {  
        $service = new Service;
        $service->setNoserv($_GET['noserv']);
    
        servService::supprimer($service);
        /************************************** Tout les services */
        $tabResearch = servService::research(); 

        /************************************** ne peux pas sup service */
        $dataSOS = servService::supOne(); 

        /************************************** Profil */
        $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
        html();
        servIndex($admin, $tabResearch, $dataSOS);
    }
    elseif($_GET['action']== "voir" && isset($_GET['noserv']) )   
    {   
        $service = new Service;
        $service->setNoserv($_GET['noserv']);
        $objectResearch = Servservice::researchOneById($service); 
        html(); 
        servDetail($objectResearch);
    }
}
else
{
    echo "pas connecté";
}
