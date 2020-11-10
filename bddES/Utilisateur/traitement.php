<?php 
session_start (); 
include("UtilisateurMysqliDAO.php");

if (isset($_GET['action']) && !empty($_GET['action']))
{
    if ($_GET['action']=="inscription" && 
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']))
        {
            $exist = UtilisateurMysqliDAO::researchutilisateurMail($_POST['username']);
            if ($exist)
            {
                echo 'Identifiant existant';
                showButton('formIns.php', 'formCon.php', 'Réessayer', 'Se connecter');
            }
            else
            {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                UtilisateurMysqliDAO::inserUtil($username, $password);
                
                header ('location: index.php');
            }
    }
    elseif ($_GET['action'] == "connexion" &&
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']))
        {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $data = UtilisateurMysqliDAO::researchutilisateurMail($username);
            if ($data) 
            {
                $trouve = password_verify($password,$data['password']);
                if ($trouve)
                {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['profil'] = $data['profil'];
                    header ('location: index.php'); 
                }else
                    header ('location: index.php'); 
            }
            else 
            {
                echo '<h2>Mauvais mot de passe ou identifiant</h2>';
                showButton('formCon.php', 'formIns.php', 'Réessayer', 'S\'inscrire');
            }
    }
    elseif ($_GET['action'] == "deconnexion" )
    {
        session_start();
        session_destroy();
        header("location:index.php"); 
    }  
} 


?>