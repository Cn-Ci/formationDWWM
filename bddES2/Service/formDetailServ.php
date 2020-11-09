<?php        
include("crudPooS.php");
include_once("Service.php");
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
        if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['noserv']))
        {
            $service = new Service;
            $service->setNoserv($_GET['noserv']);

            $noserv = voir($service)[0]['noserv'];
            $service = voir($service)[0]['service'];
            $ville = voir($service)[0]['ville'];
            
        ?>
        <table class="table rounded table-dark m-auto">
            <thead>
                <tr>
                    <th scope="col">noserv</th>
                    <th scope="col">service</th>
                    <th scope="col">ville</th>
                </tr>
            </thead>
            <tbody>
                <tr>  
                    <td><?= $noserv ?></td>
                    <td><?= $service ?></td>
                    <td><?php echo $ville ?></td>
                </tr>
            </tbody>
        </table> 
    </br>
        <div class="row ">
            <div class="col-12 text-center mb-">
                <a href='indexServ.php' class='text-white'>
                    <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
                </a>
            </div>
        </div>
        <?php
            }
        ?>
</div>

</body>
</html>