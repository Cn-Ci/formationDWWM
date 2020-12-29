<?php
include_once('Voiture.php');

$voiture =[
    new Voiture('audi', 'RS3'),
    new Voiture('audi', 'RS4'),
    new Voiture('audi', 'RS6'),
    new Voiture('bmw', 'M3'),
    new Voiture('bmw', 'M4'),
    new Voiture('bmw', 'M5'),
    new Voiture('mercedes', 'Classe A'),
    new Voiture('mercedes', 'GLA'),
    new Voiture('mercedes', 'C63 AMG')
];

echo json_encode($voiture);

