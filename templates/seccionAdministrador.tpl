<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Guitars Tandil</title>
</head>
<body>

    {include file="nav.tpl"}


    <div class="contenido">
        <article class="eleccion-producto">
            <div class="producto">
                <button><a href="createProduct">Insertar Producto</a></button>
                <button><a href="modificarProducto">Modificar Producto</a></button>
                <button><a href="createMarca">Insertar Marca</a></button>
                <button><a href="updateMarca">Modificar Marca</a></button>
                <button><a href="users">Modificar Usuario</a></button>
            </div>
        </article>
    </div>

    {include file="footer.tpl"}