<?php
include_once('./model/empService.php');

class controllerEmpForm{

    public static function empFormAj($params){
        $emp = new empService;
        $addForm = $emp::add($employe);

        $page = "pages";
        $view = 'empformAj';
        require_once ('../view/view.php');
    }

    public static function empformModif(){
        $page = "pages";
        $view = 'empformModif';
        require_once ('view/view.php');
    }

    public static function empIndex(){
        $page = "pages";
        $view = 'empIndex';
        require_once ('view/view.php');
    }

    public static function empDetail(){
        $page = "pages";
        $view = 'empDetail';
        require_once ('view/view.php');
    }
}
