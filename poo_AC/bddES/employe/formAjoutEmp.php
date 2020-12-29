<!DOCTYPE html>
<html lang="en">
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
    <form class="text-center m-5" action="indexEmp.php?action=add" method="post">
       <h3>Formulaire d'inscription</h3>
            <input class="col-4 text-center" type="number" required name="no_emp" placeholder="Saisir votre numero d'employe"></br> 
            <input class="col-4 text-center" type="text" name="nom" placeholder="Saisir votre nom"> <br/>
            <input class="col-4 text-center" type="text" name="prenom" placeholder="Saisir votre prenom"> <br/>
            <div class="text-center" type="text" name="emploi" placeholder="Saisir votre emploi">
                <select class="col-4">
                    <option value="SECRETAIRE">SECRETAIRE</option>
                    <option value="VENDEUR">VENDEUR</option>
                    <option value="TECHNICIEN">TECHNICIEN</option>
                    <option value="COMPTABLE">COMPTABLE</option>
                    <option value="DIRECTEUR">DIRECTEUR</option>
                    <option value="ANALYSTE">ANALYSTE</option>
                    <option value="PROGRAMMEUR">PROGRAMMEUR</option>
                    <option value="BALAYEUR">BALAYEUR</option>
                    <option value="PUPITREUR">PUPITREUR</option>
                </select>
            </div>
            <input class="col-4 text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche"> <br/>
            <input class="col-4 text-center" type="text" name="sal" placeholder="Saisir votre salaire"> <br/>
            <input class="col-4 text-center" type="text" name="comm" placeholder="Saisir votre commission"> <br/>
            <div class="text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> 
            <select class="col-4">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select>
        </div>
            <div class="text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur">
                <select class="col-4">
                    <option>1000</option>
                    <option>1100</option>
                    <option>1200</option>
                    <option>1300</option>
                    <option>1400</option>
                    <option>1500</option>
                    <option>1600</option>
                </select>
            </div>
            <div class="text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet">
                <select class="col-4 ">
                    <option>Aucun</option>
                    <option>101</option>
                    <option>102</option>
                    <option>103</option>
                </select>
            </div>
            <input class="text-center col-1 btn btn-primary m-2"  type="submit" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-">
        <a href='indexEmp.php' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
        </a>
    </div>
</body>
</html>