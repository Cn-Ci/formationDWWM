<?php 


function servIndex($admin, $dataR, $dataSOS)
{ 
    echo html();
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
                                    if(!empty($dataR))
                                    { 
                                        foreach ($dataR as $value) 
                                        {
                                            echo <<<BOUTTON
                                            <tr> 
                                                    <td> {$value['noserv']}</td>
                                                    <td> {$value['service']}</td>
                                                    <td> {$value['ville']}</td>
                                                    <td><a class="btn btn-primary" href="controllerServIndex.php?action=modif&amp;noserv={$value["noserv"]}"> Modifier</a></td>
                                                    <td><a class="btn btn-success" href="controllerServIndex.php?action=voir&amp;noserv={$value["noserv"]}"> Consulter</a></td>                                 
BOUTTON;                                                                               
                                            if (!empty($dataSOS)) 
                                            {
                                                $tail=count($dataSOS);
                                                for ($i=0; $i < $tail; $i++) 
                                                {
                                                    $trouve = false;
                                                    if ($value['noserv']== $dataSOS[$i]['noserv']) 
                                                    {
                                                        $trouve = true;
                                                    break;
                                                    }
                                                }
                                                if (!$trouve && $admin) 
                                                {
                                                ?>
                                                <td><a type='button' class='btn btn-danger' href='../controller/controllerServIndex.php?action=delete&noserv=<?php echo $value["noserv"]; ?>'>Supprimer</a></td>
                                                <?php 
                                                }else 
                                                    echo '<td>Non-supr !</td>';
                                                $i++;
                                            } 
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
function servFormAjout()
{
    echo html();
?>
    <form class="text-center m-5" action="../controller/controllerServIndex.php?action=ajouter" method="post">
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
function servFormModif($dataSOS)
{
    echo html();
?>
<h3 class="text-center">Formulaire de modification</h3>
    <form class="tableau text-center m-5" action="../controller/controllerServIndex.php?action=modif&noserv=<?php echo $dataSOS['noserv']?>" method="post"> 
            <input class="col-4 text-center" type="text" name="modifnoserv" value="<?php echo $dataSOS['noserv']?>"> </br>
            <input class="col-4 text-center" type="text" name="modifservice" value="<?php echo $dataSOS['service']?>" ><br/>
            <input class="col-4 text-center" type="text" name="modifville" value="<?php echo $dataSOS['ville']; ?>" > <br/>

            <input type="submit" class="btn btn-success col-1 m-2" name="modifer" value="Modifier"/>
    </form>
    <div class="col-12 text-center mb-">
        <a href='../controller/controllerServIndex.php?action=afficheServ' class='text-white'>
            <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
        </a>
    </div> 
<?php
}
function servDetail($dataV)
{
    echo html();
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
                    <td><?= $dataV['noserv'] ?></td>
                    <td><?= $dataV['service'] ?></td>
                    <td><?php echo $dataV['ville'] ?></td>
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