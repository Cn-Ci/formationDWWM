<?php 

class Employe {
    private $no_emp;
    private $nom;
    private $prenom;
    private $emploi;
    private $embauche;
    private $sal;
    private $comm;
    private $sup;
    private $noserv;
    private $noproj;


    public function __toString() :string
    {
        return " \n\n[Num employé] : " . $this->no_emp
             . " [Nom] : " . $this->nom
             . " [Prenom] : " . $this->prenom 
             . " \n[Emploi] : " . $this->emploi 
             . " [Embauche] : " . $this->embauche 
             . " [Salaire] : " . $this->sal 
             . " [Commission] : " . $this->comm
             . " [Supérieur] : " . $this->sup 
             . " [Num Service] : " . $this->noserv 
             . " [Num projet] : " . $this->noproj
             . "\n";
    }

    /**
     * Get the value of no_emp
     */ 
    public function getNo_emp():int
    {
        return $this->no_emp;
    }

    /**
     * Set the value of no_emp
     *
     * @return  self
     */ 
    public function setNo_emp($no_emp):self
    {
        $this->no_emp = $no_emp;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom() :string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom) :self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom():string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom):self
    {
        $this->prenom = $prenom;

        return $this;
    }
    /**
     * Get the value of emploi
     */ 
    public function getEmploi()
    {
        return $this->emploi;
    }

    /**
     * Set the value of emploi
     *
     * @return  self
     */ 
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }
    /**
     * Get the value of embauche
     */ 
    public function getEmbauche():?DateTime
    {
        return $this->embauche;
    }

    /**
     * Set the value of embauche
     *
     * @return  self
     */ 
    public function setEmbauche(?DateTime $embauche):self
    {
        $this->embauche = $embauche;

        return $this;
    }

    /**
     * Get the value of sal
     */ 
    public function getSal():float
    {
        return $this->sal;
    }

    /**
     * Set the value of sal
     *
     * @return  self
     */ 
    public function setSal($sal):self
    {
        $this->sal = $sal;

        return $this;
    }

    /**
     * Get the value of comm
     */ 
    public function getComm():float
    {
        return $this->comm;
    }

    /**
     * Set the value of comm
     *
     * @return  self
     */ 
    public function setComm($comm):self
    {
        $this->comm = $comm;

        return $this;
    }

    /**
     * Get the value of sup
     */ 
    public function getSup():int
    {
        return $this->sup;
    }

    /**
     * Set the value of sup
     *
     * @return  self
     */ 
    public function setSup($sup):self
    {
        $this->sup = $sup;

        return $this;
    }

    /**
     * Get the value of noserv
     */ 
    public function getNoserv():int
    {
        return $this->noserv;
    }

    /**
     * Set the value of noserv
     *
     * @return  self
     */ 
    public function setNoserv($noserv):self
    {
        $this->noserv = $noserv;

        return $this;
    }

    /**
     * Get the value of noproj
     */ 
    public function getNoproj():int
    {
        return $this->noproj;
    }

    /**
     * Set the value of noproj
     *
     * @return  self
     */ 
    public function setNoproj($noproj):self
    {
        $this->noproj = $noproj;

        return $this;
    }

   
}

