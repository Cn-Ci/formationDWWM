<?php        
include("crudPooS.php");
include_once("Service.php");
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : formCon.php');
}          
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
<?php 
if ($_GET["action"]=="add"){
?>
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
<?php

} 
elseif (isset($_GET['action']) && $_GET["action"]=="modif" && isset($_GET['noserv']))
{
    $service = new Service;
    $service->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
            ->setService(empty($_POST['modifservice']) ? NULL : $_POST['modifservice'])
            ->setVille(empty($_POST['modifville']) ? NULL : $_POST['modifville']);

    $noserv = voir($service)[0]['noserv'];
    $mom= voir($service)[0]['service'];
    $ville = voir($service)[0]['ville'];
    
    voir($employe); 
?>

    <h3 class="text-center">Formulaire de modification</h3>
        <form class="tableau text-center m-5" action="indexEmp.php?action=modif&amp;noserv=<?php echo $noserv?>" method="post"> 
                <input class="col-4 text-center" type="text" name="modifnoserv" value="<?php echo $noserv?>" > </br>
                <input class="col-4 text-center" type="text" id="fname" name="modifservice" value="<?php echo $mom?>" ><br/>
                <input class="col-4 text-center" type="text" name="modifville" value="<?php echo $ville; ?>" > <br/>

                <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
        </form>
        <div class="col-12 text-center mb-">
            <a href='indexServ.php' class='text-white'>
                <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
            </a>
        </div>
<?php
}
?>
       
</body>
</html>