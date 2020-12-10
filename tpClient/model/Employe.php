<?php 

class Employe {
    private $dateDebut;
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

    // function __construct($dateDebut, $no_emp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $sup, $noserv, $noproj)
    // {
    //     $this->dateDebut = $dateDebut;
    //     $this->no_emp = $no_emp;
    //     $this->nom = $nom;
    //     $this->prenom = $prenom;
    //     $this->emploi = $emploi;
    //     $this->embauche = $embauche;
    //     $this->sal = $sal;
    //     $this->comm = $comm;
    //     $this->sup = $sup;
    //     $this->noserv = $noserv;
    //     $this->noproj = $noproj;
    // }

    public function getDateDebut(): DateTime
    {
        $newDateDebut =new DateTime($this->dateDebut);
        return $newDateDebut;
    }

    public function setDateDebut($dateDebut):self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNo_emp():?int
    {
        return $this->no_emp;
    }

    public function setNo_emp($no_emp):self
    {
        $this->no_emp = $no_emp;
        return $this;
    }

    public function getNom() :?string
    {
        return $this->nom;
    }
    
    public function setNom($nom) :self
    {
        $this->nom = $nom;
        return $this;
    }
 
    public function getPrenom():?string
    {
        return $this->prenom;
    }
    
    public function setPrenom($prenom):self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmploi():?string
    {
        return $this->emploi;
    }

    public function setEmploi($emploi):self
    {
        $this->emploi = $emploi;
        return $this;
    }

    public function getEmbauche():?DateTime
    {
        return $this->embauche;
    }

    public function setEmbauche(?DateTime $embauche):self
    {
        $this->embauche = $embauche;
        return $this;
    }

    public function getSal():?float
    {
        return $this->sal;
    }

    public function setSal($sal):self
    {
        $this->sal = $sal;
        return $this;
    }

    public function getComm():?float
    {
        return $this->comm;
    }

    public function setComm($comm):self
    {
        $this->comm = $comm;
        return $this;
    }

    public function getSup():?int
    {
        return $this->sup;
    }

    public function setSup($sup):self
    {
        $this->sup = $sup;
        return $this;
    }

    public function getNoserv():?int
    {
        return $this->noserv;
    }

    public function setNoserv($noserv):self
    {
        $this->noserv = $noserv;
        return $this;
    }

    public function getNoproj():?int
    {
        return $this->noproj;
    }

    public function setNoproj($noproj):self
    {
        $this->noproj = $noproj;
        return $this;
    }

    function toString(){
        return 
        "['dateDebut'] " . $this->dateDebut .
        "\n ['no_emp'] " . $this->no_emp .
        "\n ['nom'] " . $this->nom .
        "\n ['prenom'] " . $this->prenom .
        "\n ['emploi'] " . $this->emploi .
        "\n ['embauche'] " . $this->embauche .
        "\n ['sal'] " . $this->sal .
        "\n ['comm'] " . $this->comm .
        "\n ['sup'] " . $this->sup .
        "\n ['noserv'] " . $this->noserv .
        "\n ['noproj'] " . $this->noproj .
        "\n"
        ;
    }

    function jsonSerialize(){
        return [
        'dateDebut'  => $this->getDateDebut(),
        'no_emp'     => $this->getNo_emp(),
        'nom'        => $this->getNom(),
        'prenom'     => $this->getPrenom(),
        'emploi'     => $this->getEmploi(),
        'sal'     => $this->getSal(),
        'comm' => $this->getComm(),
        'sup'  => $this->getSup(),
        'noserv'  => $this->getNoserv(),
        'noproj'   => $this->getNoproj()
        ];
    }
}
