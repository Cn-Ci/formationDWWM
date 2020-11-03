<?php 
include 'connect.php';


function add($no_emp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj) {
    $bnom = $nom ? $nom : 'NULL';
    $cprenom = $prenom ? $prenom : 'NULL';
    $demploi = $emploi ? $emploi : 'NULL';
    $eembauche = $embauche ? $embauche : 'NULL';
    $fsal = $sal ? $sal : 'NULL';
    $gcomm = $comm ? $comm : 'NULL';
    $hnoserv = $noserv ? $noserv : 'NULL';
    $isup = $sup ? $sup : 'NULL';
    $jnoproj = $noproj ? $noproj : 'NULL';

    $db = connection();

    $sql = "insert into employe values($no_emp, $bnom, $cprenom, $demploi, $eembauche, $fsal, $gcomm, $hnoserv, $isup, $jnoproj)";

    if (mysqli_query($db, $sql)) {
        header('location: ./bdd1fonc.php?action=ajoutOk');
    }else {
        printf("Message d'erreur : %s\n", $db->error);
    }

    $tab= mysqli_query($db, $sql);
    return $tab; 
}

function modifier($no_emp, $nom, $prenom, $emploi, $embauche, $sal, $comm, $noserv, $sup, $noproj) {
    $bnom = $nom ? $nom : 'NULL';
    $cprenom = $prenom ? $prenom : 'NULL';
    $demploi = $emploi ? $emploi : 'NULL';
    $eembauche = $embauche ? $embauche : 'NULL';
    $fsal = $sal ? $sal : 'NULL';
    $gcomm = $comm ? $comm : 'NULL';
    $hnoserv = $noserv ? $noserv : 'NULL';
    $isup = $sup ? $sup : 'NULL';
    $jnoproj = $noproj ? $noproj : 'NULL';

    $db = connection();

    $sql = "update employe set nom=$bnom , prenom=$cprenom, emploi=$demploi, embauche=$eembauche , sal=$fsal, comm=$gcomm, noserv=$hnoserv, sup=$isup, noproj=$jnoproj where no_emp = $no_emp";

    if (mysqli_query($db, $sql)) {
        header('location: ./bdd1.php?action=modificationOk');
    }else {
        printf("Message d'erreur : %s\n", $db->error);
        }

    $tab= mysqli_query($db, $sql);
    return $tab; 

}
        
function supprimer($a) {
    $ano_emp =$a;

    $db = connection();   

    $sql = "delete from employe where no_emp= $ano_emp";

    if (mysqli_query($db, $sql)) {
        header('location: ./bdd1.php?action=suppressionOk');
    }else {
        printf("Message d'erreur : %s\n", $db->error);
    }

    $tab= mysqli_query($db, $sql);
    return $tab;
}

function research() {
    
    $db = connection();
   
    $sql = "SELECT * FROM employe";
    $rs = mysqli_query($db, $sql);
    $selectDatas = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $selectDatas;
}

function supoupas() {
    $db = connection();
   
    $sql = "SELECT no_emp FROM employe where no_emp in (select distinct sup from employe)";
    $rs = mysqli_query($db, $sql);
    $supr = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    
    return $supr;


}

?>