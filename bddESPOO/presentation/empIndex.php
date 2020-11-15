<?php


function empIndex($admin, $dataR, $dataSOS)
{
    echo html();
 ?>

    <div class="text-center m-5">
    <?php
         if ($admin) 
        { 
    ?>
        <a href='../controller/controllerEmpIndex.php?action=add'>
            <button type="submit" class="col-4 text-center btn btn-primary">Ajouter un nouvel employe</button>
        </a>
    <?php
        } 
    ?>
        <a href='../controller/controllerUtilIndex.php'>
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
                                    if ($admin) 
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
                                    if ($admin) 
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
                             if(!empty($dataR))
                             {
                                foreach ($dataR as $value) 
                                {   
                                    echo '
                                        <tr>
                                            <td>'.$value['no_emp'].'</td>
                                            <td>'.$value['nom'].'</td>
                                            <td>'.$value['prenom'].'</td>
                                            <td>'.$value['emploi'].'</td>
                                            <td>'.$value['embauche'].'</td>';
                                            if ($admin) 
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
                                                <a href=controllerEmpIndex.php?action=modif&amp;no_emp='.$value['no_emp'].'>
                                                    <button class="btn btn btn-primary"value="modif">Modifier</button>
                                                </a>
                                            </td>
                                            <td>
                                            <a href=controllerEmpIndex.php?action=voir&amp;no_emp='.$value['no_emp'].'>
                                                <button class="btn btn-success"><i class="far fa-eye"></i> Consulter</button>
                                            </a>
                                            </td>';

                                            if(!empty($dataSOS))
                                            {
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
                                                if (!$trouve && $admin) 
                                                {
                                                ?>
                                                    <td>   
                                                        <a href="../controller/controllerEmpIndex.php?action=delete&amp;no_emp=<?php echo $value['no_emp'];?>">
                                                            <button class="btn btn-danger" value='remove'>Supprimer</button>
                                                        </a>
                                                    </td>
                                                <?php
                                                }else
                                                    echo  '<td>Non-supr !</td>';    
                                                } 
                                            }
                                }
                                ?>
                        </tbody>
                    </table>    
                </div>
            </div>
    </div>
<?php 
}

function empFormAjout()
{
    echo html();
?>
<form class="text-center m-5" action="../controller/controllerEmpIndex.php?action=afficheEmp" method="post">
       <h3>Formulaire d'inscription</h3>
            <input class="col-4 text-center" type="number" required name="no_emp" placeholder="Saisir votre numero d'employe"></br> 
            <input class="col-4 text-center" type="text" name="nom" placeholder="Saisir votre nom"> <br/>
            <input class="col-4 text-center" type="text" name="prenom" placeholder="Saisir votre prenom"> <br/>
            <div class="text-center" type="text" name="emploi" placeholder="Saisir votre emploi">
                <select class="col-4">
                    <option value="SECRETAIRE">SECRETAIRE</option>
                    <option value="VENDEUR">VENDEUR</option>
                    <option value="TECHNICIEN">TECHNICIEN</option>
                    <option value="COMPTABLE">COMPTABLE</option>
                    <option value="DIRECTEUR">DIRECTEUR</option>
                    <option value="ANALYSTE">ANALYSTE</option>
                    <option value="PROGRAMMEUR">PROGRAMMEUR</option>
                    <option value="BALAYEUR">BALAYEUR</option>
                    <option value="PUPITREUR">PUPITREUR</option>
                </select>
            </div>
            <input class="col-4 text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche"> <br/>
            <input class="col-4 text-center" type="text" name="sal" placeholder="Saisir votre salaire"> <br/>
            <input class="col-4 text-center" type="text" name="comm" placeholder="Saisir votre commission"> <br/>
            <div class="text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> 
            <select class="col-4">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select>
        </div>
            <div class="text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur">
                <select class="col-4">
                    <option>1000</option>
                    <option>1100</option>
                    <option>1200</option>
                    <option>1300</option>
                    <option>1400</option>
                    <option>1500</option>
                    <option>1600</option>
                </select>
            </div>
            <div class="text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet">
                <select class="col-4 ">
                    <option>101</option>
                    <option>102</option>
                    <option>103</option>
                </select>
            </div>
            <input class="text-center col-1 btn btn-primary m-2"  type="submit" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-">
        <a href='../controller/controllerEmpIndex.php?action=afficheEmp' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
        </a>
    </div>
<?php    
}

function empFormModif($dataV)
{
    echo html();
?>
<h3 class="text-center">Formulaire de modification</h3>
        <form class="tableau text-center m-5" action="../controller/controllerEmpIndex.php?action=modif&amp;no_emp=<?php echo $dataV['no_emp']?>" method="post"> 
                <input class="col-4 text-center" type="text" name="modifno_emp" value="<?php echo $dataV['no_emp']?>" > </br>
                <input class="col-4 text-center" type="text" name="modifnom" value="<?php echo $dataV['nom']?>" ><br/>
                <input class="col-4 text-center" type="text" name="modifprenom" value="<?php echo $dataV['prenom']; ?>" > <br/>
                <input class="col-4 text-center" type="text" name="modifemploi" value="<?php echo $dataV['emploi'];?>" > <br/>
                <input class="col-4 text-center" type="date" name="modifembauche" value="<?php echo $dataV['embauche']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsal" value="<?php echo $dataV['sal']?>"> <br/>
                <input class="col-4 text-center" type="number" name="modifcomm" value="<?php echo $dataV['comm']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifnoserv" value="<?php echo $dataV['noserv']?>" > <br/>
                <input class="col-4 text-center" type="number" name="modifsup" value="<?php echo $dataV['sup']?>" placeholder="Modifier votre numero de supérieur"> <br/>
                <input class="col-4 text-center" type="number" name="modifnoproj" value="<?php echo $dataV['noproj']?>" placeholder="Modifier votre numero de projet"> <br/>

                <input type="submit" class="btn btn-success col-1 m-2" name="modifer" value="Modifier"/>
        </form>
        <div class="col-12 text-center mb-">
            <a href='../controller/controllerEmpIndex.php?action=afficheEmp' class='text-white'>
                <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
            </a>
        </div>
<?php    
}

function empDetail($admin, $dataSOS)
{
    echo html();
?>
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
                 <a href='../controller/controllerEmpIndex.php?action=afficheEmp' class='text-white'>
                     <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
                 </a>
             </div>
         </div>    
</div>
<?php
}
?>