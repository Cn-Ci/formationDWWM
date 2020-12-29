
<form class="text-center m-5" action="indexServ.php?action=add" method="post">
    <h3>Formulaire d'inscription</h3>
    <input class="col-4 text-center" type="number" required name="noserv" placeholder="Saisir votre numero de service"> </br>
    <input class="col-4 text-center" type="text" name="service" placeholder="Saisir votre service"> <br/>
    <input class="col-4 text-center" type="text" name="ville" placeholder="Saisir votre ville"> <br/>
        
    <input class="text-center col-1 btn btn-primary m-2" type="submit" value="Envoyez"> 
</form>
<div class="col-12 text-center mb-5">
    <a href='indexServ.php' class='text-white'>
        <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i>Retour</button>
    </a>
</div> 
