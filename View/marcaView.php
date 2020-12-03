<?php
require_once './libs/smarty/Smarty.class.php';

class marcaView{

    function showMarcasSection($marcas, $message = "") {
        $smarty = new Smarty(); 
        $smarty->assign('mensaje', $message);
        $smarty->assign('marcas_smarty', $marcas);
        $smarty->display("./templates/listaMarcas.tpl");
    }

    function showNewMarcaSection($message = "") {
        $smarty = new Smarty(); 
        $smarty->assign('mensaje', $message);
        $smarty->display("./templates/insertMarca.tpl");
    }
    
}
?>