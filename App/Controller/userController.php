<?php

require_once './App/Model/userModel.php';
require_once './libs/helpers/authHelper.php';

require_once './App/View/userView.php';


class userController{

    private $view;
    private $model;
    // private $helper;

    function __construct()
    {
        // $this->helper = new authHelper;
        $this->view = new userView();
        $this->model = new userModel();
    }


    function login(){
        if(isset($_SESSION["EMAIL"])){
    
            header("Location: " . HOME);
            die();
    
        }
        $this->view->showLogin();
    }
    function logout(){
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }
    function home(){

        // $this->helper->checkLoggedIn();
        $this->view->viewHome();
    }
    function contacto(){
        // $this->helper->checkLoggedIn();
        $this->view->viewContacto();
    }
    function  verifyUser(){
        $user = $_POST["email"];
        $pass = $_POST["password"];
     
    
        if (isset($_POST['email']) != '' && isset($_POST['password']) != '') {
          
            $userDB = $this->model->getUser($user);
            
            if(isset($userDB) &&  $userDB){
                //Si el usuario existe
             

                if(password_verify($pass, $userDB->password)){

                    session_start();
                    $_SESSION["EMAIL"] = $userDB->email;
                    $_SESSION['isAdmin'] = (bool) $userDB->admin;
                    header("Location: ".BASE_URL."home");
                }else{
                    $this->view->showLogin("Contraseña incorrecta");
                }

            }else{
                //Si no existe 
                $this->view->showLogin("El usuario no existe");
            }



        }
    }

    function showSignIn(){
        $this->view->showSignIn();

    }
    function singIn(){
        $error = null;
        if (isset($_POST['email']) != '') {
            if (isset($_POST['password'] ) != '' && isset($_POST['password2']) != '' && $_POST['password'] === $_POST['password2']) {

                $validation = $this->model->getUser($_POST['email']);
                
                if(!$validation){
                    //Si el usuario no esta , lo agregamos
                    $insert = $this->model->addUser(
                       
                        $_POST['email'],
                        password_hash($_POST['password'], PASSWORD_DEFAULT)
                        
                    );
                    var_dump($insert );
                 
                    
                    if ($insert !== false) {
                        $_SESSION['EMAIL'] = $_POST['email'];
                        $_SESSION['isAdmin'] = false;
                    }
                }else {
                    //Si el usuario esta, le avisamos
                    $error = 'Este nombre de usuario ya está en uso';
                }


            }  else {
                $error = 'Las contraseñas no coinciden';
            }


        }
        $this->view->viewRegister($error);
    }
    // admin method
    function listUsers() {
        if(ISADMIN){

            $users = $this->model->getUsers();
            $this->view->viewListUsers($users);
            die();
        }
        header("Location: " . HOME);


    }

    // admin method
    function setAdminStatus($params = null) {
        $id_user= $params[':ID'];
        if(ISADMIN){
            $user = $this->model->getUserById($id_user);
         
                if($user){
                 
                     if ($id_user !== ADMIN_ID) {
                        $newStatus = false;
                        
                        if($user->admin == false){
                            $newStatus = true;
                            
                        }
                       

                          $this->model->setStatus( $newStatus,$id_user);
                         
                          header('Location: '.BASE_URL.'/adminPanel');
                          die();
                     }
                }
            header('Location: '.BASE_URL.'/adminPanel');
            die();
        }
        header("Location: " . HOME);

    }
    function deleteUser($params = null) {
        $id_user= $params[':ID'];
        if(ISADMIN){
           
            $user = $this->model->getUserById($id_user);
          
             if ($user && $id_user !== ADMIN_ID) {
                 $this->model->deleteUser($id_user);
                 
             }
             header('Location: '.BASE_URL.'adminPanel');
             die();
        }
         header("Location: " . HOME);

    }
}