
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

include 'crud.php';


if  (isset($_POST['ajouter']) 
){
                add($_POST['no_emp'], $_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['noserv'], $_POST['sup'], $_POST['noproj']);
}

elseif (isset($_POST['modifier'])
){
                modifier($_POST['no_emp'], $_POST['nom'],$_POST['prenom'],$_POST['emploi'],$_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['noserv'], $_POST['sup'], $_POST['noproj']);
}

elseif (isset($_POST['supprimer'])
){
                supprimer ($_POST['no_emp']) ;
}




if (isset($_GET['page'])){

    if($_GET['page'] == 'ajouter' || $_GET['page'] == 'modifier'){

        if ($_GET['page'] == 'ajouter'){

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

        }elseif ($_GET['page'] == 'modifier'){

            $no_emp = $_GET['no_emp'];

            
            $db = connection();

            //afficher données
            $sql = "SELECT * FROM employe WHERE no_emp = $no_emp";
            $rs = mysqli_query($db, $sql);
            $selectData = mysqli_fetch_assoc($rs);

            $no_emp = $selectData['no_emp'];
            $nom = $selectData['nom'];
            $prenom = $selectData['prenom'];
            $emploi = $selectData['emploi'];
            $embauche = $selectData['embauche'];
            $sal = $selectData['sal'];
            $comm = $selectData['comm'];
            $noserv = $selectData['noserv'];
            $sup = $selectData['sup'];
            $noproj = $selectData['noproj'];
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
}else{
?>


    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">no_emp</th>
            <th scope="col">nom</th>
            <th scope="col">prénom</th>
            <th scope="col">emploi</th>
            <th scope="col">embauche</th>
            <th scope="col">sal</th>
            <th scope="col">comm</th>
            <th scope="col">noserv</th>
            <th scope="col">sup</th>
            <th scope="col">noproj</th>
        </tr>
        </thead>
        <tbody>

        <?php

            $selectDatas = research();

        foreach ($selectDatas as $selectData){

            echo '
                <tr>
                    <td>'.$selectData['no_emp'].'</td>
                    <td>'.$selectData['nom'].'</td>
                    <td>'.$selectData['prenom'].'</td>
                    <td>'.$selectData['emploi'].'</td>
                    <td>'.$selectData['embauche'].'</td>
                    <td>'.$selectData['sal'].'</td>
                    <td>'.$selectData['comm'].'</td>
                    <td>'.$selectData['noserv'].'</td>
                    <td>'.$selectData['sup'].'</td>
                    <td>'.$selectData['noproj'].'</td>
                    <td><a href="bdd1fonc.php?page=modifier&no_emp='.$selectData['no_emp'].'" class="btn btn-warning">Modifier</button> </td>
                    <td>';

                    
                    $supr = supoupas();
                    $tail=count($supr);

                    for ($i=0; $i < $tail; $i++) {

                        $trouve = false;

                        if ($selectData['no_emp']== $supr[$i]['no_emp']) {
                            
                            $trouve = true;
                        break;
                        }
                    }

                    if (!$trouve) {
                    
                                echo
                                    '<form method="post" action="">
                                        <input type="hidden" name="no_emp" value="'.$selectData['no_emp'].'"> 
                                        <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    </td>
                                </tr>
                            ';
                    }else {
                        echo "Non-supr !";
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

<?php } ?>

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