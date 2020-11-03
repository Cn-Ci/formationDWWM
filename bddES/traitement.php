<?php 

include("crud.php");
include("Utilisateur.php");


if (isset($_GET['action']) && !empty($_GET['action'])) {
    if ($_GET['action']=="inscription") {

            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $profil = Utilisateur::$profil;
            inserUtil($username, $password, $profil);
    }
    elseif ($_GET['action']== 'connexion') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $trouve = verif($username, $password);

    }
}



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
    
    <div class="container m-auto text-center">

  
        <?php 
    
        if (isset($trouve) && $trouve) {  
        ?>
            <div class="row py-5">
                <div class="col-11 col-md-5 m-auto">
                    <a class="btn btn-success w-50" href="Employe/bdd1fonc.php">Employés</a>
                </div>
                <div class="col-11 col-md-5 m-auto">
                    <a class="btn btn-success w-50" href="Service/servTable.php">Services</a>
                </div>
            </div>

            <?php
            }
            ?>

            <div class="row py-5">
                <div class="col-11 col-md-5 m-auto">
                    <a class="btn btn-success w-50" href="formCon.php">Connexion</a>
                </div>
                <div class="col-11 col-md-5 m-auto">
                    <a class="btn btn-success w-50" href="formIns.php">Inscription</a>
                </div>
            </div>
        
    </div>
</body>
</html>