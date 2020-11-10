<?php
include_once('../Employe/EmployeMysqliDAO.php');
include_once('../Service/ServiceMysqliDAO.php');
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : formCon.php');
}         
?>