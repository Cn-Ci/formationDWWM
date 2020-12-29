//exo1
$("#see").click(function(e){
    $.ajax(
        'ajax.html',
        {
            success:function(data) {
                alert("Hello World");
            },
            error:function() {
                alert("Goodbye World");
            }
        }
    );
})

// exo2
$("#select").load("ajaxOptions.html");

//exo3
$("#form").on("submit", function (e) {
    e.preventDefault();
    const prenomInput =$("#input-prenom").val();
    const nomInput =$("#input-nom").val();
    if (prenomInput && nomInput) {
        $("<div>").attr({class : "alert alert-success", role:"alert"}).html("formulaire correctement rempli").appendTo($("#message").empty());
        $.post('test.php', 
        {prenom : prenomInput, nom : nomInput}, 
        function() {
            alert("insertion effectuée");
        })
    } else {
        $("<div>").attr({class : "alert alert-danger", role:"alert"}).html("formulaire non rempli").appendTo($("#message").empty());
    }
})

// insertion test.php post php
// echo $_POST["prenom"] . " " . $_POST['nom'];

