<?php
    // modificar en local
    require_once '../TEWEBII/App/Controller/beerController.php';
    require_once '../TEWEBII/App/Controller/categoryController.php';
    require_once '../TEWEBIIgitq/App/Controller/userController.php';
    require_once 'configuration.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');

    $r = new Router();
    // userController
    $r->addRoute("home", "GET", "userController", "home");
    $r->addRoute("login", "GET", "userController", "login");
    $r->addRoute("showSignIn", "GET", "userController", "showSignIn");
    $r->addRoute("singIn", "POST", "userController", "singIn");
    $r->addRoute("logout", "GET", "userController", "logout");
    $r->addRoute("veryUser", "POST", "userController", "veryUser");
    $r->addRoute("contactanos", "GET", "userController", "contacto");

    // beerController
    $r->addRoute("showBeer","GET","beerController","showBeer");
    $r->addRoute("showAddBeer","GET","beerController","showAddBeer");
    $r->addRoute("addBeer","POST","beerController","addBeer");
    $r->addRoute("showBeerByCategories","POST","beerController","showBeerByCategories");
    $r->addRoute("shoeEditBeer/:ID","GET","beerController","shoeEditBeer");
    $r->addRoute("editBeer/:ID","POST","beerController","editBeer");
    $r->addRoute("deleteBeer/:ID","GET","beerController","deleteBeer");

    // categoryController
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
    