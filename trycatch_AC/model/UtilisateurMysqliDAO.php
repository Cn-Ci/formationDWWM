<?php 
include_once('Utilisateur.php');
require_once('Connexion.php');
require_once('DAOException.php');

Class UtilisateurMysqliDAO {

    static function inserUtil($utilisateur) 
    {
        try {
            $username = $utilisateur->getUsername();
            $password = $utilisateur->getPassword();

            $connexion = new Connexion();
            $db = $connexion->connexion();

            $stmt = $db->prepare("INSERT INTO utilisateur values ( NULL, ?, ?, 'utilisateur')");
            $stmt->bind_param("ss", $username, $password); 
            $stmt->execute();

            $db->close();
        } 
        catch (mysqli_sql_exception $e) {
            throw new DAOException($e->getMessage(), $e->getCode());
        }
    } 

    function researchutilisateurMail($username) 
    {
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();

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
        catch (mysqli_sql_exception $e) {
            throw new DAOException($e->getMessage(), $e->getCode());
        }
    }
}