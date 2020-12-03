<?php

class guitarModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_guitars;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getGuitars(){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    /* function countGuitars(){
        $sentencia = $this->db->prepare("SELECT COUNT(*) FROM guitarra");
        $sentencia->execute();
        return $sentencia->fetchColumn();
    }
    
    function getGuitarsPage($page){
        $startIndex = ($page - 1) * 5;
        $query = "SELECT SQL_CALC_FOUND_ROWS id_guitarra,`nombre_guitarra`,`modelo`,`precio`,`descripcion`,nombre_marca, origen FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca ORDER BY `guitarra`.`id_guitarra` ASC LIMIT ". $startIndex .", 5";
        $sentencia = $this->db->prepare($query);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    } */

    function getGuitarsParaEditar(){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function eliminarGuitarra($guitarra_id){
        $sentencia = $this->db->prepare("DELETE FROM guitarra WHERE id_guitarra=?");
        $sentencia->execute(array($guitarra_id));
    }
    
    function agregarGuitarra ($nombre, $modelo, $precio, $descripcion, $id_marca) {
        $sentencia = $this->db->prepare("INSERT INTO guitarra(nombre_guitarra, modelo, precio, descripcion, id_marca) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($nombre,$modelo,$precio,$descripcion, $id_marca));
    }

    function infoProducto($producto_id){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca AND id_guitarra=?");
        $sentencia->execute(array($producto_id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function editGuitarra($nombre, $modelo, $precio, $descripcion, $id_marca, $id_guitarra) {
        $sentencia = $this->db->prepare("UPDATE guitarra SET nombre_guitarra = ?, modelo=?, precio=?, descripcion=?, id_marca=? WHERE guitarra.id_guitarra = ?");
        $sentencia->execute(array($nombre, $modelo, $precio, $descripcion, $id_marca,$id_guitarra));
    }
    
    function buscarGuitarra($precioMin, $precioMax, $marca){
        $sentencia = $this->db->prepare("SELECT * FROM `guitarra` INNER JOIN marca ON guitarra.id_marca = marca.id_marca WHERE guitarra.precio>? AND guitarra.precio<? AND guitarra.id_marca=?");
        $sentencia->execute(array($precioMin, $precioMax, $marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
?>