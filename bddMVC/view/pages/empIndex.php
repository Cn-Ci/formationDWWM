<div class="text-center m-5">
<?php
    if ($admin) 
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
                                            <a href=formModifEmp.php?action=modif&amp;no_emp='.$value['no_emp'].'>
                                                <button class="btn btn btn-primary"value="modif">Modifier</button>
                                            </a>
                                        </td>
                                        <td>
                                        <a href=detailEmp.php?action=voir&amp;no_emp='.$value['no_emp'].'>
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
                                                    <a href="indexEmp.php?action=delete&amp;no_emp=<?php echo $value['no_emp'];?>">
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
