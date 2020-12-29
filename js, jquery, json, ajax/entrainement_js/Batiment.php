<?php

class Batiment {

    public $adresse;
    public $superficie;

    public function __construct(string $adresse, float $superficie)
    {
        $this->adresse = $adresse;
        $this->superficie = $superficie;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse() : string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse(string $adresse) : self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of superficie
     */ 
    public function getSuperficie():float
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */ 
    public function setSuperficie(float $superficie) : self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function __toString():string {
        return "[Adresse] : " .$this->adresse . ",[superficie] : " . $this->superficie;
    }
}