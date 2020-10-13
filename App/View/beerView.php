<?php

require_once ('./libs/Smarty.class.php');

class beerView{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

<<<<<<< HEAD
    function showBeer($beers,$viewFile){
=======

    function showBeer($beers,$viewFile,$categories){
>>>>>>> 8a7196b86d0c1e4fee2dd03e6d939efdd86f7975
        $this->smarty->assign('beers',$beers);
        $this->smarty->assign('categories',$categories);
        $this->smarty->display($viewFile);
    }

     function showEditBeer($beer,$category){
        $this->smarty->assign('beer',$beer);
        $this->smarty->assign('categories',$category);
        $this->smarty->display('templates/admin/beers/editBeer.tpl');
    }
    function showAddBeer( $categories){
        $this->smarty->assign('categories',$categories);
        $this->smarty->display('templates/admin/beers/addBeer.tpl');

    }
}