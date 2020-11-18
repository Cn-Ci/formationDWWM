<?php 
include_once("./model/empMysqliDAO.php");

Class empService {
    public static function add(emp $employe)
    {   
        return empMysqliDAO::add($employe);
    }

    public static function modifier(emp $employe)
    {
        return empMysqliDAO::modifier($employe, $noemp); 
    }

    public static function supprimer(Service $employe)
    {
        empMysqliDAO::supprimer($servemployeice);
    }

    public static function research()
    {
        $dataR = empMysqliDAO::research();
        return $dataR;
    }

    public static function researchOneByNoserv($employe)
    {
        $dataV = empMysqliDAO::researchOneByNoserv($employe);
        return $dataV;
    }

    public static function supOne()
    {
        $dataSOS = empMysqliDAO::supOne();
        return $dataSOS;
    }

}