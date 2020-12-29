<?php
class Conf {
    
    static private $databases = array(
        // ip serveur
        'hostname' => 'localhost',
        // Nom de la base de donnée
        'database' => 'afpa_test',
        // Identifiant
        'login' => 'root',
        // Mot de passe
        'password' => 'root'
    );

    static public function getHostname() {
        return self::$databases['hostname'];
    }
    static public function getDatabase() {
        return self::$databases['database'];
    }
    static public function getLogin() {
        return self::$databases['login'];
    }
    static public function getPassword() {
        return self::$databases['password'];
    }
}