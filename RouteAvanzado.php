<?php
    require_once 'Controller/Controller.php';
    require_once 'Controller/userController.php';
    require_once 'Controller/guitarController.php';
    require_once 'Controller/marcaController.php';
    require_once 'RouterClass.php';
    
    $url = 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]);
    
    define("LOGIN", $url.'/login');
    define("HOME", $url.'/home');
    define("SECCION_ADMIN", $url.'/admin');
    define("SECCION_USUARIO", $url.'/usuario');
    define("PAGINA_UNO", $url.'/productos/1');

    $router = new Router();

    // CONTROLLERS
    $mainController = "Controller";
    $userController = "userController";
    $guitarController = "guitarController";
    $marcaController = "marcaController";

    // RUTAS
    $router->setDefaultRoute($mainController, "home");
    $router->addRoute("home", "GET", $mainController, "home");
    $router->addRoute("contacto", "GET", $mainController, "contacto");

    $router->addRoute("register", "GET", $userController, "showRegisterSection");
    $router->addRoute("login", "GET", $userController, "showLoginSection"); 
    $router->addRoute("verifyUser", "POST", $userController, "verifyUser");
    $router->addRoute("logout", "GET", $userController, "logout");
    $router->addRoute("admin", "GET", $userController, "showAdminSection");
    $router->addRoute("submitRegister", "POST", $userController, "registerUser");
    $router->addRoute("users", "GET", $userController, "showUsersSection");
    $router->addRoute("userAction", "POST", $userController, "actionUser");
    $router->addRoute("usuario", "GET", $userController, "showUserSection");
    
    /* $router->addRoute("productos/:PAGINA", "GET", "guitarController", "productosPaginados"); */
    $router->addRoute("productos", "GET", $guitarController, "showProductsSection");
    $router->addRoute("createProduct", "GET", $guitarController, "showNewProductSection"); 
    $router->addRoute("insert", "POST", $guitarController, "createProduct");  
    $router->addRoute("infoCompleta/:ID", "GET", $guitarController, "infoCompleta");
    $router->addRoute("prodAction", "POST", $guitarController, "modificarProducto");  
    $router->addRoute("modificarProducto", "GET", $guitarController, "obtenerProductos");
    $router->addRoute("buscarProducto", "POST", $guitarController, "buscarProductos");
    
    $router->addRoute("createMarca", "GET", $marcaController, "showNewMarcaSection");
    $router->addRoute("submitMarca", "POST", $marcaController, "createMarca");
    $router->addRoute("updateMarca", "GET", $marcaController, "showMarcasSection");
    $router->addRoute(":ID", "GET", $marcaController, "filtrarPorMarca");
    $router->addRoute("marcaAction", "POST", $marcaController, "modificarMarca");  

    $router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>