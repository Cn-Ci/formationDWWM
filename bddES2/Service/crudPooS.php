<?php

    function searchAll(){
        global $data;
        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }

        $query = "SELECT * from employe ";
        $stmt = $db->prepare($query);
        $stmt->bind_param();
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);

        $rs->free();
        $db->close(); 
    }

function add($post)
{
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "INSERT INTO employe values ?, ?, ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iss", $noserv, $service, $ville );
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}

    function sup($post)
{
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "DELETE FROM `service` WHERE noserv = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $noserv);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}

    function modif(){
        //* TRAITEMENT MODIFICATION
        if (isset($_POST['noserv']) && isset($_POST['service']) && isset($_POST['ville']))
        {
            $noserv  = $_POST['noserv'];
            $service = $_POST['service'];
            $ville   = $_POST['ville'];

            $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
            if($db->connect_error)
            {
                die('Erreur : ' .$db->connect_error);
            }
            $query = "UPDATE `service` SET noserv=?, service =?, ville=? WHERE noserv = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("isss", $noserv, $service, $ville, $noserv);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
        
            $rs->free();
            $db->close(); 

            return $data;
        }
    }

    function supoupas() {
       
        include 'ConnectBdd.php';

        $sql = "SELECT s.noserv FROM service as s inner join employe as e
                on s.noserv = e.noserv
               ";
        $rs = mysqli_query($dbServ, $sql);
        $supr = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        
        return $supr;

        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $query = "SELECT s.noserv FROM service as s inner join employe as e
        on s.noserv = e.noserv
        where e.noserv in (select distinct e.noserv from employe as e);


        $stmt = $db->prepare($query);
        $stmt->bind_param("isss", $noserv, $service, $ville, $noserv);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
    
        $rs->free();
        $db->close(); 

        return $data;
    }
?>