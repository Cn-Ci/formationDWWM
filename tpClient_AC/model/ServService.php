<?php 
include_once("../model/ServiceMysqliDAO.php");
include_once("DAOException.php");
include_once('ServiceException.php');

Class ServService {

    public function add(Service $service)
    {   
        try { 
            ServiceMysqliDAO::add($service);
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    public function modifier(Service $service)
    {
        try { 
            ServiceMysqliDAO::modifier($service);
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    public function supprimer(Service $service)
    {
        try { 
            ServiceMysqliDAO::supprimer($service);
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    public function research()
    {
        try { 
            $dataR = ServiceMysqliDAO::research();
        return $dataR;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    public function researchOneById($service)
    {
        try { 
            $dataV = ServiceMysqliDAO::researchOneById($service);
            return $dataV;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

    public function supOne()
    {
        try { 
            $dataSOS = ServiceMysqliDAO::supOne();
            return $dataSOS;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }  
    }

}