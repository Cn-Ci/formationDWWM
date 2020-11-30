<?php       
function html(){
    ?>   
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        </head>
        <body>   
    <?php
} 
function utilIndex($errorCode=null){
    if($errorCode && $errorCode == 23001){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page de connexion et d'inscription ! !</div></center>";
    } 
    elseif($errorCode && $errorCode == 23003){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'inscription ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23007){
        echo "<center><div class='alert alert-danger'> Erreur lors de la deconnection ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23008){
        echo "<center><div class='alert alert-danger'> Erreur lors de la connection, verifiez les identifiants ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24001){
        echo "<center><div class='alert alert-success'> L'inscription a bien été effectuée ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24002){
        echo "<center><div class='alert alert-success'> vous êtes déconnecté, A bientot ! !</div></center>";
    }
 ?>
                <br>
                    <a type='button' class='btn btn-secondary col-4 m-5' href='../controller/controllerUtilIndex.php?action=afficherInscription'>S'inscrire</a>
                    <a type='button' class='btn btn-success col-4 m-5' href='../controller/controllerUtilIndex.php?action=connexion'>Se connecter</a>
                <br>
    </div> 
<?php 
}
function utilConnect($errorCode=null){
    if($errorCode && $errorCode == 23004){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page d'accueil'! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24003){
        echo "<center><div class='alert alert-success'> Bonjour, vous êtes connecté ! !</div></center>";
    }
?>    
    <div class='text-center m-0 p-5'>
        <?php
            echo 
            "
            <br>   
                <a type='button' class='btn btn-success col-4 m-5' href='../controller/controllerEmpIndex.php?action=afficheEmp'>Voir la table Employe</a>
                <a type='button' class='btn btn-success col-4 m-5' href='../controller/controllerServIndex.php?action=afficheServ'>Voir la table Service</a>
            <br>";
        
         
            echo "<a type='button' class='btn btn-danger col-4 m-5' href='../controller/controllerUtilIndex.php?action=deconnexion'>Se déconnecter</a>
            <br>
            ";
}
function utilFormIns($errorCode=null){
    if($errorCode && $errorCode == 1062){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page d'inscription ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23005){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page d'inscription ! !</div></center>";
    }
?>
<form class="tableau text-center m-5" action="../controller/controllerUtilIndex.php?action=inscription" method="post">
        <h3>Inscription</h3>
        <input required class="col-4 text-center m-2" type="text" name="username"  placeholder="Saisir votre email"> <br/>
        <input requided class="col-4 text-center m-2" type="password" name="password" placeholder="Saisir votre mdp"> <br/>

        <button class="col-1 text-center btn btn-primary m-2" type="submit" name="inscrire" >S'inscrire</button>    
    </form>
    <div class="text-center">
        <a href='../controller/controllerUtilIndex.php'>
            <button type="submit" class="col-4 text-center btn btn-dark m-2 ">Retour à la page d'accueil</button>
        </a>
    </div>
<?php
}
function utilFormCon($errorCode=null){
    if($errorCode && $errorCode == 23006){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page de Connection! !</div></center>";
    }
?>
 <form class="tableau text-center m-5" action="../controller/controllerUtilIndex.php?action=connect" method="post">
    <h3>Connexion</h3>
        <input required class="col-4 text-center m-2" type="text" name="username"  placeholder="Saisir votre email"> <br/>
        <input requided class="col-4 text-center m-2" type="password" name="password" placeholder="Saisir votre mdp"> <br/>

        <button class="col-1 text-center btn btn-primary m-2" type="submit" name="connecter" >Se connecter</button>    
    </form>
    <div class="text-center">
        <a href='../controller/controllerUtilIndex.php'>
            <button type="submit" class="col-4 text-center btn btn-dark m-2 ">Retour à la page d'accueil</button>
        </a>
    </div>
<?php
}
?>