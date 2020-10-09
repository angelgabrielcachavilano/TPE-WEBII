<?php

require_once './App/Model/beerModel.php';
require_once './App/Model/categoryModel.php';

require_once './App/View/beerView.php';
require_once './libs/helpers/authHelper.php';
class beerController{

    private $model;
    private $view;
    private $helper;
    private $categoryModel;
    function __construct()
    {
    
      
        $this->helper = new authHelper;
        // $this->helper->checkLoggedIn();
        $this->categoryModel = new categoryModel();
        $this->model = new beerModel();
        $this->view = new beerView();
    }

    function showBeer(){
       
        $beers = $this->model->getAll();
        // Va a cambiar con el login
        if(ISADMIN){
            
            $viewFile ='templates/admin/beers/beers.tpl';
        }else{
            $viewFile ='templates/public/beers.tpl';
        }
       
        $categories = $this->categoryModel->getAll();
        $this->view->showBeer($beers,$viewFile,$categories);
    }

    function showBeerByCategories(){
        $id_category = $_POST['categorias'];
        $beers = $this->model->getBeerByCategories($id_category);
        $categories = $this->categoryModel->getAll();
        $viewFile ='templates/public/beers.tpl';
        $this->view->showBeer($beers,$viewFile,$categories);

    }

    function shoeEditBeer($params = null){
        $id_beer = $params[':ID'];
        if (isset($id_beer) === true) {
         $this->view->showEditBeer($this->model->getBeerByID($id_beer), $this->categoryModel->getAll());  
        }
    }

    function editBeer($params = null){
       
        $id_beer = $params[':ID'];
            // nombre, descripcion, imagen, precio, ibu, alcohol, id_categoria
            if (isset($_POST['nombre']) === true) {
                $fileLocation = 'images/default.jpg';
                // Chequeamos que la imagen enviada no este vacia
                if (strlen($_FILES['imagen']['tmp_name']) > 0) {
                    var_dump($_FILES['imagen']);
                    // Chequeamos el tamaño de la imagen para ver que sea valida 
                    $check = getimagesize($_FILES['imagen']['tmp_name']);
                    if($check !== false) {
                        // Armamos la ruta y la movemos
                        $fileLocation = 'images/' . basename($_FILES['imagen']["name"]);
                        move_uploaded_file($_FILES['imagen']['tmp_name'], $fileLocation);
                    }
                }
                
                // Insertamos una nueva cerveza
                $this->model->updateBeer(
                    
                    $id_beer,
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $fileLocation,
                    $_POST['precio'],
                    $_POST['ibu'],
                    $_POST['alcohol'],
                    $_POST['categoria'],
                );
                header('Location: '.BASE_URL.'showBeer');
           
            }
    }
    function showAddBeer(){
        $categories = $this->categoryModel->getAll();

        $this->view->showAddBeer($categories);

    }
    function addBeer(){
        if (isset($_POST['nombre']) === true) {
            if($_POST['nombre'] != '' && $_POST['descripcion'] != '' && $_POST['precio'] != '' && $_POST['ibu'] != '' && $_POST['alcohol'] != '' && $_POST['categoria'] != ''){

           
            if ($_FILES['imagen']) {
                if(!empty (($_FILES['imagen']['tmp_name']===false))){  
                      $check = getimagesize($_FILES['imagen']['tmp_name']);
                     }
                if($check !== false) {
                    $fileLocation = 'images/' . basename($_FILES['imagen']["name"]);

                    move_uploaded_file($_FILES['imagen']['tmp_name'], $fileLocation);

                    // Insertamos una nueva cerveza
                    $this->model->addBeer(
                        $_POST['nombre'],
                        $_POST['descripcion'],
                        $fileLocation,
                        $_POST['precio'],
                        $_POST['ibu'],
                        $_POST['alcohol'],
                        $_POST['categoria']);
                } else {
                    // imagen invalida
                }
            } else {
                // sin imagen
            }
            header('Location: '.BASE_URL.'showBeer');
        } else {
             // Mostramos Form para crear cerveza
             $this->view->showAddBeer($this->categoryModel->getAll());
        } 
    }
    }
    public function deleteBeer($params = null) {
        $id_beer = $params[':ID'];
        if (isset($id_beer) === true) {
            $this->model->deleteBeer($id_beer);
        }
        header('Location: '.BASE_URL.'showBeer');
    }
}