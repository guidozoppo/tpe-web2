<?php
require_once './libs/smarty/Smarty.class.php';
require_once "./View/View.php";
require_once "./Model/Model.php";

class Controller{

    private $view;

    function __construct() {
        $this->view = new View();
    }

    function home() {
        $this->view->showHome();
    }

    function contacto() {
        $this->view->showContacto();
    }

}

?>