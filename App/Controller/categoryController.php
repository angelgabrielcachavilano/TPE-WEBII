<?php
    require_once './App/Model/categoryModel.php';
    require_once './App/View/categoryView.php';
    require_once './libs/helpers/authHelper.php';

    class categoryController{

        private $model;
        private $view;
        // private $helper;
        
        function __construct(){
            // $this->helper = new authHelper;
            // $this->helper->checkLoggedIn();
            $this->model = new categoryModel();
            $this->view = new categoryView();
        }

        function showCategories(){
            $categories = $this->model->getAll();
            if(ISADMIN){
                $viewFile = 'templates/admin/categories/categories.tpl';
            }else{
                $viewFile = 'templates/public/categories.tpl';
            }
            $this->view->showCategories($categories,$viewFile);
        }

        function showCategoryById($params = null){
            $id_category = $params[':ID'];  
            $category = $this->model->getById($id_category);
        
            $this->view->showCategory($category);
        }

        function showAddCategory(){
            if(ISADMIN){
            $this->view->showAddCategory();
            }else{
                header('Location: '.BASE_URL.'HOME');
            }
        }

        function addCategory() {
            if(ISADMIN){
                if($_POST['nombre'] != '' && $_POST['descripcion'] != ''){
                    $this->model->addCategory(
                        $_POST['nombre'],
                        $_POST['descripcion'],
                    );
                    header('Location: '.BASE_URL.'showCategories');
                }else{
                    header('Location: '.BASE_URL.'showAddCategory');
                }
            $this->view->showAddCategory();
            }else{
                header('Location: '.BASE_URL.'HOME');
            }
        }

        function showEditCategory($params = null){
            $id_category = $params[':ID'];
            if(ISADMIN){
            $categoryData = $this->model->getByID( $id_category);
            $this->view->showEditCategory($categoryData);   
            }else{
                header('Location: '.BASE_URL.'HOME');
            }
        }

        function editCategory($params = null){
            $id_category = $params[':ID'];
            if(ISADMIN){
            if (isset( $id_category) === true) {
                // nombre, descripcion, imagen, precio, ibu, alcohol, id_categoria
                if (isset($_POST['nombre']) != '') {
                    // Insertamos una nueva cerveza
                    $this->model->editCategory(
                        $_POST['nombre'],
                        $_POST['descripcion'],
                        $id_category,
                    );
                    header('Location: '.BASE_URL.'showCategories');
                } 
            }
            }else{
                header('Location: '.BASE_URL.'HOME');
            }
        }

        function deleteCategory($params = null){
            if(ISADMIN){
            $id_category = $params[':ID'];
            $this->model->deleteCategory($id_category);
            header('Location: '.BASE_URL.'showCategories');
            }else{
                header('Location: '.BASE_URL.'HOME');

            }
        }
    }
