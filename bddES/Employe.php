<?php 

class Employe {
    private $no_emp;
    private $nom;
    private $prenom;
    private $embauche;
    private $sal;
    private $comm;
    private $sup;
    private $noserv;
    private $noproj;


    public function __construct(    int $newNo_emp,
                                    string $newNom,
                                    string $newPrenom, 
                                    string $newEmploi, 
                                    string $newEmbauche, 
                                    int $newSal, 
                                    int $newComm,
                                    int $newSup,
                                    int $newNoserv,
                                    int $newNoproj)
    {
        $this->no_emp = $newNo_emp;
        $this->nom = $newNom;
        $this->prenom = $newPrenom;
        $this->emploi = $newEmploi;
        $this->embauche = $newEmbauche;
        $this->sal = $newSal;
        $this->comm = $newComm;
        $this->sup = $newSup;
        $this->noserv = $newNoserv;
        $this->noproj = $newNoproj;
    }

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
    public function getNo_emp()
    {
        return $this->no_emp;
    }

    /**
     * Set the value of no_emp
     *
     * @return  self
     */ 
    public function setNo_emp($no_emp)
    {
        $this->no_emp = $no_emp;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of embauche
     */ 
    public function getEmbauche()
    {
        return $this->embauche;
    }

    /**
     * Set the value of embauche
     *
     * @return  self
     */ 
    public function setEmbauche($embauche)
    {
        $this->embauche = $embauche;

        return $this;
    }

    /**
     * Get the value of sal
     */ 
    public function getSal()
    {
        return $this->sal;
    }

    /**
     * Set the value of sal
     *
     * @return  self
     */ 
    public function setSal($sal)
    {
        $this->sal = $sal;

        return $this;
    }

    /**
     * Get the value of comm
     */ 
    public function getComm()
    {
        return $this->comm;
    }

    /**
     * Set the value of comm
     *
     * @return  self
     */ 
    public function setComm($comm)
    {
        $this->comm = $comm;

        return $this;
    }

    /**
     * Get the value of sup
     */ 
    public function getSup()
    {
        return $this->sup;
    }

    /**
     * Set the value of sup
     *
     * @return  self
     */ 
    public function setSup($sup)
    {
        $this->sup = $sup;

        return $this;
    }

    /**
     * Get the value of noserv
     */ 
    public function getNoserv()
    {
        return $this->noserv;
    }

    /**
     * Set the value of noserv
     *
     * @return  self
     */ 
    public function setNoserv($noserv)
    {
        $this->noserv = $noserv;

        return $this;
    }

    /**
     * Get the value of noproj
     */ 
    public function getNoproj()
    {
        return $this->noproj;
    }

    /**
     * Set the value of noproj
     *
     * @return  self
     */ 
    public function setNoproj($noproj)
    {
        $this->noproj = $noproj;

        return $this;
    }
}

