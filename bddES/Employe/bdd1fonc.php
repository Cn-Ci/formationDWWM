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
        <title>bdd1 form fonction</title>
    </head>

<body>

<div class="container">
<?php


if  (isset($_POST['ajouter']) )
{

    $noemp = $_POST['no_emp']; 
    $nom= is_null($_POST['nom']) ? 'NULL' : $_POST['nom'];
    $prenom= is_null($_POST['prenom']) ? 'NULL' : $_POST['prenom'];
    $emploi = is_null($_POST['emploi']) ? 'NULL' : $_POST['emploi'];
    $embauche = empty($_POST['embauche']) ? 'NULL' : $_POST['embauche'];
    $sal = is_null($_POST['sal']) ? 'NULL' : $_POST['sal'];
    $comm = is_null($_POST['comm']) ? 'NULL' : $_POST['comm'];
    $noserv = is_null($_POST['noserv']) ? 'NULL' : $_POST['noserv'];
    $sup = is_null($_POST['sup']) ? 'NULL' : $_POST['sup'];
    $noproj = is_null($_POST['noproj']) ? 'NULL' : $_POST['noproj'];
     
    add($noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
}

elseif (isset($_POST['modifier']))
{
    modifier($post);
}

elseif (isset($_POST['supprimer']))
{
    supprimer ($no_emp) ;
}

if (isset($_GET['page']))
{
    if($_GET['page'] == 'ajouter' || $_GET['page'] == 'modifier')
    {
        if ($_GET['page'] == 'ajouter')
        {
            $no_emp = '';
            $nom = '';
            $prenom = '';
            $emploi = '';
            $embauche = '';
            $sal = '';
            $comm = '';
            $noserv = '';
            $sup = '';
            $noproj = '';
            $action = 'ajouter';
        }
        elseif ($_GET['page'] == 'modifier')
        {
            $no_emp = $_GET['no_emp'];

            $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
            if($db->connect_error)
            {
                die('Erreur : ' .$db->connect_error);
            }

            $query = "SELECT * FROM employe where no_emp = ? " ;
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $no_emp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
        
            $rs->free();
            $db->close();

            $no_emp = $data['no_emp'];
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $emploi = $data['emploi'];
            $embauche = $data['embauche'];
            $sal = $data['sal'];
            $comm = $data['comm'];
            $noserv = $data['noserv'];
            $sup = $data['sup'];
            $noproj = $data['noproj'];
            $action = 'modifier';
        }

        echo '
        <div class="formulaire">
            <div class="row">
                <div class="col">
                    <form  method="post" action="">
                        <input required class="col-12" type="number" placeholder="no_emp" name="no_emp"  value="'.$no_emp.'">
                        <input class="col-12" type="text" placeholder="nom" name="nom" value="'.$nom.'">
                        <input class="col-12" type="text" placeholder="prenom" name="prenom" value="'.$prenom.'">
                        <input class="col-12" type="text" placeholder="emploi" name="emploi" value="'.$emploi.'">
                        <input class="col-12" type="date" placeholder="embauche" name="embauche" value="'.$embauche.'">
                        <input class="col-12" type="number" placeholder="sal" name="sal" value="'.$sal.'">
                        <input class="col-12" type="number" placeholder="comm" name="comm" value="'.$comm.'">
                        <input required class="col-12" type="number" placeholder="noserv" name="noserv" value="'.$noserv.'">
                        <input class="col-12" type="number" placeholder="sup" name="sup" value="'.$sup.'">
                        <input class="col-12" type="number" placeholder="noproj" name="noproj" value="'.$noproj.'">
                        <button type="submit" class="btn btn-info text-center" name="'.$action.'">'.$action.'</button>
                    </form>
                </div>
            </div>        
        </div>
        ';
    }
}
else
{
?>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">no_emp</th>
                <th scope="col">nom</th>
                <th scope="col">prénom</th>
                <th scope="col">emploi</th>
                <th scope="col">embauche</th>
                <?php
                if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                    {
                ?>
                <th scope="col">sal</th>
                <th scope="col">comm</th>
                 <?php   
                    }
                ?>
                <th scope="col">noserv</th>
                <th scope="col">sup</th>
                <th scope="col">noproj</th>
            </tr>
        </thead>

        <tbody>
        <?php
            
            $dataR = research(); 
            
            foreach ($dataR as $value){
               

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
                    
                    if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                    {
                    echo' <td><a href="bdd1fonc.php?page=modifier&no_emp='.$value['no_emp'].'" class="btn btn-warning">Modifier</button> </td>
                    <td>';
                    }
                    
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
                                echo
                                    '<form method="post" action="">
                                        <input type="hidden" name="no_emp" value="'.$value['no_emp'].'"> 
                                        <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    </td>
                                </tr>
                            ';
                    }
                    
            
        }
        ?>
        </tbody>
    </table>

        <div class="row">
            <div class="col-12 text-center">
                <a href="bdd1fonc.php?page=ajouter" class="btn btn-success">Ajouter</a>
            </div>
        </div>

        <?php 
        } 
        ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

        </div>
</body>
</html>