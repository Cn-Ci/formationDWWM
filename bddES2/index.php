<?php
        
          include_once ('crud.php');
          session_start (); 
           
?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <title>Accueil</title>
</head>
<body>
    
<?php
    if (isset($_SESSION['username'])) {
                echo "
                <br>
                    <a type='button' class='btn btn-primary' href='disconnect.php'>Se déconnecter</a>
                    <a type='button' class='btn btn-primary' href='Employe/bdd.php'>voir la table Employe</a>
                    <a type='button' class='btn btn-primary' href='Service/servTable.php'>voir la table Service</a>
                <br>";
            
        //* SI PAS
        } else {
                echo "
                    <br>
                        <a type='button' class='btn btn-primary' href='formIns.php'>S'inscrire</a>
                        <a type='button' class='btn btn-primary' href='formCon.php'>Se connecter</a>
                    <br>";
        } 
?>
        
</body>
</html>