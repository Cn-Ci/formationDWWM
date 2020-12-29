<?php       
session_start (); 
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../Controller/utilController.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <title>Accueil</title>
</head>
<body>
    <div class='text-center m-0 p-5'>
        <?php
        if ($session) 
        {
            echo 
            "
            <br>   
                <a type='button' class='btn btn-success col-4 m-5' href='../Employe/indexEmp.php'>Voir la table Employe</a>
                <a type='button' class='btn btn-success col-4 m-5' href='../Service/indexServ.php'>Voir la table Service</a>
            <br>";
        
         
            echo "<a type='button' class='btn btn-danger col-4 m-5' href='../Controller/utilDeconnectController.php'>Se déconnecter</a>
            <br>
            ";
        } 
    
        else 
        {
            echo 
            "
                <br>
                    <a type='button' class='btn btn-secondary col-4 m-5' href='formIns.php'>S'inscrire</a>
                    <a type='button' class='btn btn-success col-4 m-5' href='formCon.php'>Se connecter</a>
                <br>
            ";
        } 
        ?>
    </div> 
</body>
</html>