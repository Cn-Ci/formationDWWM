<?php 
include_once("EmployeMysqliDAO.php");

Class EmpService {
    public static function add(Employe $employe)
    {   
        EmployeMysqliDAO::add($employe);
    }

    public static function modifier(Employe $employe)
    {
        EmployeMysqliDAO::modifier($employe); 
    }

    public static function supprimer(Employe $employe)
    {
        EmployeMysqliDAO::supprimer($employe);
    }

    public static function research()
    {
        $dataR = EmployeMysqliDAO::research();
        return $dataR;
    }

    public static function researchOneByNoserv($employe)
    {
        $dataV = EmployeMysqliDAO::researchOneByNoserv($employe);
        return $dataV;
    }

    public static function supOne()
    {
        $dataSOS = EmployeMysqliDAO::supOne();
        return $dataSOS;
    }

}