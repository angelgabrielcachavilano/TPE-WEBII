<?php

require_once ('./libs/RouterClass.php');
require_once ('./api/commentApiController.php');
require_once 'configuration.php';

$router = new Router();


// public
$router->addRoute('comentario/:ID', 'GET', 'commentApiController', 'getByID');
$router->addRoute('comentarios/:ID', 'GET', 'commentApiController', 'getComments');

// solo registrados
$router->addRoute('comentarios', 'POST', 'commentApiController', 'addComment');
//Metodo solo del admin a.k.a adminMethods
$router->addRoute('deleteComentario/:ID', 'DELETE', 'commentApiController', 'deleteComment');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 