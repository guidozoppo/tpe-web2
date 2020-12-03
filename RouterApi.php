<?php 

require_once 'RouterClass.php';
require_once 'api/APIComentariosController.php';

$comentariosController = 'APIComentariosController';
$router = new Router();

$router->addRoute('comentarios/:ID', 'DELETE', $comentariosController, 'deleteComentario');
$router->addRoute('comentarios', 'POST', $comentariosController, 'insertComentario');
$router->addRoute('productos/:ID/comentarios', 'GET', $comentariosController, 'getComentariosByProduct');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

?>