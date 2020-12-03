<?php
require_once './libs/smarty/Smarty.class.php';

class guitarView{

    function ShowABM($productos, $marcas, $message = "") {
        $smarty = new Smarty(); 
        $smarty->assign('mensaje', $message);
        $smarty->assign('productos_smarty', $productos);
        $smarty->assign('marcas_smarty', $marcas);
        $smarty->display("./templates/ABM.tpl");
    }

    function showNewProductSection($marca, $message = ""){
        $smarty = new Smarty(); 
        $smarty->assign('mensaje', $message);
        $smarty->assign('marca_smarty', $marca);
        $smarty->display("./templates/insertGuitar.tpl");
    }

    function mostrarInfo($productoInfo) {
        $smarty = new Smarty(); 
        $smarty->assign('infoProd_smarty', $productoInfo);
        $smarty->display("./templates/infoProducto.tpl");
    }

    function showProductsSection($productos, $marcas/* , $cantPaginas */) {
        $smarty = new Smarty(); 
        $smarty->assign('productos_smarty', $productos);
        $smarty->assign('marcas_smarty', $marcas);
        $smarty->display("./templates/productos.tpl");
    }

    function marcaSinProducto($message = "", $marcas) {
        $smarty = new Smarty();
        $smarty->assign('marcas_smarty', $marcas);
        $smarty->assign('mensaje', $message);
        $smarty->display("./templates/marcaSinProducto.tpl");
    }   
    
}
?>