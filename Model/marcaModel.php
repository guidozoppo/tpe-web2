<?php

class marcaModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_guitars;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getMarca(){
        $sentencia = $this->db->prepare("SELECT * FROM marca"/*"SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca")*/);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function createMarca($nombre, $origen) {
        $sentencia = $this->db->prepare("INSERT INTO marca(nombre_marca, origen) VALUES(?,?)");
        $sentencia->execute(array($nombre,$origen));
    }

    function getGuitarrasPorMarca($id_marca){
        $sentencia = $this->db->prepare("SELECT * FROM guitarra INNER JOIN marca ON guitarra.id_marca = marca.id_marca AND guitarra.id_marca = ?");
        $sentencia->execute(array($id_marca));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function eliminarMarca($marca_id){
        $sentencia = $this->db->prepare("DELETE FROM marca WHERE id_marca=?");
        $sentencia->execute(array($marca_id));
    }

    function editMarca($nombre, $origen, $idMarca) {
        $sentencia = $this->db->prepare("UPDATE marca SET nombre_marca = ?, origen=? WHERE marca.id_marca = ?");
        $sentencia->execute(array($nombre, $origen, $idMarca));
    }
    
}
?>