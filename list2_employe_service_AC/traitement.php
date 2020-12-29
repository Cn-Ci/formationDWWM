<?php 
session_start (); 
include("crud.php");

if (isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action']=="inscription"))
{
    if (isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']))
        {
            $exist = utilExist($_POST['username']);
            if ($exist)
            {
                echo 'Identifiant existant';
                showButton('formIns.php', 'formCon.php', 'Réessayer', 'Se connecter');
            }
            else
            {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                inserUtil($username, $password);
                header ('location: index.php');
            }
    }

}
elseif (isset($_GET['action']) && $_GET['action'] == "connexion") 
{
    if (isset($_POST['username']) && !empty($_POST['username'])&&
        isset($_POST['password']) && !empty($_POST['password']))
        {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $data = researchutilisateurMail($username);
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
}  
?>