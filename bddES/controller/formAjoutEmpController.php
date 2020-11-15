<?php 
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : formCon.php');
}         
include_once('../employe/formAjoutEmp.php');
?>