<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
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
        <form class="tableau text-center m-5" action="indexEmp.php?action=modif&amp;no_emp=<?php echo $dataSOS['no_emp']?>" method="post"> 
                <input class="col-4 text-center" type="text" name="modifno_emp" value="<?php echo $dataSOS['no_emp']?>" > </br>
                <input class="col-4 text-center" type="text" name="modifnom" value="<?php echo $dataSOS['nom']?>" ><br/>
                <input class="col-4 text-center" type="text" name="modifprenom" value="<?php echo $dataSOS['prenom']; ?>" > <br/>
                <input class="col-4 text-center" type="text" name="modifemploi" value="<?php echo $dataSOS['emploi'];?>" > <br/>
                <input class="col-4 text-center" type="date" name="modifembauche" value="<?php echo $dataSOS['embauche']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsal" value="<?php echo $dataSOS['sal']?>"> <br/>
                <input class="col-4 text-center" type="number" name="modifcomm" value="<?php echo $dataSOS['comm']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifnoserv" value="<?php echo $dataSOS['noserv']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsup" value="<?php echo $dataSOS['sup']?>" placeholder="Modifier votre numero de supérieur"> <br/>
                <input class="col-4 text-center" type="number" name="modifnoproj" value="<?php echo $dataSOS['noproj']?>" placeholder="Modifier votre numero de projet"> <br/>

                <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
        </form>
        <div class="col-12 text-center mb-">
            <a href='indexEmp.php' class='text-white'>
                <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
            </a>
        </div>
</body>
</html>