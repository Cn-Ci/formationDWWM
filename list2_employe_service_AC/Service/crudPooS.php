<?php

function add(Service $service)
{
    $noserv = $service->getNoserv();
    $mom = $service->getService();
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
    $stmt->bind_param("iss", $noserv, $mom, $ville);
    $stmt->execute();
    
  
    $db->close(); 
}

function modifier($service)
{
    $noserv = $service->getNoserv();
    $mom = $service->getService();
    $ville = $service->getVille();

    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "UPDATE `service` SET service =?, ville=? WHERE noserv = ?";
    $stmt = $db->prepare($query);
    if ($stmt === false) {
        printf("Message d'erreur : %s\n", $db->error);
       die();
    }
    $stmt->bind_param("ssi", $mom, $ville, $noserv);
    $stmt->execute();

    $db->close();   
}

function supprimer($service)
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

function searchAll(){
    global $data;
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
    $data = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close();
    return $data; 
}

function research()
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
    
    $db->close(); 
}

function supoupas() {
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

function voir($service)
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
    $dataV = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close();

    return $dataV;
}
?>