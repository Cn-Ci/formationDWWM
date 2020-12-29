$("#prenom").on('input', function(e){
        e.preventDefault();
        const prenom = $(this).val();
        let url = "../JS/js.php?prenom=" + prenom ;

        $.getJSON(url, function(data){
                const d = $.Deferred();
                maReponse = data;
                $("tbody").empty();
                $.each(data, function(cle, valeur){
                        console.log(valeur);
                        $("#modele").append($("<td>").html(valeur.no_emp),
                                        $("<td>").html(valeur.nom),
                                        $("<td>").html(valeur.prenom),
                                        $("<td>").html(valeur.emploi),
                                        $("<td>").html(valeur.embauche),
                                        $("<td>").html(valeur.sal),
                                        $("<td>").html(valeur.comm),
                                        $("<td>").html(valeur.sup),
                                        $("<td>").html(valeur.noserv),
                                        $("<td>").html(valeur.noproj)).appendTo($("tbody"));
                });
                d.resolve(maReponse);
        });
});
