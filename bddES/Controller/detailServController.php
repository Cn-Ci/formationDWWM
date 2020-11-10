<?php
include_once('ServiceMysqliDAO.php');

if (isset($_GET['action']) && $_GET["action"]=="voir" && isset($_GET['noserv']))
{
    $service = new Service;
    $service->setNoserv($_GET['noserv']);

    $serviceTrouve = ServiceMysqliDAO::researchOne($service);
    $noserv = $serviceTrouve['noserv'];
    $serv = $serviceTrouve['service'];
    $ville = $serviceTrouve['ville'];     
}