<?php

require_once ('./libs/RouterClass.php');
require_once ('./api/commentApiController.php');
require_once 'configuration.php';

$router = new Router();


// public
$router->addRoute('comentario/:ID', 'GET', 'commentApiController', 'getByID');
// solo registrados
$router->addRoute('comentarios/:ID', 'POST', 'commentApiController', 'addComment');
//Metodo solo del admin a.k.a adminMethods
$router->addRoute('comentarios/:ID', 'DELETE', 'commentApiController', 'deleteComment');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 