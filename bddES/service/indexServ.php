<?php       
include_once('../Controller/indexServController.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php et les bdd</title>
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
    </head>

<body>

<div class="text-center m-5">
    <?php
        if ($admin) 
        {
    ?>
        <a href='formAjoutServ.php?action=add'>
            <button type="submit" class="col-4 text-center btn btn-primary">Ajouter un nouveau service</button>
        </a>
    <?php
        }
    ?>
        <a href='../Utilisateur/index.php'>
            <button type="submit" class="col-4 text-center btn btn-dark m-2 ">Retour à la page d'accueil</button>
        </a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
                <div class="col-sm-10 mb-5">
                    <table class="table table-striped table-dark">
                        <thead class="text-center">
                            <tr>
                                <th>noserv</th>
                                <th>service</th>
                                <th>ville</th>
                                <?php
                                    if ($admin) 
                                    {
                                ?>
                                <th>Modifier</th>
                                <th>Consulter</th>
                                <th>Supprimer</th>
                                <?php
                                    }
                                ?>
                            </tr>
                        </thead>
                    
                        <tbody class="text-center">
                                <?php       
                                    if(!empty($dataR))
                                    { 
                                        foreach ($dataR as $value) 
                                        {
                                            echo <<<BOUTTON
                                            <tr> 
                                                    <td> {$value['noserv']}</td>
                                                    <td> {$value['service']}</td>
                                                    <td> {$value['ville']}</td>
                                                    <td><a class="btn btn-primary" href="formModifServ.php?action=modif&amp;noserv={$value["noserv"]}"> Modifier</a></td>
                                                    <td><a class="btn btn-success" href="formDetailServ.php?action=voir&amp;noserv={$value["noserv"]}"> Consulter</a></td>                                 
BOUTTON;                                                                               
                                            if (!empty($dataSOS)) 
                                            {
                                                $tail=count($dataSOS);
                                                for ($i=0; $i < $tail; $i++) 
                                                {
                                                    $trouve = false;
                                                    if ($value['noserv']== $dataSOS[$i]['noserv']) 
                                                    {
                                                        $trouve = true;
                                                    break;
                                                    }
                                                }
                                                if (!$trouve && $admin) 
                                                {
                                                ?>
                                                <td><a type='button' class='btn btn-danger' href='indexServ.php?action=delete&noserv=<?php echo $value["noserv"]; ?>'>Supprimer</a></td>
                                                <?php 
                                                }else 
                                                    echo '<td>Non-supr !</td>';
                                                $i++;
                                            } 
                                        } 
                                    }                      
                                ?>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>