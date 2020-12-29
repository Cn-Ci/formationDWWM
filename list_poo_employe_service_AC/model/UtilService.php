<?php 
include_once('../model/UtilisateurMysqliDAO.php');

Class UtilService {

    static function inserUtil(Utilisateur $utilisateur) 
    {
        UtilisateurMysqliDAO::inserUtil($utilisateur);
    } 

    function researchutilisateurMail(string $username) 
    {
        UtilisateurMysqliDAO::researchutilisateurMail($username);
        return $data;
    }

    static function send(Utilisateur $utilisateur)
    {  
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
                header ('location: controllerUtilIndex.php');
            }
    }

    static function connecter(Utilisateur $utilisateur)
    {
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
    
}