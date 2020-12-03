<?php

class userModel {
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_guitars;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
    function getUsers(){
        $sentencia = $this->db->prepare("SELECT * FROM users");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    
    function crearUsuario($mail, $password, $administrador){
        $sentencia = $this->db->prepare("INSERT INTO `users` (`email`, `password`, `administrador`) VALUES (?,?,?)");
        $sentencia->execute(array($mail, $password, $administrador));
    }
    
    function editUser($administrador, $idUser) {
        $sentencia = $this->db->prepare("UPDATE users SET administrador = ? WHERE users.id = ?");
        $sentencia->execute(array($administrador, $idUser));
    }

    function eliminarUser($idUser){
        $sentencia = $this->db->prepare("DELETE FROM users WHERE id=?");
        $sentencia->execute(array($idUser));
    }
    
}