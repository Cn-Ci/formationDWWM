<?php 
include_once("../employe/EmployeMysqliDAO.php");

Class empService {
    public static function add(Employe $employe)
    {   
        EmployeMysqliDAO::add($employe);
    }

    public static function modifier(Employe $employe)
    {
        EmployeMysqliDAO::modifier($employe, $noemp); 
    }

    public static function supprimer(Employe $employe)
    {
        EmployeMysqliDAO::supprimer($servemployeice);
    }

    public static function research()
    {
        $dataR = EmployeMysqliDAO::research();
        foreach ($array as $key => $val){
            if (is_array($val)){
                $dataR->$key = array2Object($val);
            } else {
                $dataR->$key = $val;
            }
        }
        return $dataR;
    }

    public static function researchOneByNoserv($employe)
    {
        $dataV = EmployeMysqliDAO::researchOneByNoserv($employe);
        foreach ($array as $key => $val){
            if (is_array($val)){
                $dataV->$key = array2Object($val);
            } else {
                $dataV->$key = $val;
            }
        }
        return $dataV;
    }

    public static function supOne()
    {
        $dataSOS = EmployeMysqliDAO::supOne();
        foreach ($array as $key => $val){
            if (is_array($val)){
                $dataSOS->$key = array2Object($val);
            } else {
                $dataSOS->$key = $val;
            }
        }
        return $dataSOS;
    }

}