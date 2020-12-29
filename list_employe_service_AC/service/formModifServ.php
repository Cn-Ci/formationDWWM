<?php        
include_once('../Controller/formModifServController.php');        
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

<h3 class="text-center">Formulaire de modification</h3>
    <form class="tableau text-center m-5" action="indexServ.php?action=modif&noserv=<?php echo $dataSOS['noserv']?>" method="post"> 
            <input class="col-4 text-center" type="text" name="modifnoserv" value="<?php echo $dataSOS['noserv']?>"> </br>
            <input class="col-4 text-center" type="text" name="modifservice" value="<?php echo $dataSOS['service']?>" ><br/>
            <input class="col-4 text-center" type="text" name="modifville" value="<?php echo $dataSOS['ville']; ?>" > <br/>

            <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
    </form>
    <div class="col-12 text-center mb-">
        <a href='indexServ.php' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
        </a>
    </div> 
</body>
</html>