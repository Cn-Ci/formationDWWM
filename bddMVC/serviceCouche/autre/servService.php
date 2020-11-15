<?php 
include_once("../Service/ServiceMysqliDAO.php");

Class servService {
    public static function add(Service $service)
    {   
        return ServiceMysqliDAO::add($service);
    }

    public static function modifier(Service $service)
    {
        return ServiceMysqliDAO::modifier($service, $noserv); 
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

    public static function researchOne()
    {
        $dataV = ServiceMysqliDAO::researchOne();
        return $dataV;
    }

    public static function supOne()
    {
        $dataSOS = ServiceMysqliDAO::supOne();
        return $dataSOS;
    }

}