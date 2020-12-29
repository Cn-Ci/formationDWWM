<?php
session_start();

if(isset($_POST['nom'])){

    $_SESSION['login'] = $_POST['nom']; 
    header('location:./testlogin.php');
}


if(isset($_POST['deco'])){

    session_destroy();
    header('location:./testlogin.php');
}


if(isset($_SESSION['login'])){

    echo 'je suis loguer';
    echo 'bonjour '.$_SESSION['login'];
    echo '<form method="post" action="">

    <input type="submit" name="deco" value="deconnexion">
    </form>
    ';
}else{

    echo '<form method="post" action="">
    <input type="text" name="nom">
    <input type="submit" name="ok">
    </form>
    ';
}


