<?php 
session_start();
include_once('../model/EmpService.php');
include_once('../presentation/empIndex.php');
include_once('../presentation/utilIndex.php'); 
include_once('../model/ServiceException.php');


/************************************** Ajouter */
if (isset($_GET["action"]) && (isset($_SESSION['username'])) )
{   
    if($_GET["action"]=="afficheEmp") 
    {
        try { 
            /************************************** Tout les services */
            $tabResearch = Empservice::research(); 

            /************************************** ne peux pas sup service */
            $tabSupOne = Empservice::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

            /************************************** compteur */
            $date = new DateTime(date('Y-m-d'));
            $compter = EmpService::compter($date->format('Y-m-d'));
            var_dump($employe);
            $filtre = EmpService::filtre($employe);
            
            html();
            empIndex($admin, $tabResearch, $tabSupOne, $compter, $errorCode=null, $filtre);  
        } 
        catch (ServiceException $se) {
            /************************************** Tout les services */
            $tabResearch = Empservice::research(); 

            /************************************** ne peux pas sup service */
            $tabSupOne = Empservice::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
            /************************************** compteur */
            $date = new DateTime(date('Y-m-d'));
            $compter = EmpService::compter($date->format('Y-m-d'));

            $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
            $dateEmbauche = new DateTime($embauche);
            $employe = new Employe;
            $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                    ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                    ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                    ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                    ->setEmbauche($dateEmbauche)
                    ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                    ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                    ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                    ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                    ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
            $filtre = EmpService::filtre($employe);

            html();
            empIndex($admin, $tabResearch, $tabSupOne,$se->getMessage(), $se->getCode(),$filtre);
        }
    }
    elseif($_GET["action"]=="add")
    {   
        try { 
            html();
            EmpFormAjout(); 
        } 
        catch (ServiceException $se) {
            html();
            EmpFormAjout(23007);
        } 
    }
        if ($_GET["action"]=="ajouterOK")
        {
            try { 
                $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
                $dateEmbauche = new DateTime($embauche);
                $employe = new Employe;
                $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                        ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                        ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                        ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                        ->setEmbauche($dateEmbauche)
                        ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                        ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                        ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                        ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                        ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
   
                EmpService::add($employe);  
                /************************************** Tout les services */
                $tabResearch = Empservice::research(); 
    
                /************************************** ne peux pas sup service */
                $tabSupOne = Empservice::supOne(); 
    
                /************************************** Profil */
                $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';
    
                /************************************** compteur */
                $date = new DateTime(date('Y-m-d'));
                $compter = EmpService::compter($date->format('Y-m-d'));
    
                $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
                $dateEmbauche = new DateTime($embauche);
                $employe = new Employe;
                $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                        ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                        ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                        ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                        ->setEmbauche($dateEmbauche)
                        ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                        ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                        ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                        ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                        ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
                $filtre = EmpService::filtre($employe);

                html();
                empIndex($admin, $tabResearch, $tabSupOne, $compter, $filtre);  

            } 
            catch (ServiceException $se) {
                html();
                EmpFormAjout($se->getCode(), $se->getMessage());
            }
        } 
        /************************************** Modifier */
        if($_GET["action"]=="modif" && isset($_GET['no_emp']) ) 
        {
            try {
                $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
                $dateEmbauche = new DateTime($embauche);
                $employe = new Employe;
                $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                        ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                        ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                        ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                        ->setEmbauche($dateEmbauche)
                        ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                        ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                        ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                        ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                        ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
                $objectResearch = EmpService::researchOneById($employe);   

                html();
                empFormModif($objectResearch);
                
            } 
            catch (ServiceException $se) {
                html();
                empFormModif($objectResearch, 23008);
            } 
        }
        if($_GET["action"]=="modifierOK") 
        {        
        try {
            $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
            $dateEmbauche = new DateTime($embauche);
            $employe = new Employe;
            $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                    ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                    ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                    ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                    ->setEmbauche($dateEmbauche)
                    ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                    ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                    ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                    ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                    ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));

            EmpService::modifier($employe); 
            /************************************** Tout les services */
            $tabResearch = Empservice::research(); 
    
            /************************************** ne peux pas sup service */
            $tabSupOne = Empservice::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

            /************************************** compteur */
            $date = new DateTime(date('Y-m-d'));
            $compter = EmpService::compter($date->format('Y-m-d'));

            $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
            $dateEmbauche = new DateTime($embauche);
            $employe = new Employe;
            $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                    ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                    ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                    ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                    ->setEmbauche($dateEmbauche)
                    ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                    ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                    ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                    ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                    ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
            $filtre = EmpService::filtre($employe);
            
            html();
            empIndex($admin, $tabResearch, $tabSupOne, $compter, $filtre, 24001);
        } 
        catch (ServiceException $se) {
                /************************************** Tout les services */
                $tabResearch = Empservice::research(); 
    
                /************************************** ne peux pas sup service */
                $tabSupOne = Empservice::supOne(); 
    
                /************************************** Profil */
                $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

                /************************************** compteur */
                $date = new DateTime(date('Y-m-d'));
                $compter = EmpService::compter($date->format('Y-m-d'));

                $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
                $dateEmbauche = new DateTime($embauche);
                $employe = new Employe;
                $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                        ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                        ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                        ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                        ->setEmbauche($dateEmbauche)
                        ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                        ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                        ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                        ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                        ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
                $filtre = EmpService::filtre($employe);
                
                html();
                empIndex($admin, $tabResearch, $tabSupOne, $filtre, 23004);
            } 
        }
        /************************************** Supprimer */
        elseif ($_GET['action']=="delete" && isset($_GET['no_emp']))
        {  
            try {
            $employe = new Employe;
            $employe->setNo_emp(htmlentities($_POST['no_emp']));

            EmpService::supprimer($employe); 
            /************************************** Tout les services */
            $tabResearch = Empservice::research(); 
    
            /************************************** ne peux pas sup service */
            $tabSupOne = Empservice::supOne(); 

            /************************************** Profil */
            $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

            /************************************** compteur */
            $date = new DateTime(date('Y-m-d'));
            $compter = EmpService::compter($date->format('Y-m-d'));

            $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
            $dateEmbauche = new DateTime($embauche);
            $employe = new Employe;
            $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                    ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                    ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                    ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                    ->setEmbauche($dateEmbauche)
                    ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                    ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                    ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                    ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                    ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
            $filtre = EmpService::filtre($employe);

            html();
            empIndex($admin, $tabResearch, $tabSupOne, $compter, $filtre, 24002); 

            } 
            catch (ServiceException $se) {
           
                /************************************** Tout les services */
                $tabResearch = Empservice::research(); 

                /************************************** ne peux pas sup service */
                $tabSupOne = Empservice::supOne(); 

                /************************************** Profil */
                $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

                /************************************** compteur */
                $date = new DateTime(date('Y-m-d'));
                $compter = EmpService::compter($date->format('Y-m-d'));

                $embauche = empty(htmlentities($_POST['embauche'])) ? NULL : htmlentities($_POST['embauche']);
                $dateEmbauche = new DateTime($embauche);
                $employe = new Employe;
                $employe->setNo_emp(empty(htmlentities($_POST['no_emp'])) ? NULL : htmlentities($_POST['no_emp']))
                        ->setNom(empty(htmlentities($_POST['nom'])) ? NULL : htmlentities($_POST['nom']))
                        ->setPrenom(empty(htmlentities($_POST['prenom'])) ? NULL : htmlentities($_POST['prenom']))
                        ->setEmploi(empty(htmlentities($_POST['emploi'])) ? NULL : htmlentities($_POST['emploi']))
                        ->setEmbauche($dateEmbauche)
                        ->setSal(htmlentities(empty($_POST['sal'])) ? NULL : htmlentities($_POST['sal']))
                        ->setComm(empty(htmlentities($_POST['comm'])) ? NULL : htmlentities($_POST['comm']))
                        ->setNoserv(empty(htmlentities($_POST['noserv'])) ? NULL : htmlentities($_POST['noserv']))
                        ->setSup(empty(htmlentities($_POST['sup'])) ? NULL : htmlentities($_POST['sup']))
                        ->setNoproj(empty(htmlentities($_POST['noproj'])) ? NULL : htmlentities($_POST['noproj']));
                $filtre = EmpService::filtre($employe);
        
                html();
                empIndex($admin, $tabResearch, $tabSupOne, $filtre, 23005);
            } 
        }
        elseif($_GET['action']== "voir" && isset($_GET['no_emp']) )   
        {  
            try { 
                /************************************** Profil */
                $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

                $employe = new Employe;
                $employe->setNo_emp(htmlentities($_GET['no_emp']));
                $objectResearch = Empservice::researchOneById($employe); 
                html(); 
                empDetail($admin, $objectResearch);
            } 
            catch (ServiceException $se) {
                /************************************** Profil */
                $admin = isset($_SESSION['profil']) && $_SESSION['profil'] == 'administrateur';

                $employe = new Employe;
                $employe->setNo_emp(htmlentities($_GET['no_emp']));
                $objectResearch = Empservice::researchOneById($employe); 
                html(); 
                empDetail($admin, $objectResearch, 23006);
            }
    }

}

