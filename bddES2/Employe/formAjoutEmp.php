<?php
        
include("crudPoo.php");
include_once("Employe.php");
session_start (); 

if (!isset ($_SESSION['username'])) 
{
    header('location : formCon.php');
}
           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 
    if ($_GET["action"]=="add"){
?>
    <form class="text-center m-5" action="indexEmp.php?action=add" method="post">
       <h3>Formulaire d'inscription</h3>
            <input class="col-4 text-center" type="number" required name="no_emp" placeholder="Saisir votre numero d'employe"> </br>
            <input class="col-4 text-center" type="text" name="nom" placeholder="Saisir votre nom"> <br/>
            <input class="col-4 text-center" type="text" name="prenom" placeholder="Saisir votre prenom"> <br/>
            <input class="col-4 text-center" type="text" name="emploi" placeholder="Saisir votre emploi"> <br/>
            <input class="col-4 text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche"> <br/>
            <input class="col-4 text-center" type="text" name="sal" placeholder="Saisir votre salaire"> <br/>
            <input class="col-4 text-center" type="text" name="comm" placeholder="Saisir votre commission"> <br/>
            <input class="col-4 text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> <br/>
            <input class="col-4 text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur"> <br/>
            <input class="col-4 text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet"> <br/>
            
            <input class="text-center col-1 btn btn-primary m-2" type="submit" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-">
        <a href='indexEmp.php' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
        </a>
    </div>
<?php

} 
elseif (isset($_GET['action']) && $_GET["action"]=="modif" && isset($_GET['no_emp']))
{
    $employe = new Employe;
    $employe->setNo_emp($_GET['no_emp']);

    $noemp = voir($employe)[0]['no_emp'];
    $nom = voir($employe)[0]['nom'];
    $prenom = voir($employe)[0]['prenom'];
    $emploi = voir($employe)[0]['emploi'];
    $embauche = voir($employe)[0]['embauche'];
    $sal = voir($employe)[0]['sal'];
    $comm = voir($employe)[0]['comm'];
    $noserv= voir($employe)[0]['noserv'];
    $sup = voir($employe)[0]['sup'];
    $noproj = voir($employe)[0]['noproj'];

    voir($employe); 
?>

    <h3 class="text-center">Formulaire de modification</h3>
        <form class="tableau text-center m-5" action="indexEmp.php?action=modif&amp;no_emp=<?php echo $noemp?>" method="post"> 
                <input class="col-4 text-center" type="text" name="modifno_emp" value="<?php echo $noemp?>" > </br>
                <input class="col-4 text-center" type="text" id="fname" name="modifnom" value="<?php echo $nom?>" ><br/>
                <input class="col-4 text-center" type="text" name="modifprenom" value="<?php echo $prenom; ?>" > <br/>
                <input class="col-4 text-center" type="text" name="modifemploi" value="<?php echo $emploi?>" > <br/>
                <input class="col-4 text-center" type="date" name="modifembauche" value="<?php echo $embauche?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsal" value="<?php echo $sal?>"> <br/>
                <input class="col-4 text-center" type="number" name="modifcomm" value="<?php echo $comm?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifnoserv" value="<?php echo $noserv?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsup" value="<?php echo $sup?>" placeholder="Modifier votre numero de supérieur"> <br/>
                <input class="col-4 text-center" type="number" name="modifnoproj" value="<?php echo $noproj?>" placeholder="Modifier votre numero de projet"> <br/>

                <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
        </form>
        <div class="col-12 text-center mb-">
            <a href='indexEmp.php' class='text-white'>
                <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
            </a>
        </div>
<?php
}
?>

    </body>
</html>