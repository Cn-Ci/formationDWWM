<?php 

class Voiture {
    public $marque;
    public $modele;
 
    function __construct(string $marque, $modele)
    {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    function toString()
    {
        return 
        $this->marque 
        . "\n" . 
        $this->modele;
    }
}