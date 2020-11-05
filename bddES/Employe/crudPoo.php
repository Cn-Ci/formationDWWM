<?php 


    function add($employe)
{
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "INSERT INTO employe values ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("issssiiiii", $no_emp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
   /*          $stmt->bind_param("issssiiiii",$employe->getNoemp($noemp),
            $employe->getNom($nom),
            $employe->getPrenom($prenom),
            $employe->getEmploi($emploi),
            $employe->getEmbauche($embauche),
            $employe->getSal($sal),
            $employe->getComm($comm),
            $employe->getSup($sup),
            $employe->getNoserv($noserv),
            $employe->getNoproj($Noproj)); */

    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}

function modifier($post) {
    $no_emp = $post['no_emp'];
    $nom= is_null($post['nom']) ? 'NULL' : $post['nom'];
    $prenom= is_null($post['prenom']) ? 'NULL' : $post['prenom'];
    $emploi = is_null($post['emploi']) ? 'NULL' : $post['emploi'];
    $embauche = is_null($post['embauche']) ? 'NULL' : $post['embauche'];
    $sal = is_null($post['sal']) ? 'NULL' : $post['sal'];
    $comm = is_null($post['comm']) ? 'NULL' : $post['comm'];
    $noserv = is_null($post['noserv']) ? 'NULL' : $post['noserv'];
    $sup = is_null($post['sup']) ? 'NULL' : $post['sup'];
    $noproj = is_null($post['noproj']) ? 'NULL' : $post['noproj'];

    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }

    $query = "UPDATE employe values ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("issssiiiii", $no_emp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}
        
function supprimer($no_emp) {
    $no_emp = $post['no_emp'];
  
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }

    $query = "Delete employe values no_emp = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $no_emp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}

function research() {
    
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "SELECT * FROM employe";
    $stmt = $db->prepare($query);
   
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
    
}

function supoupas() {
    $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
    if($db->connect_error)
    {
        die('Erreur : ' .$db->connect_error);
    }
    $query = "SELECT * FROM employe where no_emp = ? IN (SELECT DISTINCT sup from employe)" ;
    $stmt = $db->prepare($query);
  
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close(); 

    return $data;
}

function showButton($url1, $url2, $nameButton1, $nameButton2) {
    echo "
        <br>
            <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
            <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
        <br>";
}

?>