<?php       
include('crudPooS.php');
include_once('Service.php');
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
<?php 
/* Ajouter */
if (isset($_GET['action']) && $_GET['action']=="add" && !empty($_POST))
{
    $service = new Service;
    $service->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
            ->setService(empty($_POST['service']) ? NULL : $_POST['service'])
            ->setVille(empty($_POST['ville']) ? NULL : $_POST['ville']);
            
    add($service);
    
}
 /* Modifier */
elseif (isset($_GET['modif']) && $_GET['action']=="modif" && !empty($_POST))
{ 
    $service = new Service;
    $service->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
            ->setService(empty($_POST['modifservice']) ? NULL : $_POST['modifservice'])
            ->setVille(empty($_POST['modifville']) ? NULL : $_POST['modifville']);

    modifier($service);
}
/* Supprimer */
elseif (isset($_GET["action"]) && $_GET['action']=="delete" && !empty($_POST))
{  
    $service = new Service;
    $service->setNoserv($_GET['noserv']);
  
    supprimer($service);
    }
   
?>
<div class="text-center m-5">
    <?php
        if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
        {
    ?>
        <a href='formAjoutServ.php?action=add'>
            <button type="submit" class="col-4 text-center btn btn-primary">Ajouter un nouveau service</button>
        </a>
    <?php
        }
    ?>
        <a href='../index.php'>
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
                                    if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
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
                                    searchAll();
                                    $i = 0;
                                    foreach ($data as $key => $value) {
                                        echo "<tr id=trNo-".$i.">";
                                        foreach ($value as $k => $v) {
                                            echo "<td>$v</td>";
                                        }?>
                                        <td><a type='button' class='btn btn-primary' href='formAjoutServ.php?action=modif&noserv=<?php echo $value["noserv"];?>'>Modifier</a></td>
                                        <td><a type='button' class='btn btn-success' href='formDetailServ.php?action=voir&noserv=<?php echo $value["noserv"]; ?>'>Consulter</a></td>
                                        <?php
                                        $supr = supoupas();
                                        $tail=count($supr);

                                        for ($i=0; $i < $tail; $i++) {
                                            $trouve = false;
                                            if ($value['noserv']== $supr[$i]['noserv']) {
                                                $trouve = true;
                                            break;
                                            }
                                        }
                                        if (!$trouve && $_SESSION['profil'] == "administrateur") 
                                        {
                                        ?>
                                        
                                        <td><a type='button' class='btn btn-danger' href='indexServ.php?action=delete&noserv=<?php echo $value["noserv"]; ?>'>Supprimer</a></td>
                                        <?php 
                                         }else 
                                            echo '<td>Non-supr !</td>';
                                        $i++; 
                                    }                       
                                ?>
                                </tr>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>