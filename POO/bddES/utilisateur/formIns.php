<?php       
include_once('../Controller/utilController.php');        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>

    <form class="tableau text-center m-5" action="index.php?action=inscription" method="post">
        <h3>Inscription</h3>
        <input required class="col-4 text-center m-2" type="text" name="username"  placeholder="Saisir votre email"> <br/>
        <input requided class="col-4 text-center m-2" type="password" name="password" placeholder="Saisir votre mdp"> <br/>

        <button class="col-1 text-center btn btn-primary m-2" type="submit" >Envoyez</button>    
    </form>
    <div class="text-center">
        <a href='index.php'>
            <button type="submit" class="col-4 text-center btn btn-dark m-2 ">Retour à la page d'accueil</button>
        </a>
    </div>

</body>
</html>