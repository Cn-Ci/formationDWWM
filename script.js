// var formAttributes = {
//     action : "traitement.php",
//     method : "POST"
// };
// formAttributes.enctype="form-multipart";
// var formaulaire = createAndAppendElement(document.body, "form", formAttributes);
// var linkAtributes = {
//     href: "index.php",
//     title: "La page d'index",
//     textContent: "Acceuil"
// };
// var link = createAndAppendElement(document.body, "a", linkAtributes);
// var inputAttributes = {
//     type: "number",
//     name:  "age"
// };
// var input = createAndAppendElement(formaulaire, "input", inputAttributes);

// function createAndAppendElement(parent, tagName, attributes){
//     var elt = document.createElement(tagName);
//     var entries = Object.entries(attributes);
//     for(var [key, value]  of entries){
//         elt[key] = value;
//     } 
//     parent.appendChild(elt);
//     return elt;  
// }

// // Recap sur les elements dynamiques de nos fonctions
// /* 
// nomBalise => dynamique
// nomAttribut => dynamique

// */
// var divSon = document.getElementById("divSon");
// var divFather = document.getElementById("divFather");
// var divs = document.getElementsByTagName("div");
// var divQ = $('div');

// console.log(divs);
// console.log($("<div>"));

// divSon.addEventListener('click', function (event){
//     event.stopPropagation();
//     alert("Div Son clicked !");
// });

// divFather.addEventListener('click', function (event){
//     event.stopPropagation();
//     alert("Div Father clicked !");
// });

// for(var i=0; i< divs.length; i++){
//     var div = divs[i];
//     div.addEventListener('click', function (e){
//         // e.stopPropagation();
//         var myClickedElement = e.target;
//         myClickedElement.innerHTML = "";
//         var input = document.createElement("input");
//         input.type = "text";
//         myClickedElement.appendChild(input);
//     });
// }

// let cells = document.getElementsByTagName("td");
// for (let i = 0; i < cells.length; i++) {
//     const element = cells[i];
//     element.addEventListener('click', function(e){
//         const tdContent = element.innerHTML;
//         element.innerHTML = "";
//         const input = document.createElement("input");
//         input.type = "text";
//         input.value = tdContent;
//         const target = e.target;
//         target.appendChild(input); // phase 1: target = td, phase 2: target: input
//         input.focus();

//         input.addEventListener("focusout", function(e){
//             const targetInput = e.target;
//             console.log(targetInput);
//             const inputContent = targetInput.value;
//             targetInput.parentElement.innerHTML = inputContent;
//         });

//          TODO : evite de vider la cellule lors du clique sur l'input !!!
//          input.addEventListener('click', function(e){
//             // e.stopPropagation();
//         });
//     })
// }

$("#idBtn").on("click", function(e){
    modifyCell($("#idRow").val(), $("#idCol").val(), $("#idText").val());
});

// modifyCell(1, 2, "nouveau text");
function modifyCell(row, col, text){
    // $("tr").eq(row-1).children().eq(col-1).html(text);

    //$("tr:eq("+ (row-1) + ") td:eq(" + (col-1) + ")").html(text);

    const indiceCol = 2 * (row-1) + (col-1); // pour 2, 2 => 3 | pour 1, 1 => 0
    $("td").eq(indiceCol).html(text);

    // solution avec JS vanilla
    //$("td")[indiceCol].innerHTML = text;

    //exercice 4 (argument text sera ignoré)

    const table = $("<table border='1'>");
    for (let i = 0; i < row; i++) {
        const tr = $("<tr>");
        for (let j = 0; j < col; j++) {
            tr.append($("<td>").html(i + "-" + j)); // $("td").appendTo(tr);   
        }
        table.append(tr); // tr.appendTo(table); 
    }
    $("body").append(table); // table.appendTo($("body")); 
}

// Exercice 5 :

const options = $("#colorSelect").children();
console.log(options.length);
$("#form-remove").on("submit", function(e){
    e.preventDefault();
    options.remove();
    //location.href = "test.php";
    // $(":selected").remove();
})