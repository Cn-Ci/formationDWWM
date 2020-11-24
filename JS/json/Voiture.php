<?php 

class Voiture {
    public $marque;
    public $modele;
 
    function __construct(string $marque, $modele = null)
    {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    function toString()
    {
        return 
        "[marque] = " . $this->marque 
        .
        "[modele] = " . $this->modele;
    }
}