<?php 
include_once('Utilisateur.php');

Class UtilisateurMysqliDAO {

    static function inserUtil($utilisateur) {
        $username = $utilisateur->getUsername();
        $password = $utilisateur->getPassword();

        $db = new mysqli('localhost', 'root', "", 'afpa_test');    
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $stmt = $db->prepare("INSERT INTO utilisateur values ( NULL, ?, ?, 'utilisateur')");
        $stmt->bind_param("ss", $username, $password); 
        $stmt->execute();

        $db->close();
    } 

    function researchutilisateurMail($username) {
        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 

        if($db->connect_error){
            die('Erreur : ' .$db->connect_error);
        }
        $query = "SELECT * FROM utilisateur WHERE username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data= $rs->fetch_array(MYSQLI_ASSOC);

        $rs->free();
        $db->close(); 

        return $data;
    }
}