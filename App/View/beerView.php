<?php

    require_once ('./libs/Smarty.class.php');

    class beerView{

        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function showBeer($beers,$viewFile,$categories){
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