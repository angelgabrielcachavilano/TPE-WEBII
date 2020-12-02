<?php
    require_once ('./libs/Smarty.class.php');

    class categoryView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function showCategories($category,$viewFile){
            $this->smarty->assign('categories',$category);
            $this->smarty->display($viewFile);
        }

        function showCategory($category){
            $this->smarty->assign('category',$category);
            $this->smarty->display('templates/public/category.tpl');
        }

        function showAddCategory(){
            $this->smarty->display('templates/admin/categories/addCategory.tpl');
        }

        function showEditCategory($categoryData){
            $this->smarty->assign('category',$categoryData);
            $this->smarty->display('templates/admin/categories/editCategory.tpl');
        }
    }
