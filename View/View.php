<?php
require_once './libs/smarty/Smarty.class.php';

class View {

    function __construct () {}

    function showHome () {
        $smarty = new Smarty();
        $smarty->display("./templates/home.tpl");
    }

    function showContacto () {
        $smarty = new Smarty();
        $smarty->display("./templates/contacto.tpl");
     }
 
}

