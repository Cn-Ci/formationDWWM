<?php 
session_start (); 
if (!isset ($_SESSION['username'])) 
{
    header('location : ../Utilisateur/formCon.php');
} 
include_once('../Service/formAjoutServ.php');
