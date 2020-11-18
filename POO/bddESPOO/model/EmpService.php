<?php 
include_once("EmployeMysqliDAO.php");
include_once("InterfaceDAO.php");

class EmpService implements InterfaceDAO
{
    private $employeDAO;

    public function __construct(){
        $this->employeDAO = new EmployeMysqliDAO;
    }
    
    public function add(object $employe)
    {   
        EmployeMysqliDAO::add($employe); 
    }

    public function modifier(object $employe)
    {
  
        EmployeMysqliDAO::modifier($employe); 
    }

    public function supprimer(object $employe)
    {
        EmployeMysqliDAO::supprimer($employe);
    }

    public function research()
    {
        $tabResearch = EmployeMysqliDAO::research();
        return $tabResearch;
    }

    public function researchOneById(object $employe)
    {
        $objectResearch = EmployeMysqliDAO::researchOneById($employe);
        return $objectResearch;
    }

    public function supOne()
    {
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