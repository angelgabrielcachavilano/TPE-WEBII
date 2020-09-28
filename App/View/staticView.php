<?php


require_once ('./libs/Smarty.class.php');



class staticView{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function viewHome(){
        $this->smarty->display( 'templates/public/index.tpl');
    }

}