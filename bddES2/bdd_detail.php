<?php
        
include("/Employe/crudPoo.php");
include_once("/Employe/Employe.php");
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

 <div class="container mt-2">

    <?php
        if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['no_emp']))
        {
            $noemp = empty($_POST['no_emp']) ? NULL : $_POST['no_emp'];
            voir($noemp);
               
    ?>

        <table class="table table-striped table-dark w-75 m-auto">

            <thead>
                <tr>
                    <th scope="col">no_emp</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
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
                <tr>

                    <td><?php echo $_GET['no_emp']; ?></td>
                    <td><?php echo $data['nom']; ?></td>
                    <td><?php echo $data['prenom']; ?></td>
                    <td><?php echo $data['emploi']; ?></td>
                    <td><?php echo $data['embauche']; ?></td>
                    <td><?php echo $data['sal']; ?></td>
                    <td><?php echo $data['comm']; ?></td>
                    <td><?php echo $data['noserv']; ?></td>
                    <td><?php echo $data['sup']; ?></td>
                    <td><?php echo $data['noproj']; ?></td>

                </tr>
            </tbody>
        </table>
    </br>
        <div class="row ">
            <div class="col-12 text-center mb-">
                <a href='form.php' class='text-white'>
                    <button id="addBtn" class=' btn btn btn-secondary '><i class="fas fa-plus-circle"></i> Retour</button>
                </a>
            </div>
        </div>

        <?php
        }
        ?>

</div>

</body>
</html>