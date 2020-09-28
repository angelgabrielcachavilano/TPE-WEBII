<?php
    require_once '../beerHouse/App/Controller/staticController.php';
  

    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "staticController", "home");



    // $r->addRoute("showGames", "GET", "juegoController", "showGames");


  
    // $r->addRoute("insert", "POST", "juegoController", "addGame");

    

    //  $r->addRoute("delete/:ID", "GET", "juegoController", "deleteGame");



    //  $r->addRoute("showApuestas", "GET", "apuestaController", "showApuestas");
    //  $r->addRoute("apostar/:ID", "GET", "apuestaController", "apostar");
    //  $r->addRoute("setApuesta", "POST", "apuestaController", "setApuesta");

     
    // $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");

  

    // //Advance
    // $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //Ruta por defecto.
    $r->setDefaultRoute("staticController", "home");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
    