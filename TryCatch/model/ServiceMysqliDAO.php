<?php 
include_once('Service.php');
include_once('InterfaceDAO.php');
include_once('ServInterface.php');
require_once('Connexion.php');
require_once('DAOException.php');

class ServiceMysqliDAO implements InterfaceDAO{
    
    function add(object $service)
    {
        try {
            $noserv = $service->getNoserv();
            $serv = $service->getService();
            $ville = $service->getVille();

            $connexion = new Connexion();
            $db = $connexion->connexion();
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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Ce service existe déjà", 7110);
        }
    }

    function modifier(object $service)
    {
        try {
            $noserv = $service->getNoserv();
            $serv = $service->getService();
            $ville = $service->getVille();

            $connexion = new Connexion();
            $db = $connexion->connexion();
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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la modification du service", 7011);
        }     
    }

    function supprimer(object $service)
    {
        try {
            $noserv = $service->getNoserv();

            $connexion = new Connexion();
            $db = $connexion->connexion();
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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la suppression du service", 7011);
        }
    }

    function research()
    { 
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();

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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la recherche des services", 7011);
        }
    }

    function researchOneById(object $service)
    {
        try {
            $noserv = $service->getNoserv();
        
            $connexion = new Connexion();
            $db = $connexion->connexion();

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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la recherche du service", 7011);
        }
    }

    function supOne() 
    {
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();

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
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la selection des services qui ont des employés", 7011);
        }
    }
}
?>