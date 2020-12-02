<?php
require_once('./api/base.api.controller.php');
require_once('./App/Model/commentModel.php');
require_once('./api/json.view.php');

class commentApiController  extends baseAPIController
{
    function __construct(){
        parent::__construct();
        $this->model = new commentModel();
    }

    function getByID($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->getByID($id);
      
        if (!empty($comentario)) {
            $this->view->response($comentario, 200);
        } else {
            $this->view->response("No existe comentario con el id={$id}", 404);
        }
    }

    function getComments($params = null){
        $id = $params[':ID'];
        $comments =$this->model->getComments($id);
        $this->view->response($comments,200);
    }

    function addComment(){
        $body = $this->getData();
        if (LOGUEADO === true) {

            if (isset($body)) {
                if ($body->contenido != '' && $body->puntuacion != '' && $body->fecha != '' && $body->id_cerveza != '' && $body->id_usuario != '') {
                    $idComment =  $this->model->insertComment($body->contenido,$body->puntuacion,$body->fecha, $body->id_cerveza, $body->id_usuario);
                } else {
                    $this->view->response([], 400); // Bad Request
                }
            } else {
                $this->view->response([], 400); // Unprocessable Entity
            }

            if (!empty($idComment)) {
                $this->view->response($this->model->getByID($idComment), 201);
            } else {
                $this->view->response("El comentario no se pudo insertar", 404);
            }
        } else {
            $this->view->response([], 401); // unauthorized
        }
    }

    function deleteComment($params = null){
        
        if (ISADMIN === true) {
            $comentario_id = $params[':ID'];
              
            if ($comentario_id) {
               $result = $this->model->deleteComment($comentario_id);
                if($result > 0){
                    $this->view->response("El comentario con el id id=$comentario_id fue eliminado",200);
                }else{
                    $this->view->response("El comentario con el id id=$comentario_id no existe",404);
                }
            }
        } else {
            $this->view->response([], 403); // forbidden
        }
    }
}
