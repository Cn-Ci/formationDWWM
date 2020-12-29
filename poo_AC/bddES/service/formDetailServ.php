<?php       
include_once('../Controller/detailServController.php');
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
        <table class="table rounded text-center table-dark m-auto">
            <thead>
                <tr>
                    <th>noserv</th>
                    <th>service</th>
                    <th>ville</th>
                </tr>
            </thead>
            <tbody>
                <tr>  
                    <td><?= $dataSOS['noserv'] ?></td>
                    <td><?= $dataSOS['service'] ?></td>
                    <td><?php echo $dataSOS['ville'] ?></td>
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
</div>

</body>
</html>