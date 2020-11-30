<?php
require_once('ConnexionException.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Connexion extends ConnexionException{

    public function connexion(){
        try{
            $db = new mysqli('localhost', 'root', "", 'afpa_test'); 
            return $db;
        } catch(ConnexionException $e) {
            throw new ConnexionException("Erreur lors de la connexion à la base de données",7001);
        }
    }
}

