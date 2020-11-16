<?php 
include_once('Employe.php');

class EmployeMysqliDAO {

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
        $stmt = $db->prepare( "UPDATE employe SET nom=? , prenom=? , emploi=?, embauche=? , sal=?, comm=?, noserv=?, sup=?, noproj=? where no_emp = ?");

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
    static function researchOneByNoserv(Employe $employe)
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

    static function supOne() {
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


    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
}


