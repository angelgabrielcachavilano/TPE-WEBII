<?php
    require_once ('./libs/Smarty.class.php');

    class userView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function viewHome(){
            $this->smarty->display('templates/public/index.tpl');
        }

        function viewContacto(){
            $this->smarty->display('templates/public/contacto.tpl');
        }

        function showLogin($message = ""){
            $this->smarty->assign("message", $message);
            $this->smarty->display('templates/public/login.tpl');
        }

        function showSignIn(){
            $this->smarty->display('templates/public/signIn.tpl');
        }

        public function viewRegister($error){
            if ($error !== null) {
                $this->smarty->assign('error', $error);
                $this->smarty->display('templates/public/signin.tpl');
                die();
            }
            header("Location: " . HOME);
        }

        public function viewListUsers($users){
            $this->smarty->assign('listUsers', $users);
            $this->smarty->display('templates/admin/listUsers.tpl');
        }
    }
