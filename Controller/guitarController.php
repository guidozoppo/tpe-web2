<?php

require_once "./View/View.php";
require_once "./Model/guitarModel.php";
require_once "./Model/comentarioModel.php";
require_once "./Model/marcaModel.php";
require_once "./View/guitarView.php";
class guitarController{

    private $guitarModel;
    private $marcaModel;
    private $comentarioModel;
    private $guitarView;
    private $userController;
    
    function __construct(){
        $this->userController = new userController();
        $this->guitarModel = new guitarModel();
        $this->comentarioModel = new comentarioModel();
        $this->marcaModel = new marcaModel();
        $this->guitarView = new guitarView();
    }

    function showProductsSection() {
        $productos = $this->guitarModel->getGuitars();
        $marcas = $this->marcaModel->getMarca();
        $this->guitarView->showProductsSection($productos, $marcas, 0);
    }
    
    /* function productosPaginados($params = null) {
        $pagina = $params[':PAGINA'];
        $itemsPorPagina = 5;
        $cantidadPaginas = 0;
        $cantidadGuitarras = $this->guitarModel->countGuitars();
        if($pagina < 1){
            header("Location: ".PAGINA_UNO);
        } else{
            if($cantidadGuitarras % $itemsPorPagina == 0){
                $cantidadPaginas = $cantidadGuitarras / $itemsPorPagina;
                if($pagina > $cantidadPaginas){
                    $pagina = $cantidadPaginas;
                }
            } else{
                $cantidadPaginas = floor($cantidadGuitarras / $itemsPorPagina)+1;
                if($pagina > $cantidadPaginas){
                    $pagina = $cantidadPaginas;
                }
            }
            $arrayCantPaginas = range(1,$cantidadPaginas);
        }
        $productos = $this->guitarModel->getGuitarsPage($pagina);
        $marcas = $this->marcaModel->getMarca();
        $this->guitarView->ShowProductos($productos, $marcas, $arrayCantPaginas);
    } */

    function showNewProductSection() {
        $this->userController->checkAdmin();
        $marca = $this->marcaModel->getMarca();
        $this->guitarView->showNewProductSection($marca);
    }

    function infoCompleta($params = null){
        $producto_id = $params[':ID'];
        $productoInfo = $this->guitarModel->infoProducto($producto_id);
        $this->guitarView->mostrarInfo($productoInfo);
    }

    function createProduct() {
        $nombre = $_POST["input_nombre"];
        $modelo = $_POST["input_modelo"];
        $precio = $_POST["input_precio"];
        $descripcion = $_POST["input_descripcion"];
        $id_marca = $_POST["select_marca"];

        $marca = $this->marcaModel->getMarca();
        
        if(!isset($nombre) || !isset($modelo) || !isset($precio) || $precio==0 || empty($descripcion)) {
            $this->guitarView->showNewProductSection($marca, "Debes completar todos los campos");
            die();
        } else {

            $_FILES["input_imagen"]["name"] = uniqid();
            
            if ($_FILES['input_imagen']['type'] == "image/jpg" || $_FILES['input_imagen']['type'] == "image/jpeg" || $_FILES['input_imagen']['type'] == "image/png") {
                $this->guitarModel->agregarGuitarra($nombre, $modelo, $precio, $descripcion, $id_marca, $_FILES['input_imagen']["tmp_name"]);
            } else {
                $this->guitarModel->agregarGuitarra($nombre, $modelo, $precio, $descripcion, $id_marca);
            }

            $this->guitarView->showNewProductSection($marca, "Guitarra agregada con exito!");
        }
    }

    function modificarProducto() {
        if (isset($_POST["eliminarProducto"])) {
            $id_guitarra =  $_POST["id_guitarra"];
            $this->comentarioModel->deleteComentarioByProduct($id_guitarra);
            $this->guitarModel->eliminarGuitarra($id_guitarra);
            $productos = $this->guitarModel->getGuitars();
            $marcas = $this->marcaModel->getMarca();
            $this->guitarView->ShowABM($productos, $marcas, "Se ha eliminado el producto y toda su informacion con exito!");
        } else if (isset($_POST["editarProducto"])) { 
            $nombre = $_POST["input_nombre"];
            $modelo = $_POST["input_modelo"];
            $precio = $_POST["input_precio"];
            $descripcion = $_POST["input_descripcion"];
            $id_marca = $_POST["select_marca"];
            $id_guitarra= $_POST["id_guitarra"];

            if (!empty($nombre) && !empty($modelo) && !empty($precio) && !empty($descripcion) && !empty($id_marca) && !empty($id_guitarra)) {
                $this->guitarModel->editGuitarra($nombre, $modelo, $precio, $descripcion, $id_marca, $id_guitarra);
                $productos = $this->guitarModel->getGuitars();
                $marcas = $this->marcaModel->getMarca();
                $this->guitarView->ShowABM($productos, $marcas, "Se ha editado con exito!");
            } else {
                $productos = $this->guitarModel->getGuitars();
                $marcas = $this->marcaModel->getMarca();
                $this->guitarView->ShowABM($productos, $marcas, "No se ha podido editar!");
            }
        }
    }

    function obtenerProductos() {
        $this->userController->checkAdmin();
        $productos = $this->guitarModel->getGuitars();
        $marcas = $this->marcaModel->getMarca();
        $this->guitarView->ShowABM($productos, $marcas);
    }

    function buscarProductos() { 
            $precioMinimo = $_POST["input_precioMinimo"];
            $precioMaximo = $_POST["input_precioMaximo"];
            $marca = $_POST["select_marca"];
            $marcas = $this->marcaModel->getMarca();    
            if(!empty($precioMinimo) && !empty($precioMaximo) && !empty($marca)){
                $productos = $this->guitarModel->buscarGuitarra($precioMinimo, $precioMaximo, $marca);
                if(!empty($productos)){
                    $marcas = $this->marcaModel->getMarca();    
                    $this->guitarView->showProductsSection($productos, $marcas);
                } else{
                    $this->guitarView->marcaSinProducto("No se encontraron resultados",$marcas);
                }
            } else {
                $this->guitarView->marcaSinProducto("Complete los datos",$marcas);
            }
                
    }
}
?>