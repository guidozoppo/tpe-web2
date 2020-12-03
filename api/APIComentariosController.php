<?php
require_once './Model/comentarioModel.php';
require_once 'APIController.php';

class APIComentariosController extends APIController {

    function __construct() {
        parent::__construct();
        $this->model = new comentarioModel();
        $this->view = new APIView();
    }
    
    public function getComentariosByProduct($params = null) {
        $comentarios = $this->model->getComentariosByProduct($params[':ID']);
        if (isset($comentarios)) {
            session_start();
            $response = new stdClass();
            $response->isAdmin = isset($_SESSION['ADMINISTRADOR']) ? !!$_SESSION['ADMINISTRADOR'] : false;
            $response->comments = $comentarios;
            $this->view->response($response, 200);    
        } else {
            $this->view->response("Ocurrió un error", 500);    
        }
    }
    
    public function deleteComentario($params = null) {
        session_start();
        $isAdmin = isset($_SESSION['ADMINISTRADOR']) ? !!$_SESSION['ADMINISTRADOR'] : false;
        if ($isAdmin) {
            $id = $params[':ID'];
            $resultado = $this->model->deleteComentario($id);
            //$comentario pasa a tener lo que retorna el rowCount()
            if ($resultado > 0) { // si resultado > 0, significa que se elimino el comentario
                $this->view->response("El comentario con el id=$id fue borrado", 200);    
            } else {
                $this->view->response("El comentario con el id=$id no pudo ser borrado", 400);    
            }
        }
    }

    public function insertComentario() {
        $body = $this->getData(); //Busca en APIController.php (el padre) getData. Ahora body es un objeto
        session_start();
        if (!isset($_SESSION['ID'])) {
            $this->view->response('Es necesario iniciar sesion', 401);
            die();
        }

        $idComentario = $this->model->insertComentario($body->mensaje, $_SESSION['ID'], $body->id_guitarra, $body->valoracion);
        //$idComentario porque en model retorna lastInsertId
        if(!empty($idComentario)) {
            $nuevoComentario = new stdClass();
            $nuevoComentario->id_comentario = $idComentario;
            $nuevoComentario->id_guitarra = $body->id_guitarra;
            $nuevoComentario->id_user = $_SESSION['ID'];
            $nuevoComentario->mensaje = $body->mensaje;
            $nuevoComentario->valoracion = $body->valoracion;
            $this->view->response($nuevoComentario, 201);
        } else {
            $this->view->response("El comentario no se pudo insertar", 404);
        }
    
    }

}