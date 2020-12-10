<?php 
include_once('Employe.php');
include_once('InterfaceDAO.php');
include_once('EmpInterface.php');
require_once('Connexion.php');
require_once('DAOException.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class EmployeMysqliDAO extends Connexion implements InterfaceDAO{

    function filtre(object $employe) 
    {
        try {
            $noemp = $employe->getNo_emp();
            $nom= $employe->getNom();
            $prenom= $employe->getPrenom();
            $emploi = $employe->getEmploi();
            $embauche = $employe->getEmbauche()->format('Y-m-d');
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noserv = $employe->getNoserv();
            $sup = $employe->getSup();
            $noproj = $employe->getNoproj();
            $connexion = new Connexion();
            $db = $connexion->connexion();
            var_dump($employe);
            
            if ($employe){
                $requete = "SELECT e.* from employe as e INNER JOIN service as s
                            ON e.noserv = s.noserv WHERE ";
                $i =0;
                foreach ($employe as $key => $value){
                    if($i > 0) {
                        $requete = $requete . "AND" ;
                    }
                    $requete = $requete . $key . "='%" . $value . "%' "; 
                    $i++;
                }
                $stmt = $db->prepare($requete);
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_all(MYSQLI_ASSOC);
            }
            else {
                $data = $this->research();
            }            
            $db->close();
            }
            catch (mysqli_sql_exception $e) {
                throw new DAOException($e->getMessage(), $e->getCode());
            }
    }

    public function add(object $employe)
    {
        try {
            $noemp = $employe->getNo_emp();
            $nom= $employe->getNom();
            $prenom= $employe->getPrenom();
            $emploi = $employe->getEmploi();
            $embauche = $employe->getEmbauche()->format('Y-m-d');
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noserv = $employe->getNoserv();
            $sup = $employe->getSup();
            $noproj = $employe->getNoproj();
            
            $connexion = new Connexion();
            $db = $connexion->connexion();

            $stmt = $db->prepare("INSERT INTO employe VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
           
            $stmt->bind_param('issssddiii', $noemp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj);
            $stmt->execute();
        }
        catch (mysqli_sql_exception $e) {
            throw new DAOException($e->getMessage(), $e->getCode()); 
        } 
        finally {
            $db->close(); 
        }
    }

    function modifier(object $employe) 
    {
        try {
            $noemp = $employe->getNo_emp();
            $nom= $employe->getNom();
            $prenom= $employe->getPrenom();
            $emploi = $employe->getEmploi();
            $embauche = $employe->getEmbauche()->format('Y-m-d');
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noserv = $employe->getNoserv();
            $sup = $employe->getSup();
            $noproj = $employe->getNoproj();
    
            $connexion = new Connexion();
            $db = $connexion->connexion();
            $stmt = $db->prepare( "UPDATE employe SET nom=? , prenom=? , emploi=?, embauche=? , sal=?, comm=?, noserv=?, sup=?, noproj=? where no_emp = ?");

            $stmt->bind_param('sssssddiii',$nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj, $noemp);
            $stmt->execute();
            
            $db->close(); 
        } 
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la modification de l'employé", 7011);
        }
    }
            
    function supprimer($employe)  
    {
        try {
            $noemp = $employe->getNo_emp();

            $connexion = new Connexion();
            $db = $connexion->connexion();
            $query = "DELETE FROM employe WHERE no_emp = ?";
            $stmt = $db->prepare($query);

            if ($stmt === false) {
                printf("Message d'erreur : %s\n", $db->error);
            die();
            }
            $stmt->bind_param('i', $noemp);
            $stmt->execute();
        
            $db->close(); 
        }
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la suppression de l'employé", 7012);
        }
    }

    function research() 
    {
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();
            $query = "SELECT * FROM employe";
            $stmt = $db->prepare($query);
        
            $stmt->execute();
            $rs = $stmt->get_result();
            $dataR = $rs->fetch_all(MYSQLI_ASSOC);

            $rs->free();
            $db->close(); 

            $tabResearch = array();
            foreach ($dataR as $value) { 
                $embauche = new DateTime($value['embauche']);
                
                $objectResearch = new Employe();
                $objectResearch->setNo_emp($value['no_emp'])
                                ->setNom($value['nom'])
                                ->setPrenom($value['prenom'])
                                ->setEmploi($value['emploi'])
                                ->setEmbauche($embauche)
                                ->setSal($value['sal'])
                                ->setComm($value['comm'])
                                ->setNoserv($value['noserv'])
                                ->setSup($value['sup'])
                                ->setNoproj($value['noproj']);
                array_push($tabResearch, $objectResearch);
            }
            return $tabResearch; 
            }
            catch (mysqli_sql_exception $e) {
                throw new DAOException("Erreur lors de lors de la recherche des employés", 7013);
            }
    }

    function researchOneById(object $employe)
    {
        try {
            $noemp = $employe->getNo_emp();
        
            $connexion = new Connexion();
            $db = $connexion->connexion();
            $query = "SELECT * FROM employe WHERE no_emp = ?";
            $stmt = $db->prepare($query);

            if ($stmt === false) {
                printf("Message d'erreur : %s\n", $db->error);
                die();
                }
            $stmt->bind_param('i', $noemp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $dataV = $rs->fetch_array(MYSQLI_ASSOC);

            $rs->free();
            $db->close();

            $embauche = new DateTime($dataV['embauche']);
            
            $objectResearch = new Employe();
            $objectResearch->setNo_emp($dataV['no_emp'])
                            ->setNom($dataV['nom'])
                            ->setPrenom($dataV['prenom'])
                            ->setEmploi($dataV['emploi'])
                            ->setEmbauche($embauche)
                            ->setSal($dataV['sal'])
                            ->setComm($dataV['comm'])
                            ->setNoserv($dataV['noserv'])
                            ->setSup($dataV['sup'])
                            ->setNoproj($dataV['noproj']);
        
            return $objectResearch;
        }
        catch (mysqli_sql_exception $e) {
            throw new DAOException("Erreur lors de la recherche de l'employé", 7013);
        }
    }

    function supOne() 
    {
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();
            $query = "SELECT DISTINCT sup from employe" ;
            $stmt = $db->prepare($query);
        
            $stmt->execute();
            $rs = $stmt->get_result();
            $dataSOS = $rs->fetch_all(MYSQLI_ASSOC);

            $rs->free();
            $db->close(); 

            $tabSupOne = array();
            $i=1;
            foreach ($dataSOS as $value) { 
                $objectResearch = new Employe();
                $objectResearch->setSup($value['sup']);
                $tabSupOne[$i]=$objectResearch->getSup();
                $i++;  
            }
            return $tabSupOne;
            }
            catch (mysqli_sql_exception $e) {
                throw new DAOException("Erreur lors de la selection des employés ayant un superieur", 7013);
            }
    }

    function compter($date){
        try {
            $connexion = new Connexion();
            $db = $connexion->connexion();
            $query = "SELECT COUNT(dateDebut) AS dateDebut FROM employe WHERE DATE_FORMAT(dateDebut, '%Y-%m-%d') = ? ";
            $stmt = $db->prepare($query);
        
            $stmt->bind_param("s", $date);
            $stmt->execute();

            $rs = $stmt->get_result();
            $compter = $rs->fetch_array(MYSQLI_ASSOC);

            return $compter;
        }
        catch (mysqli_sql_exception $e) {
            throw new DAOException($e->getMessage(), $e->getCode());
        }
        finally{
            $db->close();
        }
    }

    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }
}


