<?php 
include_once('EmployeMysqliDAO.php');

/* Modifier */
if (isset($_GET["action"])  && $_GET["action"]=="modif" && isset($_GET["no_emp"]) ) 
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