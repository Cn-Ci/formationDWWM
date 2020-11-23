<?php 

class Voiture {
    public $marque;
    public $modele;
 
    function __construct($newMarque, $newModele)
    {
        $this->marque = $newMarque;
        $this->modele = $newModele;
    }

    function toString()
    {
        return 
        $this->marque 
        . "\n" . 
        $this->modele;
    }
}