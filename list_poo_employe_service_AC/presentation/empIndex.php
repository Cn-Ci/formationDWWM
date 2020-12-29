<?php
function empIndex($admin, $tabResearch, $tabSupOne)
{
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
                             if(!empty($tabResearch))
                             {
                                foreach ($tabResearch as $value) 
                                {   
                                    echo '
                                        <tr>
                                            <td>'.$value->getNo_emp().'</td>
                                            <td>'.$value->getNom().'</td>
                                            <td>'.$value->getPrenom().'</td>
                                            <td>'.$value->getEmploi().'</td>
                                            <td>'.$value->getEmbauche()->format('Y-m-d').'</td>';
                                            if ($admin) 
                                            {
                                                echo '
                                            <td>'.$value->getSal().'</td>
                                            <td>'.$value->getComm().'</td>';
                                            } 
                                            echo '
                                            <td>'.$value->getNoserv().'</td>
                                            <td>'.$value->getSup().'</td>
                                            <td>'.$value->getNoproj().'</td>
                                            <td>
                                                <a href=controllerEmpIndex.php?action=modif&amp;no_emp='.$value->getNo_emp().'>
                                                    <button class="btn btn btn-primary"value="modif">Modifier</button>
                                                </a>
                                            </td>
                                            <td>
                                            <a href=controllerEmpIndex.php?action=voir&amp;no_emp='.$value->getNo_emp().'>
                                                <button class="btn btn-success"><i class="far fa-eye"></i> Consulter</button>
                                            </a>
                                            </td>';

                                            if(!empty($tabSupOne))
                                            { 
                                                $trouve = array_search($value->getNo_emp(),$tabSupOne);   
                                            }
                                            if (!$trouve && $admin) 
                                            {
                                                ?>
                                                <td>   
                                                    <a href="../controller/controllerEmpIndex.php?action=delete&amp;no_emp=<?php echo $value->getNo_emp()?>">
                                                        <button class="btn btn-danger" value='remove'>Supprimer</button>
                                                    </a>
                                                </td>
                                                <?php
                                            }
                                            else
                                                echo  '<td>Non-supr !</td>';       
                                            }
                                        '</tr>';
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
?>
<form class="text-center m-5" action="../controller/controllerEmpIndex.php?action=ajouterOK" method="post">
       <h3>Formulaire d'inscription</h3>
            <input class="col-6 text-center" type="number" required name="no_emp" placeholder="Saisir votre numero d'employe">
            <input class="col-6 text-center" type="text" name="nom" placeholder="Saisir votre nom">
            <input class="col-6 text-center" type="text" name="prenom" placeholder="Saisir votre prenom">
            <input class="col-6 text-center" type="text" name="emploi" placeholder="Saisir votre emploi">
            <input class="col-6 text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche">
            <input class="col-6 text-center" type="text" name="sal" placeholder="Saisir votre salaire">
            <input class="col-6 text-center" type="text" name="comm" placeholder="Saisir votre commission"> 
            <input class="col-6 text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> 
            <input class="col-6 text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur">
            <input class="col-6 text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet">
            <input class="col-6 text-center col-1 btn btn-primary m-2"  type="submit" name="ajouter" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-">
        <a href='../controller/controllerEmpIndex.php?action=afficheEmp' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
        </a>
    </div>
<?php    
}

function empFormModif($objectResearch)
{
?>
<h3 class="text-center">Formulaire de modification</h3>
        <form class="tableau text-center m-5" action="../controller/controllerEmpIndex.php?action=modifierOK" method="post"> 
                <input class="col-4 text-center" type="text" name="no_emp" value="<?php echo $objectResearch->getNo_emp()?>" > </br>
                <input class="col-4 text-center" type="text" name="nom" value="<?php echo $objectResearch->getNom()?>" ><br/>
                <input class="col-4 text-center" type="text" name="prenom" value="<?php echo $objectResearch->getPrenom(); ?>" > <br/>
                <input class="col-4 text-center" type="text" name="emploi" value="<?php echo $objectResearch->getEmploi();?>" > <br/>
                <input class="col-4 text-center" type="date" name="embauche" value="<?php echo $objectResearch->getEmbauche()->format('Y-m-d')?>" > <br/>
                <input class="col-4 text-center" type="number" name="sal" value="<?php echo $objectResearch->getSal()?>"> <br/>
                <input class="col-4 text-center" type="number" name="comm" value="<?php echo $objectResearch->getComm()?>" > <br/>
                <input class="col-4 text-center" type="number" name="noserv" value="<?php echo $objectResearch->getNoserv()?>" > <br/>
                <input class="col-4 text-center" type="number" name="sup" value="<?php echo $objectResearch->getSup()?>" placeholder="Modifier votre numero de supérieur"> <br/>
                <input class="col-4 text-center" type="number" name="noproj" value="<?php echo $objectResearch->getNoproj()?>" placeholder="Modifier votre numero de projet"> <br/>

                <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
        </form>
        <div class="col-12 text-center mb-">
            <a href='../controller/controllerEmpIndex.php?action=afficheEmp' class='text-white'>
                <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
            </a>
        </div>
<?php    
}

function empDetail($admin, $objectResearch)
{
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
                     <td><?= $objectResearch->getNo_emp() ?></td>
                     <td><?= $objectResearch->getNom() ?></td>
                     <td><?php echo $objectResearch->getPrenom() ?></td>
                     <td><?php echo $objectResearch->getEmploi()?></td>
                     <td><?php echo $objectResearch->getEmbauche()->format('Y-m-d') ?></td>
                     <?php
                     if ($admin) 
                         {
                     ?>
                     <td><?php echo $objectResearch->getSal()?></td>
                     <td><?php echo $objectResearch->getComm()?></td>
                     <?php
                         }
                     ?>
                     <td><?php echo $objectResearch->getNoserv() ?></td>
                     <td><?php echo $objectResearch->getSup()?></td>
                     <td><?php echo $objectResearch->getNoproj()?></td>
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