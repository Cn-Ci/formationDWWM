<?php 
include_once("EmployeMysqliDAO.php");
include_once("InterfaceDAO.php");
include_once("DAOException.php");
include_once('ServiceException.php');

class EmpService implements InterfaceDAO
{
    private $employeDAO;

    public function __construct(){
        $this->employeDAO = new EmployeMysqliDAO;
    }
    
    public function add(object $employe)
    {  
        try { 
            EmployeMysqliDAO::add($employe); 
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
    }

    public function modifier(object $employe)
    {
        try { 
            EmployeMysqliDAO::modifier($employe); 
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
    }

    public function supprimer(object $employe)
    {
        try { 
            EmployeMysqliDAO::supprimer($employe);
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
    }

    public function research()
    {
        try { 
            $tabResearch = EmployeMysqliDAO::research();
            return $tabResearch;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
    }

    public function researchOneById(object $employe)
    {
        try { 
            $objectResearch = EmployeMysqliDAO::researchOneById($employe);
            return $objectResearch;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
    }

    public function supOne()
    {
        try { 
            $tabSupOne = EmployeMysqliDAO::supOne();
            return $tabSupOne;
        } 
        catch (DAOException $de) {
            throw new ServiceException($de->getMessage(), $de->getCode());
        }
        $tabSupOne = EmployeMysqliDAO::supOne();
        return $tabSupOne;
    }

    public function getEmployeDAO()
    {
        return $this->employeDAO;
    }

    public function setEmployeDAO($employeDAO)
    {
        $this->employeDAO = $employeDAO;

        return $this;
    }
}