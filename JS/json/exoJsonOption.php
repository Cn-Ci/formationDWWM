<?php 
include_once("Voiture.php");

$voitures = [
    new Voiture('audi', 'RS3'),
    new Voiture('audi', 'RS4'),
    new Voiture('audi', 'RS6'),
    new Voiture('bmw', 'M3'),
    new Voiture('bmw', 'M4'),
    new Voiture('bmw', 'M5'),
    new Voiture('mercedes', 'Classe A'),
    new Voiture('mercedes', 'GLA'),
    new Voiture('mercedes', 'C64 AMG')
];

// Si le Get n'est pas vide et qu'il y a la marque et le get "afficher
if(!empty($_GET) && isset($_GET["marque"])  && !isset($_GET["afficher"]))
{
    // affiche le tableau avec les marques
    $voituresRetournees = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"]);
    afficherOptions($voituresRetournees);
} 
// sinon si le get est vide
elseif (empty($_GET))
{
    // affiche le tableau entier des voitures
    $voituresRetournees = $voitures;
}
// si on a le get marque et le get modele
elseif(isset($_GET["marque"]) && isset($_GET["modele"]))
{
    // on affiche le tableau avec la marque et le modele de la voiture
    $voituresRetournees = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"], $_GET["modele"]);
}
// si on a le get marque
elseif(isset($_GET["marque"]))
{
    // on affiche le tableau des modele
    $voituresRetournees = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"]);
}
// on affiche le tableau en entier
foreach ($voituresRetournees as $voiture) {
    echo "<tr><td>". $voiture->marque . "</td><td>". $voiture->modele . "</td></tr>";
}

// fonction pour afficher le tableau selon le sinon si
function afficherOptions(array $voituresRetournees)
{
    echo "<option value=''>-- Sélectionnez un modèle --</option>";
    foreach ($voituresRetournees as $voiture) {
       echo "<option value='" . $voiture->modele . "'>" . $voiture->modele . "</option>";
    }
}

// function pour filtrer la marque et le modele
function filterVoitureSelonMarqueEtModele(array $voitures, string $marque, string $modele=null) : array {
    $voituresRetournees = [];
    foreach ($voitures as $voiture) {
        if($modele && $marque && $marque == $voiture->marque && $modele == $voiture->modele){
            $voituresRetournees[] = $voiture;
        } elseif(!$modele && $marque && $marque == $voiture->marque){
            $voituresRetournees[] = $voiture;
        } 
    }
    return $voituresRetournees;
}