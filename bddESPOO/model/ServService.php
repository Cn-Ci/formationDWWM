<?php 
include_once("../model/ServiceMysqliDAO.php");

Class ServService {
    public static function add(Service $service)
    {   
        ServiceMysqliDAO::add($service);
    }

    public static function modifier(Service $service)
    {
        ServiceMysqliDAO::modifier($service); 
    }

    public static function supprimer(Service $service)
    {
        ServiceMysqliDAO::supprimer($service);
    }

    public static function research()
    {
        $dataR = ServiceMysqliDAO::research();
        return $dataR;
    }

    public static function researchOneByNoserv($service)
    {
        $dataV = ServiceMysqliDAO::researchOneByNoserv($service);
        return $dataV;
    }

    public static function supOne()
    {
        $dataSOS = ServiceMysqliDAO::supOne();
        return $dataSOS;
    }

}