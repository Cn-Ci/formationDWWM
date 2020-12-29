<?php
session_start();
include_once('../model/UtilService.php');
include_once("../presentation/utilIndex.php");
include_once('../model/ServiceException.php');  

if (isset($_GET['action']) && !empty($_GET['action']))
{    
    if ($_GET['action']=="afficherInscription")   
    {
        try {
            html();
            utilFormIns();
        } 
        catch (ServiceException $se) {
            html();
            utilFormIns(23005);
        } 
    } 
    elseif ($_GET['action']=="inscription")   
    { 
        if (isset($_POST['inscrire']) &&
        isset($_POST['username'] ))
        {
            try {
            $utilisateur = new Utilisateur;
            $utilisateur->setUsername(htmlentities($_POST['username']))
                        ->setPassword(htmlentities($_POST['password']));

            UtilService::send($utilisateur);
            html();
            utilIndex(24001);
            }
            catch (ServiceException $se){
            html();
            utilFormIns($se->getMessage(), $se->getCode());
            }   
        }
    }   
    elseif ($_GET['action'] == "connexion" )
    {
        try {
            html();
            utilFormCon();
        } 
        catch (ServiceException $se) {
            html();
            utilFormCon(23006);
        }  
    }
    elseif (($_GET['action'] == "connect"))
    {
        if (isset($_POST['connecter']) &&
        isset($_POST['username'] ))
        {
            try {
                $utilisateur = new Utilisateur;
                $utilisateur->setUsername(htmlentities($_POST['username']))
                            ->setPassword(htmlentities($_POST['password']));
                        
                UtilService::connecter($utilisateur);

                if (UtilService::connecter($utilisateur))
                {
                    html();
                    utilConnect(24003);
                }
                else 
                {
                    html();
                    utilIndex(23008);
                }  
            }
            catch (ServiceException $se) {
                html();
                utilConnect(23004);
            }  
        }
    }
    elseif ($_GET['action'] == "deconnexion" )
    {
        try {
            session_destroy();
            html();
            utilIndex(24002);
        } 
        catch (ServiceException $se) {
            session_destroy();
            html();
            utilIndex(23007);
        } 
    }  
}
else   
{
    try {
        html();
        utilIndex();
    } 
    catch (ServiceException $se) {
        html();
        utilIndex(23002);
    } 
} 
?>