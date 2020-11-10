<?php
include_once('../Controller/sessionStartController.php');  
include_once('../Controller/detailEmpController.php')      
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
                 <tr>  
                     <td><?= $noemp ?></td>
                     <td><?= $nom ?></td>
                     <td><?php echo $prenom; ?></td>
                     <td><?php echo $emploi; ?></td>
                     <td><?php echo $embauche; ?></td>
                     <?php
                     if (isset($_SESSION['profil']) && $_SESSION['profil'] == "administrateur") 
                         {
                     ?>
                     <td><?php echo $sal; ?></td>
                     <td><?php echo $comm; ?></td>
                     <?php
                         }
                     ?>
                     <td><?php echo $noserv; ?></td>
                     <td><?php echo $sup; ?></td>
                     <td><?php echo $noproj; ?></td>
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