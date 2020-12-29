<div class='text-center m-0 p-5'>
    <?php
    if ($session) 
    {
        echo 
        "
        <br>   
            <a type='button' class='btn btn-success col-4 m-5' href='../Employe/indexEmp.php'>Voir la table Employe</a>
            <a type='button' class='btn btn-success col-4 m-5' href='../Service/indexServ.php'>Voir la table Service</a>
        <br>";
    
        
        echo "<a type='button' class='btn btn-danger col-4 m-5' href='traitement.php?action=deconnexion'>Se déconnecter</a>
        <br>
        ";
    } 

    else 
    {
        echo 
        "
            <br>
                <a type='button' class='btn btn-secondary col-4 m-5' href='formIns.php'>S'inscrire</a>
                <a type='button' class='btn btn-success col-4 m-5' href='formCon.php'>Se connecter</a>
            <br>
        ";
    } 
    ?>
</div> 
