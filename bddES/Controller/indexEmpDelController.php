<?php 
include_once('EmployeMysqliDAO.php');

/* Supprimer */
if (isset($_GET["action"]) && $_GET['action']=="delete" && isset($_GET['no_emp']))
{ 
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    EmployeMysqliDAO::supprimer($employe); 
}