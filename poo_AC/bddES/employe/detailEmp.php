<?php 
include_once('../controller/detailEmpController.php')
      
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
         <table class="table rounded table-dark m-auto">
             <thead>
                 <tr>
                     <th scope="col">no_emp</th>
                     <th scope="col">nom</th>
                     <th scope="col">prenom</th>
                     <th scope="col">emploi</th>
                     <th scope="col">embauche</th>
                     <?php
                     if ($admin) 
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
                 <tr>  
                     <td><?= $dataSOS['no_emp'] ?></td>
                     <td><?= $dataSOS['nom'] ?></td>
                     <td><?php echo $dataSOS['prenom']; ?></td>
                     <td><?php echo $dataSOS['emploi'] ?></td>
                     <td><?php echo $dataSOS['embauche']; ?></td>
                     <?php
                     if ($admin) 
                         {
                     ?>
                     <td><?php echo $dataSOS['sal']; ?></td>
                     <td><?php echo $dataSOS['comm']; ?></td>
                     <?php
                         }
                     ?>
                     <td><?php echo $dataSOS['noserv']; ?></td>
                     <td><?php echo $dataSOS['sup']; ?></td>
                     <td><?php echo $dataSOS['noproj']; ?></td>
                 </tr>
             </tbody>
         </table> 
     </br>
         <div class="row ">
             <div class="col-12 text-center mb-">
                 <a href='indexEmp.php' class='text-white'>
                     <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
                 </a>
             </div>
         </div>    
</div>

</body>
</html>