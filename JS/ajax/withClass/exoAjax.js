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



/* $("#select").load("exoAjaxOption.html");


$("#marque").on("submit", function (e) {
    e.preventDefault();
    const audi =$("#audi").val($("#").load('exoAjaxOption.html'));
    const bmw =$("#bmw").val();
    const mercedes =$("#mercedes").val();
    if (audi) {
        $("<select>").load(
            'exoAjaxOption.html',
            {option: audi1, audi2, audi3}
        )
        $.post('test.php', 
        {prenom : prenomInput, nom : nomInput}, 
        function() {
            alert("insertion effectuée");
        })
    } else {
        $("<div>").attr({class : "alert alert-danger", role:"alert"}).html("formulaire non rempli").appendTo($("#message").empty());
    }
})

$(document).ready(function() {

    // à la sélection d une valeur dans la liste
    $("#marque").on('change', function() {
        var val = $(this).val(); // on récupère la valeur de la liste
 
        if(val != '') {
            $("#id_seconde_liste_deroulante").empty(); // on vide la liste des départements
             
            $.ajax({
                url: 'traitement.php',
                data: {val:val},
                type: "POST",
                dataType: 'json',
                success: function(reponse) {
                    //on rempli la seconde liste
                    $.reponse(json, function(index, value) {
                        $("#id_seconde_liste_deroulante").append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
              , error:function(jqXHR, textStatus){
                 alert('Error.\n' + jqXHR.responseText);
              });
            });
        }
    });
});
 */

$("#modele").load('exoAjaxOption.php');

console.log($audi)

$("#marque").change(function(e) {
    e.preventDefault();

    var marque = $('#marque option:selected').val();
        $.each( modele, function( index , value ) {
            console.log(value[0])
            if (marque == value[0]){

                console.log(tab)

        $("#modele").append("<option>" + selectedValue + "</option>")
          
            }
    });
}); 