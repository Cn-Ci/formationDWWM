<?php 
include_once('Service.php');

class ServiceMysqliDAO {
    
    static function add(Service $service)
    {
        $noserv = $service->getNoserv();
        $serv = $service->getService();
        $ville = $service->getVille();

        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "INSERT INTO service values (?, ?, ?)";
        $stmt = $db->prepare($query);
        if ($stmt === false) {
            printf("Message d'erreur : %s\n", $db->error);
        die();
        }
        $stmt->bind_param("iss", $noserv, $serv, $ville);
        $stmt->execute();
        
        $db->close(); 
    }

    static function modifier(Service $service)
    {
        $noserv = $service->getNoserv();
        $serv = $service->getService();
        $ville = $service->getVille();

        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "UPDATE service SET service=?, ville=? WHERE noserv=?";
        $stmt = $db->prepare($query);
        if ($stmt === false) {
            printf("Message d'erreur : %s\n", $db->error);
        die();
        }
        $stmt->bind_param("ssi", $serv, $ville, $noserv);
        $stmt->execute();
        
        $db->close();      
    }

    static function supprimer(Service $service)
    {
        $noserv = $service->getNoserv();

        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "DELETE FROM service WHERE noserv = ?";
        $stmt = $db->prepare($query);
        if ($stmt === false) {
            printf("Message d'erreur : %s\n", $db->error);
        die();
        }
        $stmt->bind_param("i", $noserv);
        $stmt->execute();
        
        $db->close(); 
    }

    static function research()
    { 
        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "SELECT * from service ";
        $stmt = $db->prepare($query);
        if($db->connect_error)
        {
        die('Erreur : ' .$db->connect_error);
        }
        $stmt->execute();
        $rs = $stmt->get_result();
        $dataR = $rs->fetch_all(MYSQLI_ASSOC);

        $rs->free();
        $db->close(); 

        return $dataR;
    }

    static function researchOneByNoserv($service)
    {
        $noserv = $service->getNoserv();
    
        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "SELECT * FROM service WHERE noserv = ?";
        $stmt = $db->prepare($query);

        if ($stmt === false) {
            printf("Message d'erreur : %s\n", $db->error);
            die();
            }
        $stmt->bind_param('i', $noserv);
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
        $query = "SELECT DISTINCT noserv from employe" ;
        $stmt = $db->prepare($query);
    
        $stmt->execute();
        $rs = $stmt->get_result();
        $dataSOS = $rs->fetch_all(MYSQLI_ASSOC);

        $rs->free();
        $db->close(); 

        return $dataSOS;
    }
}
?>