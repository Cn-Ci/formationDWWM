<?php 
session_start (); 
if (!isset ($_SESSION['username'])) 
{
    header('location : ../utilisateur/formCon.php');
} 
include_once('../service/formAjoutServ.php');
