<?php
class Conf {
   
    static private $databases = array(
        // ip serveur
        'hostname' => '127.0.0.1',
        // Nom de la base de donnée
        'database' => 'nom',
        // Identifiant
        'login' => 'login',
        // Mot de passe
        'password' => 'mdp'
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