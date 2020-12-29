<?php 
include_once('../presentation/empIndex.php');
include_once('../model/EmpService.php');

$search = EmpService::research();
$prenom = $_GET['prenom'];
function filtrePrenom(array $search, string $prenom) : array {
    $employeRet = [];
    //$prenom = '/' . $prenom . '/';
    if( strpos($prenom, $employe->getPrenom())){
    } 
    foreach ($search as $emp) {
        if($prenom == $emp->getPrenom()){
        }
        return $employeRet;
    }
}

$employeRet = filtrePrenom($search, $_GET['prenom']);
var_dump($prenom);
echo json_encode($search);


