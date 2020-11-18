<?php 
session_start (); 
if (!isset ($_SESSION['username'])) 
{
    header('location : ../Utilisateur/formCon.php');
} 
include_once('../Employe/EmployeMysqliDAO.php');

$employe = new Employe;
$employe->setNo_emp($_GET['no_emp']);

$dataSOS = EmployeMysqliDAO::researchOneByNoserv($employe);        
?>