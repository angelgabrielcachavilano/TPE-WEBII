<?php

require_once ('./libs/Smarty.class.php');

class beerView{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showBeer($beers,$viewFile){
        $this->smarty->assign('beers',$beers);
        $this->smarty->display($viewFile);
    }
}