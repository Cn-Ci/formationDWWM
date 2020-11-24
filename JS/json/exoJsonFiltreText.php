<?php
include_once('Voiture.php');

$marques = [
    new Voiture('audi',["RS3","RS4","RS5"]),
    new Voiture('bmw',["x5","x6","x7"]),
    new Voiture('mercedes',["amg","a45","gla"]),
];

echo json_encode($marques);
