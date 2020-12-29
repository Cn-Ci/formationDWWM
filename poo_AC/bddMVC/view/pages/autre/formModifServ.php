<h3 class="text-center">Formulaire de modification</h3>
<form class="tableau text-center m-5" action="indexServ.php?action=modif&noserv=<?php echo $dataSOS['noserv']?>" method="post"> 
        <input class="col-4 text-center" type="text" name="modifnoserv" value="<?php echo $dataSOS['noserv']?>"> </br>
        <input class="col-4 text-center" type="text" name="modifservice" value="<?php echo $dataSOS['service']?>" ><br/>
        <input class="col-4 text-center" type="text" name="modifville" value="<?php echo $dataSOS['ville']; ?>" > <br/>

        <input type="submit" class="btn btn-success col-1 m-2" value="Modifier"/>
</form>
<div class="col-12 text-center mb-">
    <a href='indexServ.php' class='text-white'>
        <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour à la page d'accueil</button>
    </a>
</div> 
