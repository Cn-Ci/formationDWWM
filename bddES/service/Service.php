<?php 

class Service {
    private $noserv;
    private $service;
    private $ville;

    public function __toString() :string
    {
        return " \n\n[Num service] : " . $this->noserv
                . " [service] : " . $this->service
                . " [ville] : " . $this->ville 
                . "\n";
    }
/* get sortir quand on veut recupherer  */
    public function getNoserv():?int
    {
        return $this->noserv;
    }

/* set inserer la variable  */
    public function setNoserv($noserv):self
    {
        $this->noserv = $noserv;
        return $this;
    }

    public function getService():?string
    {
        return $this->service;
    }

    public function setService($service):self
    {
        $this->service = $service;
        return $this;
    }

    public function getVille():?string
    {
        return $this->ville;
    }

    public function setVille($ville):self
    {
        $this->ville = $ville;
        return $this;
    }
}