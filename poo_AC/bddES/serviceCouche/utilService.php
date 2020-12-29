<?php 
include_once('../Utilisateur/UtilisateurMysqliDAO.php');

Class UtilisateurService {

    static function inserUtil($username, $password) {
        return UtilisateurMysqliDAO::inserUtil($username, $passeword);
    } 

    function researchutilisateurMail($username) {
        UtilisateurMysqliDAO::researchutilisateurMail($username);
        return $data;
    }

    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
}