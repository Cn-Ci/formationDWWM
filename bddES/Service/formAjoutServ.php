<?php        
include_once('../Controller/sessionStartController.php');
include_once('../Controller/formAjoutServController.php');        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire ajout</title>
        <!-- BOOTSTRAP -->
        <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
    <!-- JQUERY -->
    <script
        src         ="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin ="anonymous">
    </script>
    <!-- CSS -->
</head>

<body>
    <form class="text-center m-5" action="indexServ.php?action=add" method="post">
        <h3>Formulaire d'inscription</h3>
        <input class="col-4 text-center" type="number" required name="noserv" placeholder="Saisir votre numero de service"> </br>
        <input class="col-4 text-center" type="text" name="service" placeholder="Saisir votre service"> <br/>
        <input class="col-4 text-center" type="text" name="ville" placeholder="Saisir votre ville"> <br/>
            
        <input class="text-center col-1 btn btn-primary m-2" type="submit" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-5">
        <a href='indexServ.php' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i>Retour</button>
        </a>
    </div> 
</body>
</html>