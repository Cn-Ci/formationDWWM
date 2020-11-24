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

$("tbody").load("exoJsonOption.php");

// $("#marque").on("change", function(e){
//     const marqueSelectionnee = $("#marque :selected").val();
//     if(marqueSelectionnee){
//         $("#modele").load("exoJsonOption.php?marque=" + marqueSelectionnee);
//         $("tbody").load("exoJsonOption.php?marque=" + marqueSelectionnee + "&afficher=tableau");
//     } else {
//         $("#modele").load("exoJsonOption.php?marque=");
//         $("tbody").load("exoJsonOption.php")
//     }
// });

$("#marque").on("change", function(e){
    const marqueSelectionnee = $("#marque :selected").val();
    var i = 0;
    if(marqueSelectionnee){
        $.get("exoJsonFiltreText.php", function(data){
            //console.log(data);
            const voitures = JSON.parse(data);
            $.each(voitures, function() {
               if(voitures[i]['marque'] == marqueSelectionnee){
                   // console.log(marqueSelectionnee)
                   $("#laMarque").html('')
                   $("#laMarque").append("J'ai une voiture de MARQUE " + marqueSelectionnee)
               }
                i++;
            });
        });
        $("#modele").load("exoJsonOption.php?marque=" + marqueSelectionnee);
        $("tbody").load("exoJsonOption.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    } 
    else 
    {
        $("#modele").load("exoJsonOption.php?marque=");
        $("tbody").load("exoJsonOption.php")
    }
});

// $("#modele").on("change", function(e){
//     const modeleSelectionne = $("#modele :selected").val();
//     const marqueSelectionnee = $("#marque option:selected").val();
//     if(modeleSelectionne){
//         $("tbody").load("db_voitures.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne + "&afficher=tableau");
//     } else {
//         $("tbody").load("db_voitures.php?marque=" + marqueSelectionnee + "&afficher=tableau");
//     }
// })

$("#modele").on("change", function(e){
    const modeleSelectionne = $("#modele :selected").val();
    const marqueSelectionnee = $("#marque option:selected").val();
    var i = 0;
    if(modeleSelectionne){
        $.get("exoJsonFiltreText.php", function(data){
            //console.log(data);
            const voitures = JSON.parse(data);
            console.log(modeleSelectionne)
            $.each(voitures, function() {
               if( (voitures[i]['marque'] == marqueSelectionnee)){
                   console.log(modeleSelectionne)
                   $("#laMarque").html('')
                   $("#laMarque").append("J'ai une voiture de MARQUE " + marqueSelectionnee + " et le MODELE est " + modeleSelectionne)
               }
                i++;
            });
        });
        $("tbody").load("exoJsonOption.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne + "&afficher=tableau");
    } else {
        $("tbody").load("exoJsonOption.php?marque=" + marqueSelectionnee + "&afficher=tableau");
    }
});


// $("#btn").on("click", function(e){
//     $.get("exoJsonEncode.php", function(data){
//         //console.log(data);
//         const voitures = JSON.parse(data);
//         console.log(voitures);
//         var i = 0;
//         $.each(voitures, function() {
//             console.log(voitures[i]['marque'])
//             $("body").append("J'ai une voiture de MARQUE " + 
//             (voitures[i]['marque']) + " et son MODELE est " + (voitures[i]['modele']) + " .");
//             i++;
//            /*  JSON.stringify(voitures)  */
//         });
//     });
// })

