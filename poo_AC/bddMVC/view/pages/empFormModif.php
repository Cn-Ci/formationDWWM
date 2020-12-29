

<form class="text-center m-5" action="empIndex.php?action=add" method="post">
    <h3>Formulaire d'inscription</h3>
        <input class="col-4 text-center" type="number" required name="no_emp" placeholder="Saisir votre numero d'employe"> </br>
        <input class="col-4 text-center" type="text" name="nom" placeholder="Saisir votre nom"> <br/>
        <input class="col-4 text-center" type="text" name="prenom" placeholder="Saisir votre prenom"> <br/>
        <input class="col-4 text-center" type="text" name="emploi" placeholder="Saisir votre emploi"> <br/>
        <input class="col-4 text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche"> <br/>
        <input class="col-4 text-center" type="text" name="sal" placeholder="Saisir votre salaire"> <br/>
        <input class="col-4 text-center" type="text" name="comm" placeholder="Saisir votre commission"> <br/>
        <input class="col-4 text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> <br/>
        <input class="col-4 text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur"> <br/>
        <input class="col-4 text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet"> <br/>
        
        <input class="text-center col-1 btn btn-primary m-2"  type="submit" value="Envoyez"> 
</form>
<div class="col-12 text-center mb-">
    <a href='empIndex.php' class='text-white'>
        <button id="addBtn" class='col-4 btn btn btn-dark'><i class="fas fa-plus-circle"></i> Retour</button>
    </a>
</div>
