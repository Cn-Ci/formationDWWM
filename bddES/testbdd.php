<?php

include_once('Employe.php');
include_once('Service.php');

$service1 = new Service(11, 'Royauté', 'Monaco');
echo $service1;

$service2 = new Service(21, 'Principauté', 'New York');
echo $service2;




$employe1 = new Employe(2021, 'Par', 'Rane', 'Raine', '2020-10-27', '25000', '7770', '2100', $service1->getNoserv(), 102);
echo $employe1;

$employe2 = new Employe(2021, 'Per', 'Rene', 'Reine', '2020-10-26', '26000', '7771', '3100', $service2->getNoserv(), 102);
echo $employe2;

$employe3 = new Employe(2021, 'Pir', 'Rine', 'Riine', '2020-10-25', '27000', '7772', '4100', $service1->getNoserv(), 102);
echo $employe3;

$employe4 = new Employe(2021, 'Por', 'Rone', 'Roine', '2020-10-24', '28000', '7773', '5100', $service2->getNoserv(), 102);
echo $employe4;


         







