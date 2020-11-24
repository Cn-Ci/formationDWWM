<?php

// Insertion des infos du formulaire dans la BDD
//echo $_POST["prenom"] . " " . $_POST["nom"];

include_once("Batiment.php");

$bat = new Batiment("rue david dupond", 120);
$bat1 = new Batiment("rue david dupond", 150);

echo json_encode([$bat, $bat1]);