<?php 
include_once("../model/ServiceMysqliDAO.php");

Class ServService {

    public function add(Service $service)
    {   
        ServiceMysqliDAO::add($service);
    }

    public function modifier(Service $service)
    {
        ServiceMysqliDAO::modifier($service); 
    }

    public function supprimer(Service $service)
    {
        ServiceMysqliDAO::supprimer($service);
    }

    public function research()
    {
        $dataR = ServiceMysqliDAO::research();
        return $dataR;
    }

    public function researchOneById($service)
    {
        $dataV = ServiceMysqliDAO::researchOneById($service);
        return $dataV;
    }

    public function supOne()
    {
        $dataSOS = ServiceMysqliDAO::supOne();
        return $dataSOS;
    }

}