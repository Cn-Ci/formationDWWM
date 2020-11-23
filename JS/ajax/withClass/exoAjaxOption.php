<?php 
include_once("Voiture.php");

$voiture1 = new Voiture('audi', 'RS3');
$voiture2 = new Voiture('audi', 'RS4');
$voiture3 = new Voiture('audi', 'RS6');
$voiture4 = new Voiture('bmw', 'M3');
$voiture5 = new Voiture('bmw', 'M4');
$voiture6 = new Voiture('bmw', 'M5');
$voiture7 = new Voiture('mercedes', 'Classe A');
$voiture8 = new Voiture('mercedes', 'GLA');
$voiture9 = new Voiture('mercedes1', 'C64 AMG');

$audi = array();
$bmw = array();
$mercedes = array();

array_push($audi, $voiture1, $voiture2, $voiture3);
array_push($bmw, $voiture4, $voiture5, $voiture6);
array_push($mercedes, $voiture7, $voiture8, $voiture9);


