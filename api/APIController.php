<?php

require_once 'APIView.php';

abstract class APIController {
    protected $model;
    protected $view;
    protected $data;

    public function __construct(){
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); //Viene en el body del request, trae un string (row crudo)
                                                        //Cuando hago un get el data está vacio
    }

    function getData(){
        return json_decode($this->data); //codifico el string que viene en el body a json
    }

}