// $("#select-id").load("options.html");

// $("#my-form").on("submit", function(e){
//     e.preventDefault();
//     const prenomInput = $("#input-prenom").val();
//     const nomInput = $("#input-nom").val();
//     if(prenomInput && nomInput){
//         $("<div>").attr({class: "alert alert-success", role: "alert"}).html("Fomulaire correctement remplis.").appendTo($("#message").empty())
//         $.post('test.php', 
//             {prenom : prenomInput, nom : nomInput},
//             function(){
//                 alert("Insert effectuée !")
//             });
//     } else {
//         $("<div>").attr({class: "alert alert-danger", role: "alert"}).html("Fomulaire mal remplis.").appendTo($("#message").empty())
//     }
// })

$("#btn").on("click", function(e){
    $.get("test.php", function(data){
        console.log(data);
        const batiments = JSON.parse(data);
        console.log(batiments);
        $("body").append("J'habite au bat qui se trouve au " + 
                        batiments[0].adresse + " qui fait " + batiments[0].superficie  + " m²");
        console.log(JSON.stringify(batiments));
                    })
})