<?php

require_once './App/Model/beerModel.php';
require_once './App/Model/categoryModel.php';

require_once './App/View/beerView.php';
require_once './libs/helpers/authHelper.php';
class beerController{

    private $model;
    private $view;
    // private $helper;
    private $categoryModel;
    function __construct()
    {
        // $this->helper = new authHelper;
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
        $categories = array();
        
        
        foreach($beers as $beer){
            
            if ($this->fineDup($beer->id_categoria, $categories) === false){
                $categories[] = [ 'id_categoria' => $beer->id_categoria, 'nombre' => $beer->categoria_nombre ];
               };
               
            // for($i=0; $i<sizeof($categories);$i++){
            //     $repeated = false;
                
            //     if($categories[$i] === $beer->categoria_nombre){
            //         $i=sizeof($categories);
            //         $repeated = true;
            //     }
            // }
            // if($repeated === false){
            //     array_push( $categories,$beer->categoria_nombre);
            // }

           
          
        }
       
        $this->view->showBeer($beers,$categories,$viewFile);
    }

    function fineDup($id_category, $categories){
        //Esta funcion encuentra duplicados en las categorias de cerveza , por el INNER JOIN
        foreach ($categories as $category ) {
            if($category['id_categoria'] === $id_category){
                return true;
            }
        }
        return false;
    }

    function showBeerByCategories(){
        $id_category = $_POST['categorias'];
        if($id_category === 'all'){
            $beers = $this->model->getAll();
        }else if($id_category !== 'all'){
            $beers = $this->model->getBeerByCategories($id_category);

        }

        $categories = array();
        
        
        foreach($beers as $beer){
            
            if ($this->fineDup($beer->id_categoria, $categories) === false){
                $categories[] = [ 'id_categoria' => $beer->id_categoria, 'nombre' => $beer->categoria_nombre ];
               };
               
            // for($i=0; $i<sizeof($categories);$i++){
            //     $repeated = false;
                
            //     if($categories[$i] === $beer->categoria_nombre){
            //         $i=sizeof($categories);
            //         $repeated = true;
            //     }
            // }
            // if($repeated === false){
            //     array_push( $categories,$beer->categoria_nombre);
            // }

           
          
        }
        if(ISADMIN){
            $viewFile ='templates/admin/beers/beerFilter.tpl';

        }else{
            $viewFile ='templates/public/beers.tpl';
        }
        $this->view->showBeer($beers,$categories,$viewFile);

    }
    function showEditBeer($params = null){
        $id_beer = $params[':ID'];
        if(ISADMIN){

          if (isset($id_beer) === true) {
           $this->view->showEditBeer($this->model->getBeerByID($id_beer), $this->categoryModel->getAll());  
             }
         }else{
        header('Location: '.BASE_URL.'showBeer');

      }
    }

    function editBeer($params = null){
        if(ISADMIN){

        $id_beer = $params[':ID'];
            // nombre, descripcion, imagen, precio, ibu, alcohol, id_categoria
            if (isset($_POST['nombre']) != '') {
                $fileLocation = 'images/default.jpg';
                // Chequeamos que la imagen enviada no este vacia
                if (strlen($_FILES['imagen']['tmp_name']) > 0) {
                    // var_dump($_FILES['imagen']);
                    // Chequeamos el tamaño de la imagen para ver que sea valida 
                    $check = getimagesize($_FILES['imagen']['tmp_name']);
                    if($check !== false) {
                        // Armamos la ruta y la movemos
                        $fileLocation = 'images/' . basename($_FILES['imagen']["tmp_name"]);
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
        }else{
            header('Location: '.BASE_URL.'HOME');

        }
    }
    function showAddBeer(){
        if(ISADMIN){
        $categories = $this->categoryModel->getAll();

        $this->view->showAddBeer($categories);
        }else{
            header('Location: '.BASE_URL.'HOME');
        }

    }
    function addBeer(){
        if(ISADMIN){
            if (isset($_POST['nombre']) != '') {
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
        }else{
            header('Location: '.BASE_URL.'HOME');

        }
        
    }
    public function deleteBeer($params = null) {
        
        $id_beer = $params[':ID'];
        if(ISADMIN){

        if (isset($id_beer) === true) {
            $this->model->deleteBeer($id_beer);
        }
        header('Location: '.BASE_URL.'showBeer');
        } else{
            header('Location: '.BASE_URL.'HOME');
        
            }
        }  
}