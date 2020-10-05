<?php

require_once ('./libs/Smarty.class.php');

class staticView{

    private $smarty;

    function __construct(){
        // $this->smarty->assign('BASE_URL','//'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
        $this->smarty = new Smarty();
    }

    function viewHome(){
        $this->smarty->display( 'templates/public/index.tpl');
    }
    function viewContacto(){
        $this->smarty->display( 'templates/public/contacto.tpl');
    }
}