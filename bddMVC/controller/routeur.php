<?php
require_once ('controllerEmpIndex.php');
require_once ('controllerEmpForm.php');
require_once ('controllerEmpDetail.php');


session_start (); 
/* if (!isset ($_SESSION['username'])) 
{
    header('location : ../pages/formCon.php');
}  */
//include_once('../serviceCouche/empService.php');


if(isset($_GET['action']))
{
    if($_GET['action'] == 'add')
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

        controllerEmpForm::empFormAj($employe);
    }
    if($_GET['action'] == 'modifier' && isset($_GET["no_emp"]) )
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
        
        controllerEmpForm::empformModif();
    }
    elseif($_GET['action'] == 'supprimer')
    {
        $employe = new Employe;
        $employe->setNo_emp($_GET['no_emp']);

        controllerEmpForm::empIndex();
    }
    elseif ($_GET["action"]=="voir" && isset($_GET['no_emp']))
    { 
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    $dataSOS = controllerEmpDetail::empDetail($employe);   
    }
}
else
{
    controllerEmpIndex::empIndex();
}

/************************************** Tout les services */
$dataR = controllerEmpDetail::empDetail(); 

/************************************** ne peux pas sup service */
$dataSOS = controllerEmpIndex::empIndex(); 

/************************************** Profil */
$admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

