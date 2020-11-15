<?php 
// A faire : LOGIN, n'ajoute pas un nouvel employe, ne recupere pas et ne modifie pas

session_start();
include_once('../model/EmpService.php');
include_once('../presentation/empIndex.php');
include_once('../presentation/utilIndex.php'); 
/* $_SESSION['username'] = "abcd@abcd.fr";
$_SESSION['password'] = "abcd";
$_SESSION['profil'] = "administrateur"; */


/************************************** Ajouter */
if (isset($_GET["action"]) && (isset($_SESSION['username'])) )
{   
    if($_GET["action"]=="afficheEmp") 
    {
        /************************************** Tout les services */
        $dataR = Empservice::research(); 

        /************************************** ne peux pas sup service */
        $dataSOS = Empservice::supOne(); 

        /************************************** Profil */
        $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

        empIndex($admin, $dataR, $dataSOS);
    }
    elseif($_GET["action"]=="add")
    {    
        $embauche = empty($_POST['embauche']) ? NULL : $_POST['embauche'];
        $dateEmbauche = new DateTime($embauche);
        $employe = new Employe;
        $employe->setNo_emp(empty($_GET['no_emp']) ? NULL : $_GET['no_emp'])
                ->setNom(empty($_POST['nom']) ? NULL : $_POST['nom'])
                ->setPrenom(empty($_POST['prenom']) ? NULL : $_POST['prenom'])
                ->setEmploi(empty($_POST['emploi']) ? NULL : $_POST['emploi'])
                ->setEmbauche($dateEmbauche)
                ->setSal(empty($_POST['sal']) ? NULL : $_POST['sal'])
                ->setComm(empty($_POST['comm']) ? NULL : $_POST['comm'])
                ->setNoserv(empty($_POST['noserv']) ? NULL : $_POST['noserv'])
                ->setSup(empty($_POST['sup']) ? NULL : $_POST['sup'])
                ->setNoproj(empty($_POST['noproj']) ? NULL : $_POST['noproj']);

        EmpService::add($employe);
        empFormAjout();
    }
    /************************************** Modifier */
    elseif($_GET["action"]=="modif" && isset($_GET['no_emp']) ) 
    {
        $embauche = empty($_POST['modifembauche']) ? NULL : $_POST['modifembauche'];
        $dateEmbauche = new DateTime($embauche);
        $employe = new Employe;
        $employe->setNo_emp(empty($_POST['modifno_emp']) ? NULL : $_POST['modifno_emp'])
                ->setNom(empty($_POST['modifnom']) ? NULL : $_POST['modifnom'])
                ->setPrenom(empty($_POST['modifprenom']) ? NULL : $_POST['modifprenom'])
                ->setEmploi(empty($_POST['modifemploi']) ? NULL : $_POST['modifemploi'])
                ->setEmbauche($dateEmbauche)
                ->setSal(empty($_POST['modifsal']) ? NULL : $_POST['modifsal'])
                ->setComm(empty($_POST['modifcomm']) ? NULL : $_POST['modifcomm'])
                ->setNoserv(empty($_POST['modifnoserv']) ? NULL : $_POST['modifnoserv'])
                ->setSup(empty($_POST['modifsup']) ? NULL : $_POST['modifsup'])
                ->setNoproj(empty($_POST['modifnoproj']) ? NULL : $_POST['modifnoproj']);

        
        $dataV = EmpService::researchOneByNoserv($employe);   

        EmpService::modifier($employe); 
        empFormModif($dataV);

        if(isset($_POST["modifer"]) &&
        isset($_POST['username']) )
        {
            /************************************** Tout les services */
            $dataR = Empservice::research(); 

            /************************************** ne peux pas sup service */
            $dataSOS = Empservice::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

            empIndex($admin, $dataR, $dataSOS); 
        }
    }
    /************************************** Supprimer */
    elseif ($_GET['action']=="delete" && isset($_GET['no_emp']))
    {  
        $employe = new Employe;
        $employe->setNo_emp($_GET['no_emp']);

        EmpService::supprimer($employe); 
        /************************************** Tout les services */
        $dataR = Empservice::research(); 

        /************************************** ne peux pas sup service */
        $dataSOS = Empservice::supOne(); 

        /************************************** Profil */
        $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
 
        empIndex($admin, $dataR, $dataSOS); 
    }
    elseif($_GET['action']== "voir" && isset($_GET['no_emp']) )   
    {   
        /************************************** Profil */
        $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

        $employe = new Employe;
        $employe->setNo_emp($_GET['no_emp']);
        $dataSOS = Empservice::researchOneByNoserv($employe);  
        empDetail($admin, $dataSOS);
    }
}
