<?php 
include_once('Employe.php');

class EmployeMysqliDAO {
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

public static function add(Employe $employe)
{
    $noemp = $employe->getNo_emp();
    $nom= $employe->getNom();
    $prenom= $employe->getPrenom();
    $emploi = $employe->getEmploi();
    $embauche = $employe->getEmbauche()->format('Y-m-d');
    $sal = $employe->getSal();
    $comm = $employe->getComm();
    $noserv = $employe->getNoserv();
    $sup = $employe->getSup();
    $noproj = $employe->getNoproj();
    
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "INSERT INTO employe VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
    $stmt = $db->prepare($query);

    if ($stmt === false) {
        printf("Message d'erreur : %s\n", $db->error);
       die();
    }
    $stmt->bind_param('issssddiii', $noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
    $stmt->execute();
   
    $db->close(); 
}

static function modifier(Employe $employe) 
{
    $noemp = $employe->getNo_emp();
    $nom= $employe->getNom();
    $prenom= $employe->getPrenom();
    $emploi = $employe->getEmploi();
    $embauche = $employe->getEmbauche()->format('Y-m-d');
    $sal = $employe->getSal();
    $comm = $employe->getComm();
    $noserv = $employe->getNoserv();
    $sup = $employe->getSup();
    $noproj = $employe->getNoproj();

    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "UPDATE employe SET nom=? , prenom=? , emploi=?, embauche=? , sal=?, comm=?, noserv=?, sup=?, noproj=? where no_emp = ?";

    $stmt = $db->prepare($query);

    if ($stmt === false) {
        printf("Message d'erreur : %s\n", $db->error);
       die();
       }
    $stmt->bind_param('sssssddiii',$nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj, $noemp);
    $stmt->execute();
    
    $db->close(); 
}
        
static function supprimer($employe)  
{
    $noemp = $employe->getNo_emp();

    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "DELETE FROM employe WHERE no_emp = ?";
    $stmt = $db->prepare($query);

    if ($stmt === false) {
        printf("Message d'erreur : %s\n", $db->error);
       die();
       }
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
  
    $db->close(); 
}

static function research() {
    
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "SELECT * FROM employe";
    $stmt = $db->prepare($query);
   
    $stmt->execute();
    $rs = $stmt->get_result();
    $dataR = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $dataR;
    
}

static function supoupas() {
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "SELECT DISTINCT sup from employe" ;
    $stmt = $db->prepare($query);
  
    $stmt->execute();
    $rs = $stmt->get_result();
    $dataSOS = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $dataSOS;
}

static function researchOne(Employe $employe)
{
    $noemp = $employe->getNo_emp();
   
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "SELECT * FROM employe WHERE no_emp = ?";
    $stmt = $db->prepare($query);

    if ($stmt === false) {
        printf("Message d'erreur : %s\n", $db->error);
        die();
        }
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $dataV = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close();

    return $dataV;
}

function showButton($url1, $url2, $nameButton1, $nameButton2) {
    echo "
        <br>
            <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
            <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
        <br>";
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
}


