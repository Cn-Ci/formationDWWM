<?php 
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : ../Utilisateur/formCon.php');
} 

include_once('../serviceCouche/empService.php');

/************************************** Ajouter */
if (isset($_GET["action"]) && $_GET["action"]=="add" && !empty($_POST))
{
    $embauche = empty($_POST['embauche']) ? NULL : $_POST['embauche'];
    $dateEmbauche = new DateTime($embauche);
    $employe = new Employe;
    $employe->setNo_emp(empty($_POST['no_emp']) ? NULL : $_POST['no_emp'])
            ->setNom(empty($_POST['nom']) ? NULL : $_POST['nom'])
            ->setPrenom(empty($_POST['prenom']) ? NULL : $_POST['prenom'])
            ->setEmploi(empty($_POST['emploi']) ? NULL : $_POST['emploi'])
            ->setEmbauche($dateEmbauche)
            ->setSal(empty($_POST['sal']) ? NULL : $_POST['sal'])
            ->setComm(empty($_POST['comm']) ? NULL : $_POST['comm'])
            ->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
            ->setSup(empty($_POST['sup']) ? NULL : $_POST['sup'])
            ->setNoproj(empty($_POST['noproj']) ? NULL : $_POST['noproj']);

    EmployeMysqliDAO::add($employe);
}
/************************************** Modifier */
elseif(isset($_GET["action"]) && $_GET["action"]=="modif" && isset($_GET["no_emp"]) ) 
{
    $embauche = empty($_POST['modifembauche']) ? NULL : $_POST['modifembauche'];
    $dateEmbauche = new DateTime($embauche);
    $employe = new Employe;
    $employe->setNo_emp(empty($_POST['modifno_emp']) ? NULL : $_POST['modifno_emp'])
            ->setNom(empty($_POST['modifnom']) ? NULL : $_POST['modifnom'])
            ->setPrenom(empty($_POST['modifprenom']) ? NULL : $_POST['modifprenom'])
            ->setEmploi(empty($_POST['modifemploi']) ? NULL : $_POST['modifemploi'])
            ->setEmbauche($dateEmbauche)
            ->setSal(empty($_POST['modifsal']) ? NULL : $_POST['modifsal'])
            ->setComm(empty($_POST['modifcomm']) ? NULL : $_POST['modifcomm'])
            ->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
            ->setSup(empty($_POST['modifsup']) ? NULL : $_POST['modifsup'])
            ->setNoproj(empty($_POST['modifnoproj']) ? NULL : $_POST['modifnoproj']);
     
    EmployeMysqliDAO::modifier($employe); 
}
/************************************** Supprimer */
elseif (isset($_GET["action"]) && $_GET['action']=="delete" && isset($_GET['no_emp']))
{ 
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    EmployeMysqliDAO::supprimer($employe); 
}
/************************************** Tout les services */
$dataR = empService::research(); 

/************************************** ne peux pas sup service */
$dataSOS = empService::supOne(); 

/************************************** Profil */
$admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

