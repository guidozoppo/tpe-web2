<?php

class Model {
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_guitars;charset=utf8', 'root', '');
    }
}
    //guitarraModel
    /* function getGuitars(){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    } */

    //marcaModel
    /* function getMarca(){
        $sentencia = $this->db->prepare("SELECT * FROM marca"/*"SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca"));*/
        /*$sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    } */

    //guitarraModel
    /* function getGuitarsParaEditar(){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //guitarraModel
    function getGuitarrasPorMarca($id_marca){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca AND guitarra.id_marca = ?");
        $sentencia->execute(array($id_marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    } */

    //POR AHI VA AL MODELMARCA
    /*function getMarca(){
        $sentencia = $this->db->prepare("SELECT a.id_marca, b.nombre FROM guitarra a INNER JOIN marca b ON a.id_marca = b.id_marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }*/




