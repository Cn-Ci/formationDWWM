<?php
include_once('EmployeMysqliDAO.php');

if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['no_emp']))
{
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    $employeTrouve = EmployeMysqliDAO::researchOne($employe);
    $noemp = $employeTrouve['no_emp'];
    $nom = $employeTrouve['nom'];
    $prenom = $employeTrouve['prenom'];
    $emploi = $employeTrouve['emploi'];
    $embauche = $employeTrouve['embauche'];
    $sal = $employeTrouve['sal'];
    $comm = $employeTrouve['comm'];
    $noserv= $employeTrouve['noserv'];
    $sup = $employeTrouve['sup'];
    $noproj = $employeTrouve['noproj'];       
}
?>