<?php 
    require_once('./api/json.view.php');

    abstract class baseAPIController {
        protected $model;
        protected $view;
        protected $data;

        protected function __construct() {
            $this->view = new JSONView();
            $this->data = file_get_contents('php://input');
        }

        function getData(){
            return json_decode($this->data);
        }
    }