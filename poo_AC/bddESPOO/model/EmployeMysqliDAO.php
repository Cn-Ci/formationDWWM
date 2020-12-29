<?php 
include_once('Employe.php');
include_once('InterfaceDAO.php');
include_once('EmpInterface.php');

class EmployeMysqliDAO implements InterfaceDAO{

    public function add(object $employe)
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
        
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $stmt = $db->prepare("INSERT INTO employe VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    

        $stmt->bind_param('issssddiii', $noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
        if ($stmt->execute())
        {
            echo "<script>alert('employe ajouter')</script>";
        }
        else 
            echo "<script>alert('non ajouter')</script>";
        $db->close(); 
        
    }

    function modifier(object $employe) 
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
 
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $stmt = $db->prepare( "UPDATE employe SET nom=? , prenom=? , emploi=?, embauche=? , sal=?, comm=?, noserv=?, sup=?, noproj=? where no_emp = ?");

        $stmt->bind_param('sssssddiii',$nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj, $noemp);
        $stmt->execute();
        
        $db->close(); 
    }
            
    function supprimer($employe)  
    {
        $noemp = $employe->getNo_emp();

        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

    function research() {
        
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $tabResearch = array();
        foreach ($dataR as $value) { 
            $embauche = new DateTime($value['embauche']);
            
            $objectResearch = new Employe();
            $objectResearch->setNo_emp($value['no_emp'])
                            ->setNom($value['nom'])
                            ->setPrenom($value['prenom'])
                            ->setEmploi($value['emploi'])
                            ->setEmbauche($embauche)
                            ->setSal($value['sal'])
                            ->setComm($value['comm'])
                            ->setNoserv($value['noserv'])
                            ->setSup($value['sup'])
                            ->setNoproj($value['noproj']);
            array_push($tabResearch, $objectResearch);
        }
        return $tabResearch; 
    }

    function researchOneById(object $employe)
    {
        $noemp = $employe->getNo_emp();
    
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $embauche = new DateTime($dataV['embauche']);
        
        $objectResearch = new Employe();
        $objectResearch->setNo_emp($dataV['no_emp'])
                        ->setNom($dataV['nom'])
                        ->setPrenom($dataV['prenom'])
                        ->setEmploi($dataV['emploi'])
                        ->setEmbauche($embauche)
                        ->setSal($dataV['sal'])
                        ->setComm($dataV['comm'])
                        ->setNoserv($dataV['noserv'])
                        ->setSup($dataV['sup'])
                        ->setNoproj($dataV['noproj']);
    
        return $objectResearch;
    }

    function supOne() {
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $tabSupOne = array();
        $i=1;
        foreach ($dataSOS as $value) { 
            $objectResearch = new Employe();
            $objectResearch->setSup($value['sup']);
            $tabSupOne[$i]=$objectResearch->getSup();
            $i++;  
        }
        return $tabSupOne;
    }


    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
}


