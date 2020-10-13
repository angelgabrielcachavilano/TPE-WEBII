<?php

    require_once './App/View/staticView.php';

    class staticController{

        private $view;

        function __construct(){
            $this->view = new staticView();
        }

        function home(){
            $this->view->viewHome();
        }

        function contacto(){
            $this->view->viewContacto();
        }
    }