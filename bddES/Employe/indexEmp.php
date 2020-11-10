<?php
include_once('../Controller/sessionStartController.php');
include_once('../Controller/indexEmpAddController.php');
include_once('../Controller/indexEmpModifController.php');
include_once('../Controller/indexEmpDelController.php');
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
    <div class="text-center m-5">
    <?php
        if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
        {
    ?>
        <a href='formAjoutEmp.php?action=add'>
            <button type="submit" class="col-4 text-center btn btn-primary">Ajouter un nouvel employe</button>
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
                <div class="col-10 mt-2 ml-5 mr-5 ">
                    <table class="table table-dark rounded">
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
                                    
                                    <th>Modifier</th>
                                    <th>Consulter</th>
                                    <th>Supprimer</th>
                                    <?php   
                                        }
                                    ?>
                                </tr>
                        </thead>

                        <tbody class="text-center">
                            <tr>
                                <?php
                                $employe = new EmployeMysqliDAO;
                                $dataR = $employe->research(); 
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
                                            <td>'.$value['noproj'].'</td>
                                            <td>
                                                <a href=formAjoutEmp.php?action=modif&amp;no_emp='.$value['no_emp'].'>
                                                    <button class="btn btn btn-primary"value="modif">Modifier</button>
                                                </a>
                                            </td>
                                            <td>
                                            <a href=detailEmp.php?action=voir&amp;no_emp='.$value['no_emp'].'>
                                                <button class="btn btn-success"><i class="far fa-eye"></i> Consulter</button>
                                            </a>
                                            </td>';

                                            $dataSOS = EmployeMysqliDAO::supoupas();
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
                                                <td>   
                                                    <a href="indexEmp.php?action=delete&amp;no_emp=<?php echo $value['no_emp'];?>">
                                                        <button class="btn btn-danger" value='remove'>Supprimer</button>
                                                    </a>
                                                </td>
                                            <?php
                                            }else
                                                echo  '<td>Non-supr !</td>';    
                                            } 
                                ?>
                        </tbody>
                    </table>    
                </div>
            </div>
    </div>
</body>
</html>