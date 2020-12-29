<?php
require_once ("model.php");
class ModelAccueil extends Model
{

    public function getEntrees(){
        try{
            $sql = "SELECT * FROM taTable";
            $stmt= Model::$pdo->prepare($sql);

            $stmt->execute();
            $row = $stmt->fetchAll();

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

        return $row;
    }

}