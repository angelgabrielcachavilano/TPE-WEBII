<?php

require_once './App/Model/beerModel.php';
require_once './App/View/beerView.php';

class beerController{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new beerModel();
        $this->view = new beerView();
    }

    function showBeer(){
        $beers = $this->model->getAll();
        // Va a cambiar con el login
        $viewFile ='templates/public/beers.tpl';
        $this->view->showBeer($beers,$viewFile);
    }

    function showBeerByCategories(){
        $id_category = $_POST['categorias'];
        $beers = $this->model->getBeerByCategories($id_category);
        $viewFile ='templates/public/beers.tpl';
        $this->view->showBeer($beers,$viewFile);

    }




}