<?php

require_once './App/Model/categoryModel.php';
require_once './App/View/categoryView.php';

class categoryController{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new categoryModel();
        $this->view = new categoryView();
    }

    function showCategories(){
        $categories = $this->model->getAll();
        $viewFile = 'templates/public/categories.tpl';
        $this->view->showCategories($categories,$viewFile);

    }

    function showCategoryById($params = null){
        $id_category = $params[':ID'];
       
        $category = $this->model->getById($id_category);
        $this->view->showCategory($category);
    }
}