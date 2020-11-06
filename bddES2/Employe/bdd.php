<?php
        
include ('crudPoo.php');
include_once('Employe.php');
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
        <title>bdd</title>
    </head>
<body>
<?php
/* Ajouter */
if (isset($_GET["action"]) && $_GET["action"]=="add" && !empty($_POST))
{
    $embauche = empty($_POST['embauche']) ? NULL : $_POST['embauche'];
    $dateEmbauche = new DateTime($embauche);
    $employe = new Employe;
    $employe->setNo_emp(empty($_POST['no_emp']) ? NULL : $_POST['no_emp'])
            ->setNom(empty($_POST['nom']) ? NULL : $_POST['nom'])
            ->setPrenom(empty($_POST['prenom']) ? NULL : $_POST['prenom'])
            ->setEmploi(empty($_POST['emploi']) ? NULL : $_POST['emploi'])
            ->setEmbauche($dateEmbauche)
            ->setSal(empty($_POST['sal']) ? NULL : $_POST['sal'])
            ->setComm(empty($_POST['comm']) ? NULL : $_POST['comm'])
            ->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
            ->setSup(empty($_POST['sup']) ? NULL : $_POST['sup'])
            ->setNoproj(empty($_POST['noproj']) ? NULL : $_POST['noproj']);
    add($employe);
}

/* Modifier */
elseif (isset($_GET["action"])  && $_GET["action"]=="modif" && isset($_GET["no_emp"]) ) 
{
    $noemp = empty($_POST['modifno_emp']) ? NULL : $_POST['modifno_emp']; 
    $nom= empty($_POST['modifnom']) ? NULL : $_POST['modifnom'];
    $prenom= empty($_POST['modifprenom']) ? NULL : $_POST['modifprenom'];
    $emploi = empty($_POST['modifemploi']) ? NULL : $_POST['modifemploi'];
    $embauche = empty($_POST['modifembauche']) ? NULL : $_POST['modifembauche'];
    $sal = empty($_POST['modifsal']) ? NULL : $_POST['modifsal'];
    $comm = empty($_POST['modifcomm']) ? NULL : $_POST['modifcomm'];
    $noserv = empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'];
    $sup = empty($_POST['modifsup']) ? NULL : $_POST['modifsup'];
    $noproj = empty($_POST['modifnoproj']) ? NULL : $_POST['modifnoproj'];

    modifier($noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);     
}
            
        /* Supprimer */
elseif (isset($_GET["action"]) && $_GET['action']=="delete" && isset($_GET['no_emp']))
{ 
    $noemp = $_GET['no_emp'];
    supprimer($noemp); 
}
?>
<!-- tableau de bdd -->
                        <a href='../bdd_ajout.php?action=add'>
                            <button type="submit" class="btn btn-primary"> 
                                Ajouter un nouvel employe
                            </button>
                        </a>

    <div class="container-fluid">
            <div class="row">
                <div class="col-10 m-5 ">
                    <table class="table table-striped table-secondary">
                        <thead class="text-center">
                                <tr>
                                    <th>no_emp</th>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>emploi</th>
                                    <th>embauche</th>
                                    <?php
                                    if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                                        {
                                    ?>
                                    <th>sal</th>
                                    <th>comm</th>
                                    <?php   
                                        }
                                    ?>
                                    <th>noserv</th>
                                    <th>sup</th>
                                    <th>noproj</th>
                                    <?php
                                    if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                                        {
                                    ?>
                                    <th>Supprimer</th>
                                    <th>Modification</th>
                                    <th>Modification</th>
                                    <?php   
                                        }
                                    ?>
                                </tr>
                        </thead>

                        <tbody class="text-center">
                            <tr>
                                <?php
                                /* connection a la bdd */
                                $dataR = research(); 
                                $dataSOS = supoupas();
                                    $tail=count($dataSOS);

                                foreach ($dataR as $value) 
                                {   
                                    echo '
                                        <tr>
                                            <td>'.$value['no_emp'].'</td>
                                            <td>'.$value['nom'].'</td>
                                            <td>'.$value['prenom'].'</td>
                                            <td>'.$value['emploi'].'</td>
                                            <td>'.$value['embauche'].'</td>';
                        
                                            if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                                            {
                                                echo '
                                            <td>'.$value['sal'].'</td>
                                            <td>'.$value['comm'].'</td>';
                                            } 
                                            echo '
                                            <td>'.$value['noserv'].'</td>
                                            <td>'.$value['sup'].'</td>
                                            <td>'.$value['noproj'].'</td>';
                                            
                                            
                                            
                                            $dataSOS = supoupas();
                                            $tail=count($dataSOS);
                        
                                            for ($i=0; $i < $tail; $i++) 
                                            {
                                                $trouve = false;
                                                if ($value['no_emp']== $dataSOS[$i]['sup']) 
                                                {
                                                    $trouve = true;
                                                    break;
                                                }
                                            }
                        
                                            if (!$trouve && $_SESSION['profil'] == "administrateur") 
                                            {
                                ?>
                                    <!-- bouton supprimer -->
                                    <td>   
                                        <a href="../Employe/bdd.php?action=delete&amp;no_emp=<?php echo $value['no_emp'];?>">
                                            <button class="btn btn-danger" value='remove'>Supprimer</button>
                                        </a>
                                    </td>

                                    <!-- bouton modifier -->
                                    <td>
                                        <a href="../bdd_ajout.php?action=modif&amp;no_emp=<?php echo $value['no_emp'];?>">
                                            <button class='btn btn btn-primary'value='modif'>Modification</button>
                                        </a>
                                    </td> 

                                    <!-- bouton consulter -->
                                    <td>
                                        <a href='../bdd_detail.php?action=voir&amp;no_emp=<?php echo $value['no_emp'];?>'>
                                            <button class="btn btn-success"><i class="far fa-eye"></i> Consulter</button>
                                        </a>
                                    </td>

                                <?php
                                echo  "</tr>";
                                        }
                                } 
                                ?>
                        </tbody>
                    </table>    
                </div>
            </div>
    </div>
</body>
</html>