<?php
include_once('EmployeMysqliDAO.php');

/* Ajouter */
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