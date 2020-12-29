<?php
    function searchAll(){
        global $data;
        include 'ConnectBdd.php';
        $requestSelectServ = mysqli_query($dbServ, 'SELECT * FROM service');
        $data = mysqli_fetch_all($requestSelectServ, MYSQLI_ASSOC); 
    }

    function add($noserv,$service,$ville){
        //* TRAITEMENT AJOUT
        if (isset($noserv) && isset($service) && isset($ville))
        {      
            include 'ConnectBdd.php';

            //*REQUETE SQL ADD
            $AddRequest = "INSERT INTO `service` (`noserv`, `service`, `ville`) VALUES ('$noserv', '$service', '$ville')";

            //*VERIF REQUETE SQL
            if(mysqli_query($dbServ, $AddRequest)){
                ?><script>alert("Add ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de l'ajout en base de données");</script><?php
            }
        } 
    }

    function del($noserv){
        //* TRAITEMENT SUPRESSION
        if (!empty($noserv)) {
            
            include 'ConnectBdd.php';

            //*REQUETE SQL DEL
            $DeleteRequest = "DELETE FROM `service` WHERE noserv = $noserv";

            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $DeleteRequest)) {
                ?><script>alert("Delete ok");</script><?php
            }else{
                ?><script>alert("Erreur lors de la suppression");</script><?php
            }
        }else {echo "mort";}
    }

    function modif(){
        //* TRAITEMENT MODIFICATION
        if (isset($_POST['noserv']) && isset($_POST['service']) && isset($_POST['ville']))
        {
            $noserv  = $_POST['noserv'];
            $service = $_POST['service'];
            $ville   = $_POST['ville'];

            include 'ConnectBdd.php';

            //*REQUETE SQL MODIFY
            $ModiFyRequest = "UPDATE `service` SET noserv='$noserv', service ='$service', ville='$ville' WHERE noserv = $noserv";

            //*VERIF REQUETE SQL
            if (mysqli_query($dbServ, $ModiFyRequest)) {
                ?><script>alert("Modif ok");</script><?php
            }else{
                ?><script>alert("Echec de la modif");</script><?php
            }
        }else{
            echo "Erreur Isset";
        }
    }

    function supoupas() {
       
        include 'ConnectBdd.php';

        $sql = "SELECT s.noserv FROM service as s inner join employe as e
                on s.noserv = e.noserv
                where e.noserv in (select distinct e.noserv from employe as e)";
        $rs = mysqli_query($dbServ, $sql);
        $supr = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        
        return $supr;
    }
?>