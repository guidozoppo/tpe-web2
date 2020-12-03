<?php

class comentarioModel{

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_guitars;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function getComentariosByProduct($idProduct) {
        $sentencia = $this->db->prepare("SELECT * FROM `comentario` WHERE id_guitarra = ?");
        $sentencia->execute(array($idProduct));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function deleteComentarioByProduct($id_guitarra) {
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_guitarra = ?");
        $sentencia->execute(array($id_guitarra));
    }
    
    function deleteComentario($id_comentario) {
        $sentencia = $this->db->prepare("DELETE FROM `comentario` WHERE id_comentario = ?");
        $sentencia->execute(array($id_comentario));
        return $sentencia->rowCount(); //retorna la cantidad de filas eliminadas
    }
    
    function deleteComentarioByUser($idUser) {
        $sentencia = $this->db->prepare("DELETE FROM `comentario` WHERE id_user = ?");
        $sentencia->execute(array($idUser));
    }

    function insertComentario($mensaje, $id_user, $id_guitarra, $valoracion) {
        $sentencia = $this->db->prepare("INSERT INTO comentario(mensaje, id_user, id_guitarra, valoracion) VALUES(?,?,?,?)");
        $sentencia->execute(array($mensaje, $id_user, $id_guitarra, $valoracion));
        return $this->db->lastInsertId(); //devuelvo la ultima id insertada, en este caso 
                                          //devuelve la id de la tarea que estoy insertando
    }
}