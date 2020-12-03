<?php

require_once "./View/userView.php";
require_once "./Model/userModel.php";
require_once "./Model/comentarioModel.php";

class userController{

    private $userView;
    private $userModel;
    private $comentarioModel;

    function __construct(){
        $this->userView = new userView();
        $this->userModel = new userModel();
        $this->comentarioModel = new comentarioModel();
    }
    
    function verifyUser() {
        $user = $_POST["consulta-mail"];
        $pass = $_POST["consulta-password"];

        if (isset($user)) {
            $userFromDB = $this->userModel->getUser($user);

            if (isset($userFromDB) && $userFromDB) {
                if (password_verify($pass, $userFromDB->password)) {
                    session_start();
                    $_SESSION['EMAIL'] = $userFromDB->email;
                    $_SESSION['ID'] = $userFromDB->id;
                    $_SESSION['ADMINISTRADOR'] = $userFromDB->administrador;
                    if ($_SESSION['ADMINISTRADOR'] == 0) {
                        header("Location: " . HOME);
                    } else{
                        header("Location: " . SECCION_ADMIN);
                    }
                } else {
                    $this->userView->showLoginSection("Contraseña incorrecta");
                }
            } else {
                $this->userView->showLoginSection("El usuario ingresado no existe");
            }
        }
    }
 
    function showLoginSection() {
        $this->userView->showLoginSection();
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: ". HOME);
    }

    function checkLoggedIn() {
        session_start();
        if(!isset($_SESSION['EMAIL'])) {
            header("Location: ". LOGIN);
            die();
        }
    }
    
    function checkAdmin() {
        session_start();
        if(!isset($_SESSION['EMAIL']) || $_SESSION['ADMINISTRADOR'] == 0) {
            header("Location: ". LOGIN);
            die();
        }
    }

    function showAdminSection() {
        $this->checkAdmin();
        $this->userView->showAdminSection();
    }

    function showUsersSection(){
        $this->checkAdmin();
        $usuarios = $this->userModel->getUsers();
        $this->userView->showUsersSection($usuarios);
    }
    
    function actionUser() {
        if (isset($_POST["eliminarUser"])) {
            $idUser = $_POST["input_idUsuario"];
            $email = $_POST["input_email"];
            $administrador = $_POST["input_administrador"];
            
            if (isset($email) && isset($administrador) && isset($idUser)) {
                $this->userModel->eliminarUser($idUser);
                $this->comentarioModel->deleteComentarioByUser($idUser);
                $usuarios = $this->userModel->getUsers();
                $this->userView->showUsersSection($usuarios, "Se ha eliminado el usuario y toda su informacion con exito!");
            } else {
                $usuarios = $this->userModel->getUsers();
                $this->userView->showUsersSection($usuarios, "No se ha podido eliminar el usuario. Verificar que no tenga comentarios asociados");
            }
        } else if (isset($_POST["editarUser"])) {
            $email = $_POST["input_email"];
            $administrador = $_POST["input_administrador"];
            $idUser= $_POST["input_idUsuario"];
            
            if (isset($email) && isset($administrador) && isset($idUser)) {
                $this->userModel->editUser($administrador, $idUser);
                $usuarios = $this->userModel->getUsers();
                $this->userView->showUsersSection($usuarios, "Se ha editado con exito!");
            } else {
                $this->userView->showUsersSection($usuarios, "No se ha editado.");
            }
        }
    }

    function showRegisterSection(){
        $this->userView->showRegisterSection();
    }

    function registerUser() {
        $mail = $_POST["input_mail"];
        $password = $_POST["input_password"];       
        $administrador = 0;
        $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);

        if(!$mail || !$password) {
            $this->userView->showRegisterSection("Debes completar todos los campos");
            die();
        } else {
            $user = $this->userModel->getUser($mail);

            if(empty($user)) {          //VERIFICA QUE NO EXISTAN DOS USUARIOS CON EL MISMO MAIL
                $this->userModel->crearUsuario($mail, $passwordEncriptada, $administrador);
                $userFromDB = $this->userModel->getUser($mail);
                session_start();
                $_SESSION['EMAIL'] = $userFromDB->email;
                $_SESSION['ADMINISTRADOR'] = $userFromDB->administrador;
                header("Location: " . SECCION_USUARIO);
            } else {
                $this->userView->showRegisterSection("El mail ingresado ya existe");
            }
            
        }
    }

    function showUserSection() {
        session_start();
        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN);
        } else {
            $this->userView->showUserSection($_SESSION['EMAIL'], $_SESSION['ADMINISTRADOR']);
        }
    }

}