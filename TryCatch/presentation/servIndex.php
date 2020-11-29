<?php 

function servIndex($admin, $tabResearch, $tabSupOne, $errorCode=null){
    if($errorCode && $errorCode == 23001){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page Service! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23002){
        echo "<center><div class='alert alert-danger'> Ce service existe déjà ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23004){
        echo "<center><div class='alert alert-danger'> Erreur lors de la modification ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23005){
        echo "<center><div class='alert alert-danger'> Erreur lors de la suppression ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24000){
        echo "<center><div class='alert alert-success'> Le service a bien été ajouté ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24001){
        echo "<center><div class='alert alert-success'> Le service a bien été modifié ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 24002){
        echo "<center><div class='alert alert-success'> La suppression a bien été effectuée ! !</div></center>";
    }
?>
    <div class="text-center m-5">
    <?php
        if ($admin) 
        {
    ?>
        <a href='controllerServIndex.php?action=add'>
            <button type="submit" class="col-4 text-center btn btn-primary">Ajouter un nouveau service</button>
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
            <div class="col-sm-1"></div>
                <div class="col-sm-10 mb-5">
                    <table class="table table-striped table-dark">
                        <thead class="text-center">
                            <tr>
                                <th>noserv</th>
                                <th>service</th>
                                <th>ville</th>
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
                                <?php       
                                    if(!empty($tabResearch))
                                    { 
                                        foreach ($tabResearch as $value) 
                                        {
                                            echo <<<BOUTTON
                                            <tr> 
                                                    <td> {$value->getNoserv()}</td>
                                                    <td> {$value->getService()}</td>
                                                    <td> {$value->getVille()}</td>
                                                    <td><a class="btn btn-primary" href="controllerServIndex.php?action=modif&amp;noserv={$value->getNoserv()}"> Modifier</a></td>
                                                    <td><a class="btn btn-success" href="controllerServIndex.php?action=voir&amp;noserv={$value->getNoserv()}"> Consulter</a></td>                                 
BOUTTON;                                                                               
                                            if (!empty($tabSupOne)) 
                                            {
                                                $trouve = array_search($value->getNoserv(),$tabSupOne); 
                                            }
                                            if (!$trouve && $admin) 
                                            {
                                                ?>
                                                <td>
                                                    <a type='button' class='btn btn-danger' href='../controller/controllerServIndex.php?action=delete&noserv=<?php echo $value->getNoserv() ?>'>Supprimer</a>
                                                </td>
                                                <?php 
                                            }else 
                                                echo '<td>Non-supr !</td>';
                                            } 
                                        }                      
                                ?>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
<?php
}
function servFormAjout($errorCode=null){
    if($errorCode && $errorCode == 23007){
        echo "<div class='alert alert-danger'> Erreur lors de l'affichage de la page de formulaire d'ajout ! !</div>";
    }
?>
    <form class="text-center m-5" action="../controller/controllerServIndex.php?action=ajouterOK" method="post">
        <h3>Formulaire d'inscription</h3>
        <input class="col-4 text-center" type="number" required name="noserv" placeholder="Saisir votre numero de service"> </br>
        <input class="col-4 text-center" type="text" name="service" placeholder="Saisir votre service"> <br/>
        <input class="col-4 text-center" type="text" name="ville" placeholder="Saisir votre ville"> <br/>
            
        <input class="text-center col-1 btn btn-primary m-2" type="submit" name="ajout" value="Envoyez"> 
    </form>
    <div class="col-12 text-center mb-5">
        <a href='../controller/controllerServIndex.php?action=afficheServ' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i>Retour</button>
        </a>
    </div> 
<?php
}
function servFormModif($objectResearch, $errorCode=null){
    if($errorCode && $errorCode == 24008){
        echo "<div class='alert alert-danger'> Erreur lors de l'affichage de la page du formulaire de modification !</div>";
    }
?>
<h3 class="text-center">Formulaire de modification</h3>
    <form class="tableau text-center m-5" action="../controller/controllerServIndex.php?action=modifierOK" method="post"> 
            <input class="col-4 text-center" type="text" name="noserv" value="<?php echo $objectResearch->getNoserv()?>"> </br>
            <input class="col-4 text-center" type="text" name="service" value="<?php echo $objectResearch->getService()?>" ><br/>
            <input class="col-4 text-center" type="text" name="ville" value="<?php echo $objectResearch->getVille() ?>" > <br/>

            <input type="submit" class="btn btn-success col-1 m-2" name="modifer" value="Modifier"/>
    </form>
    <div class="col-12 text-center mb-">
        <a href='../controller/controllerServIndex.php?action=afficheServ' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
        </a>
    </div> 
<?php
}
function servDetail($objectResearch, $errorCode=null){
    if($errorCode && $errorCode == 23006){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page de consultation ! !</div></center>";
    }
?>
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
                    <td><?= $objectResearch->getNoserv() ?></td>
                    <td><?= $objectResearch->getService()?></td>
                    <td><?php echo $objectResearch->getVille() ?></td>
                </tr>
            </tbody>
        </table> 
    </br>
        <div class="row ">
            <div class="col-12 text-center mb-">
                <a href='../controller/controllerServIndex.php?action=afficheServ' class='text-white'>
                    <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
                </a>
            </div>
        </div>
</div>
<?php
}
?>