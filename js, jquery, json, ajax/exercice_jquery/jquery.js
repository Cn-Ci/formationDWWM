/* 

addClass()	    Ajouter la classe spécifiée à  chacun de l'ensemble des éléments sélectionnés
After()	        Insérer le contenu spécifié par le paramètre, après chaque élément dans l'ensemble des éléments sélectionnés
Append()	    Insère le contenu à  la fin des éléments sélectionnés (toujours à  l'intérieur)
appendTo()	    Insère le contenu à  la fin des éléments sélectionnés ( toujours à  l'intérieur)
attr()	        Définit ou renvoie un attribut et sa valeur des éléments sélectionnés
Before()	    Insérer le contenu, spécifié par le paramètre, avant chaque élément dans l'ensemble des éléments sélectionnés
Css()	        Obtenir la valeur d'une propriété de style pour le premier élément dans l'ensemble des éléments sélectionnés.
clone()	        Créer une copie des éléments sélectionnés
Detach()	    Supprime les éléments sélectionné (en conservant une copie )
Empty()	        Supprime tous les éléments enfants et leurs contenus des éléments sélectionnés
hasClass()	    Vérifie si un des éléments sélectionnés a une classe spécifiée (pour les CSS)
html()	        Définit ou renvoie le contenu des éléments sélectionnés
innerHeight()	Renvoie la hauteur calculée actuelle pour le premier élément dans l'ensemble des éléments sélectionnés, y compris le padding, mais pas la frontière.
innerWidth()	Renvoie la largeur calculée actuelle pour le premier élément dans l'ensemble des éléments sélectionnés, y compris le padding, mais pas la frontière.
insertAfter()	Insère des balises HTML ou des éléments après les éléments sélectionnés
insertBefore()	Insère des balises HTML ou des éléments avant les éléments sélectionnés
offset()	    Renvoie les coordonnées actuelles du premier élément dans l'ensemble des éléments sélectionnés, par rapport au document.
position()	    Obtenez les coordonnées actuelles du premier élément dans l'ensemble des éléments sélectionnés, par rapport à  son parent.
Prepend()	    Insère le contenu au début des éléments sélectionné (toujours à  l'intérieur)
prependTo()	    Insère le contenu au début des éléments sélectionné (toujours à  l'intérieur)
prop()	        Obtenir ou définir une propriété de l'élément sélectionné
Remove()	    Supprime les éléments sélectionnés
removeAttr()	Supprime un attribut des éléments sélectionnés
removeClass()	Supprime une ou plusieurs classes des éléments sélectionnés (pour les CSS)
replaceAll()	Remplace le contenu des éléments sélectionnés avec un nouveau contenu
replaceWith()	Remplace le contenu des éléments sélectionnés avec un nouveau contenu
ScrollLeft()	Renvoie la position horizontale actuelle de la barre de défilement pour le premier élément dans l'ensemble des éléments sélectionnés.
scrollTop()	    Obtenir la position verticale actuelle de la barre de défilement pour le premier élément dans l'ensemble des éléments assortis.
Text()	        Définit ou renvoie le contenu texte des éléments sélectionnés
toggleClass()	Bascule entre Ajout et suppression d'une ou plusieurs classes (pour les CSS) des éléments sélectionnés
Unwrap()	    Supprime l'élément parent des éléments sélectionnés
Val()	        Définit ou renvoie l'attribut value des éléments sélectionnés (pour les éléments de formulaire)
Wrap()	        Envelopper d'une structure HTML chaque élément dans l'ensemble des éléments sélectionné
wrapAll()	    Envelopper d'une structure HTML  tous les éléments dans l'ensemble des éléments sélectionnés
*/

// EXO 1
$("#jsstyle").on('click',function(){
        $("p").css("color", "red");
    }); 


// EXO 2
var id = $("a").attr("id");
var href = $("a").attr("href");
var hreflang = $("a").attr("hreflang");
var rel = $("a").attr("rel");
var target = $("a").attr("target");
var type = $("a").attr("type");
   
    $("#values-btn").on('click',function(){
        alert('id = '+ id + ' ,href = ' + href + ' ,hreflang = ' + hreflang + ' ,rel = ' + rel + ' ,target = ' + target + ' ,type = ' + type);
    });

// EXO 3
// each (chaque) = pour chaque ligne de mon tr
$("#myTable tr").each(function(r){
    // row est la variable pour la ligne
    var row = r +1;
    // pour chaque this de td 
    // Pour accéder à un objet jQuery au lieu de l'élément DOM normal, utilisez $( this ) ici td de la table.
    $("td", this).each(function(d){
        // cell est la variable pour la colone
        var cell = d +1;
        var text = $(this).html(); 
        // on accedete a l'objet cell
        $(this)
            // $ .data () Est utilisée pour accéder aux données sur les éléments spécifiés, renvoie la valeur de consigne
            .data("rowIndex", row)
            .data("cellIndex", cell)
            // quand on clic sur une celulle 
            .click(function(){
                    // affiche la ligne et la colone dans la div message
                    $("#message").text("Row-Index is: " + $(this).data("rowIndex") +
                                    " and Cell-Index is: " + $(this).data("cellIndex") );
                    $("#ligne").text("ligne = "+ $(this).data("rowIndex") );
                    $('#colone').text("colone = " + $(this).data("cellIndex"));
                    $('#text').text("text = " + text);       
                })
            .hover(
                function(){
                    $(this).addClass("td-over").css({"text-align":"center"});
                },function(){
                    $(this).removeClass("td-over").css({"text-align":"left"});
            });   
    });
});
$("#recup").click(function(){
    $("#text").replaceWith()
})

// Correction
$("#idBtn").on("click", function(e){
    const row = $("#idRow").val();
    const col = $("#idCol").val();
    const text = $("#idText").val();
    modifyCell(row, col, text);
});

function modifyCell(row, col, text) {
    const tr = $("tr").eq(row-1);
    // recupere les enfants de tr, chercher a la case de la colone fourni -1
    // et recupere le text dedans
    tr.children().eq(col-1).html(text);
    // tout en une seule ligne :
    $("tr").eq(row-1).children().eq(col-1).html(text);


//EXO 4 
// Correction
 const table = $("<table border='1'>");
 for (let i = 0 ; i < row; i++) {
     const tr = $("<tr>")
     for (let j = 0 ; j < col; j++) {
        tr.append($("<td>").html(i + "-" + j)); 
     }
     table.append(tr);
 }
 $("body").append(table);
}



//exo 5 
// Correction

/* const options = $("#colorSelect").children();
console.log(options.length);
$("#form-remove").on("submit", function(e){
    e.preventDefault();
    options.remove();
    //location.href = "test.php";
    // $(":selected").remove();
}) */

const options = $("#colorSelect").children();
$("#remove-btn").on("click", function(e){
    // options.remove();
    $(":selected").remove();
})