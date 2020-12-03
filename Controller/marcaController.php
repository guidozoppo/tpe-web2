<?php

require_once "./Model/guitarModel.php";
require_once "./Model/marcaModel.php";
require_once "./View/guitarView.php";
require_once "./View/marcaView.php";
require_once "userController.php";

class marcaController{
    
    private $marcaModel;
    private $marcaView;
    private $guitarView;
    private $userController;

    function __construct(){
        /* $this->view = new View();
        $this->userView = new userView();
        $this->model = new Model();
        $this->userModel = new userModel(); */
    
        //NUEVO
        $this->marcaModel = new marcaModel();
        $this->guitarView = new guitarView();
        $this->marcaView = new marcaView();
        $this->userController = new userController();
    }

    function filtrarPorMarca($params = null) {
        $id_marca = $params[':ID'];
        $productos = $this->marcaModel->getGuitarrasPorMarca($id_marca);
        $marcas = $this->marcaModel->getMarca();
        if ($productos) {
            $this->guitarView->showProductsSection($productos, $marcas, 0);  
        }else{
            $this->guitarView->marcaSinProducto("No hay productos asociados a la marca seleccionada",$marcas);
        }
    }

    function showMarcasSection() {
        $this->userController->checkAdmin();
        $marcas = $this->marcaModel->getMarca();
        $this->marcaView->showMarcasSection($marcas);
    }

    function showNewMarcaSection() {
        $this->userController->checkAdmin();
        $this->marcaView->showNewMarcaSection();
    }
    
    function createMarca() {
        $nombre = $_POST["input_nombre"];
        $origen = $_POST["input_origen"];
        if ($nombre && $origen) {
            $this->marcaModel->createMarca($nombre, $origen);
            $this->marcaView->showNewMarcaSection("Marca agregada con exito!");
        } else {
            $this->marcaView->showNewMarcaSection("Debes completar todos los campos");
        }
    }

    function modificarMarca() {
        if(isset($_POST["eliminarMarca"])){
        
            $idMarca = $_POST["input_idMarca"];
            $productos = $this->marcaModel->getGuitarrasPorMarca($idMarca);
            if(!empty($productos)){
                $marcas = $this->marcaModel->getMarca();
                $this->marcaView->showMarcasSection($marcas, "No se ha eliminado la marca. Tiene productos asociados!");
            } else{
                $this->marcaModel->eliminarMarca($idMarca);
                $marcas = $this->marcaModel->getMarca();
                $this->marcaView->showMarcasSection($marcas, "Se ha eliminado con exito!");
            }
        } else if(isset($_POST["editarMarca"])){
            $nombre = $_POST["input_nombre"];
            $origen = $_POST["input_origen"];
            $idMarca = $_POST["input_idMarca"];
            
            if(!empty($nombre) && !empty($origen) && !empty($idMarca)){
                $this->marcaModel->editMarca($nombre, $origen, $idMarca);
                $marcas = $this->marcaModel->getMarca();
                $this->marcaView->showMarcasSection($marcas, "Se ha editado con exito!");
            } else {
                $marcas = $this->marcaModel->getMarca();
                $this->marcaView->showMarcasSection($marcas, "No se ha podido editar!");
                }
            }
    }

}
?>