<?php
    require_once './App/Controller/beerController.php';
    require_once './App/Controller/categoryController.php';
    require_once './App/Controller/userController.php';
    require_once 'configuration.php';
    require_once './libs/RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');

    
    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "userController", "home");
    $r->addRoute("login", "GET", "userController", "login");
    $r->addRoute("showSignIn", "GET", "userController", "showSignIn");
    $r->addRoute("singIn", "POST", "userController", "singIn");
    $r->addRoute("logout", "GET", "userController", "logout");
    $r->addRoute("veryUser", "POST", "userController", "verifyUser");
    $r->addRoute("contactanos", "GET", "userController", "contacto"); // Cambiar nombre

    //Admin
    $r->addRoute("adminPanel", "GET", "userController", "listUsers");
    $r->addRoute("setAdminStatus/:ID", "GET", "userController", "setAdminStatus");
    $r->addRoute("deleteUser/:ID", "GET", "userController", "deleteUser");
    $r->addRoute("deleteImage/:ID", "GET", "beerController", "deleteImage");

    
    $r->addRoute("showBeer/:PAG","GET","beerController","showBeer");
    $r->addRoute("showBeerDetail/:ID","GET","beerController","beerDetail");
    $r->addRoute("showAddBeer","GET","beerController","showAddBeer");
    $r->addRoute("addBeer","POST","beerController","addBeer");
    $r->addRoute("showBeerByCategories","POST","beerController","showBeerByCategories");
    $r->addRoute("showEditBeer/:ID","GET","beerController","showEditBeer");
    $r->addRoute("editBeer/:ID","POST","beerController","editBeer");
    $r->addRoute("deleteBeer/:ID","GET","beerController","deleteBeer");
    $r->addRoute("filter","POST","beerController","filter");

    $r->addRoute("showCategories","GET","categoryController","showCategories");
    $r->addRoute("showCategory/:ID","GET","categoryController","showCategoryById");
    $r->addRoute("showAddCategory","GET","categoryController","showAddCategory");
    $r->addRoute("addCategory","POST","categoryController","addCategory");

    $r->addRoute("showEditCategory/:ID","GET","categoryController","showEditCategory");
    $r->addRoute("editCategory/:ID","POST","categoryController","editCategory");
    $r->addRoute("deleteCategory/:ID","GET","categoryController","deleteCategory");



    
 

    //Ruta por defecto.
    $r->setDefaultRoute("userController", "login");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
    