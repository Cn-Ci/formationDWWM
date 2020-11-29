<?php 
include_once ("EmpInterface.php");
include_once ("ServInterface.php");

interface InterfaceDAO 
{
function add(object $object);
function modifier(object $object);
function supprimer(object $object);
function research();
function researchOneById(object $object);

}