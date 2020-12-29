<?php 
include_once('Service.php');
include_once('InterfaceDAO.php');
include_once('ServInterface.php');

class ServiceMysqliDAO implements InterfaceDAO{
    
    function add(object $service)
    {
        $noserv = $service->getNoserv();
        $serv = $service->getService();
        $ville = $service->getVille();

        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

    function modifier(object $service)
    {
        $noserv = $service->getNoserv();
        $serv = $service->getService();
        $ville = $service->getVille();

        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

    function supprimer(object $service)
    {
        $noserv = $service->getNoserv();

        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

    function research()
    { 
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $tabResearch = array();
        foreach ($dataR as $value) { 
            
            $objectResearch = new Service();
            $objectResearch->setNoserv($value['noserv'])
                            ->setService($value['service'])
                            ->setVille($value['ville']);
 
            array_push($tabResearch, $objectResearch);
        }
        return $tabResearch;
    }

    function researchOneById(object $service)
    {
        $noserv = $service->getNoserv();
    
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $objectResearch = new Service();
        $objectResearch->setNoserv($dataV['noserv'])
                        ->setService($dataV['service'])
                        ->setVille($dataV['ville']);
    
        return $objectResearch;
    }

    function supOne() {
        $db = new mysqli('localhost', 'root', "root", 'afpa_test'); 
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

        $tabSupOne = array();
        $i=1;
        foreach ($dataSOS as $value) { 
            $objectResearch = new Service();
            $objectResearch->setNoserv($value['noserv']);
            $tabSupOne[$i]=$objectResearch->getNoserv();
            $i++;  
        }
        return $tabSupOne;

    }
}
?>