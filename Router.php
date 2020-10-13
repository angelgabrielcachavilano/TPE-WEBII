<?php
<<<<<<< HEAD

    require_once '../beerHouse/App/Controller/staticController.php';
    require_once '../beerHouse/App/Controller/beerController.php';
    require_once '../beerHouse/App/Controller/categoryController.php';
=======
    require_once '../beerHouse/App/Controller/beerController.php';
    require_once '../beerHouse/App/Controller/categoryController.php';
    require_once '../beerHouse/App/Controller/userController.php';
    require_once 'configuration.php';
>>>>>>> 8a7196b86d0c1e4fee2dd03e6d939efdd86f7975
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/home');

    
    $r = new Router();
    // rutas
<<<<<<< HEAD
    $r->addRoute("home", "GET", "staticController", "home");
    $r->addRoute("contactanos", "GET", "staticController", "contacto");
    $r->addRoute("showBeer","GET","beerController","showBeer");
    $r->addRoute("showCategories","GET","categoryController","showCategories");
    $r->addRoute("showCategory/:ID","GET","categoryController","showCategoryById");
    $r->addRoute("showBeerByCategories","POST","beerController","showBeerByCategories");
    // $r->addRoute("showGames", "GET", "juegoController", "showGames");
    // $r->addRoute("insert", "POST", "juegoController", "addGame");
    //  $r->addRoute("delete/:ID", "GET", "juegoController", "deleteGame");
    //  $r->addRoute("showApuestas", "GET", "apuestaController", "showApuestas");
    //  $r->addRoute("apostar/:ID", "GET", "apuestaController", "apostar");
    //  $r->addRoute("setApuesta", "POST", "apuestaController", "setApuesta");
    // $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");

    // //Advance
    // $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");
=======
    $r->addRoute("home", "GET", "userController", "home");
    $r->addRoute("login", "GET", "userController", "login");
    $r->addRoute("showSignIn", "GET", "userController", "showSignIn");
    $r->addRoute("singIn", "POST", "userController", "singIn");
    $r->addRoute("logout", "GET", "userController", "logout");
    $r->addRoute("veryUser", "POST", "userController", "veryUser");
    $r->addRoute("contactanos", "GET", "userController", "contacto");

    $r->addRoute("showBeer","GET","beerController","showBeer");
    $r->addRoute("showAddBeer","GET","beerController","showAddBeer");
    $r->addRoute("addBeer","POST","beerController","addBeer");
    $r->addRoute("showBeerByCategories","POST","beerController","showBeerByCategories");
    $r->addRoute("shoeEditBeer/:ID","GET","beerController","shoeEditBeer");
    $r->addRoute("editBeer/:ID","POST","beerController","editBeer");
    $r->addRoute("deleteBeer/:ID","GET","beerController","deleteBeer");

    $r->addRoute("showCategories","GET","categoryController","showCategories");
    $r->addRoute("showCategory/:ID","GET","categoryController","showCategoryById");
    $r->addRoute("showAddCategory","GET","categoryController","showAddCategory");
    $r->addRoute("addCategory","POST","categoryController","addCategory");

    $r->addRoute("showEditCategory/:ID","GET","categoryController","showEditCategory");
    $r->addRoute("editCategory/:ID","POST","categoryController","editCategory");
    $r->addRoute("deleteCategory/:ID","GET","categoryController","deleteCategory");

    
 
>>>>>>> 8a7196b86d0c1e4fee2dd03e6d939efdd86f7975

    //Ruta por defecto.
    $r->setDefaultRoute("userController", "login");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
    