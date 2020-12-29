<?php
include_once('./model/empService.php');

class controllerEmpIndex
{ 
    public static function empIndex(){
        $emp = new emp;
        $addemploye = $emp->add($employe);

        $page = "pages";
        $view = 'empIndex';
        require_once ('view/view.php');
    }
}