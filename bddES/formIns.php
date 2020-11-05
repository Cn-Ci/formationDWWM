<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>
    <form class="tableau text-center m-5" action="traitement.php?action=inscription" method="post">
        <label for="formgr">username :</label>
            <input required class="form text-center" type="text" name="username" class="form-control" placeholder="Saisir votre username"> <br/><br/>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="col-3 text-center" name="password" required>
    </div> 
    
    
        <button class="form text-center btn btn-primary" type="submit" >Envoyez</button> 
    </form>

</body>
</html>