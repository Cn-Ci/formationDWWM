<?php 
include_once('../model/UtilisateurMysqliDAO.php');
include_once("DAOException.php");
include_once('ServiceException.php');

Class UtilService {

    static function inserUtil(Utilisateur $utilisateur) 
    {
        try { 
            UtilisateurMysqliDAO::inserUtil($utilisateur);
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    } 

    function researchutilisateurMail(string $username) 
    {
        try { 
            UtilisateurMysqliDAO::researchutilisateurMail($username);
            return $data;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    static function send(Utilisateur $utilisateur)
    {  
        try { 
            $data = UtilisateurMysqliDAO::researchutilisateurMail($utilisateur->getUsername());
            if ($data)
            {
                header('location: controllerUtilIndex.php?utilexist');
            }
            else
            {
                $password = password_hash($utilisateur->getPassword(), PASSWORD_DEFAULT);
                $utilisateur->setPassword($password);

                UtilisateurMysqliDAO::inserUtil($utilisateur);
            }
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    static function connecter(Utilisateur $utilisateur)
    {
        try { 
            $data = UtilisateurMysqliDAO::researchutilisateurMail($utilisateur->getUsername());
        if ($data) 
        {     
            $password = $_POST['password'];
            if (password_verify($password,$data['password']))
            {
                $_SESSION['username'] = $data['username'];
                $_SESSION['profil'] = $data['profil'];
                return true;
            }
        }
        else
            return false;
            header('location: controllerUtilIndex.php?erreur=notexist'); 
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }    
    }
    
}