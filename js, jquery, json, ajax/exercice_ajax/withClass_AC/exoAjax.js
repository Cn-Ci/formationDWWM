/* 
objectif = select vide renault = clio megane
si je met audi = a1 a2 a5 

lance la page select une marque 
quand on selectionne il appel par rapport a la maarque
-> class voiture php 
    - marque / modele public 
-> fichier test plusieur voiture pour chaque marque 
    - marque renault donc clio 
    filtrage
-> index 2 select 
    1er pre rempli renault audi 
    appel ajax  

Création de la classe Voiture qui a les attributs publiques $marque et $modele
	Création d'un fichier php qui permet de créer plusieurs voitures de marques et modèles différents
	Un fichier Html qui va avoir deux sélect avec des marques et deuxième select sans options initialement
 */

$("tbody").load("exoAjaxOption.php");

$("#marque").on("change", function(e){
    const marqueSelectionnee = $("#marque :selected").val();
    if(marqueSelectionnee){
        $("#modele").load("exoAjaxOption.php?marque=" + marqueSelectionnee);
        $("tbody").load("exoAjaxOption.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    } else {
        $("#modele").load("exoAjaxOption.php?marque=");
        $("tbody").load("exoAjaxOption.php")
    }
});

$("#modele").on("change", function(e){
    const modeleSelectionne = $("#modele :selected").val();
    const marqueSelectionnee = $("#marque option:selected").val();
    if(modeleSelectionne){
        $("tbody").load("exoAjaxOption.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne + "&afficher=tableau");
    } else {
        $("tbody").load("exoAjaxOption.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    }

});


​
