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
        <style>
            body{
                overflow-x:hidden;
            }
        </style>
    </head>

    <body>
        <div class="container"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                    <?php 
                    //* FORMULAIRE AJOUT 
                    if($_GET["action"]=="ajouter")
                    {   
                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Ajout</h1>
                            <form action="servTable.php" method="POST">
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">noserv</label>
                                    <input type="number" class="form-control" name="noserv">
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">service</label>
                                    <input type="text" class="form-control" name="service">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ville</label>
                                    <input type="text" class="form-control" name="ville">
                                </div>

                                <input name="add" type="submit" class="btn btn-primary" value="Ajouter"></input>
                            </form>
                        </div><?php 
                    }
                    //* FORMULAIRE MODIF
                    else if($_GET["action"]=="modif")
                    {
                        include 'ConnectBdd.php';
                        
                        $noserv        = $_GET['noserv'];
                        $selectRequest = "SELECT * FROM service WHERE noserv = $noserv";
                        $r             = mysqli_query($dbServ, $selectRequest);
                        $data          = mysqli_fetch_array($r, MYSQLI_ASSOC);
                        $noserv        = $data["noserv"];
                        $service       = $data["service"];
                        $ville         = $data["ville"];

                        ?>
                        <div class="col-sm-4">
                            <h1 class="text-center">Formulaire Modif</h1>
                            <form action="servTable.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Numéro d'employes</label>
                                    <input type="text" class="form-control" name="noserv" value="<?php echo $noserv ?>" readonly>
                                </div>
                                <!-- NOM -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" name="service" value="<?php echo $service ?>">
                                </div>
                                <!-- PRENOM -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prénom</label>
                                    <input type="text" class="form-control" name="ville" value="<?php echo $ville ?>">
                                </div>

                                <input name="modif" type="submit" class="btn btn-primary" value="Modifier"/>
                            </form>
                        </div><?php 
                    }
                ?> 
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>