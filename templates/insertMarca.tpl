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

    <div class="container">
        <h2>Agregar Marca</h2>
        <div class="alert alert-danger" role="alert">
            <h3>{$mensaje}</h3>
        </div>
        <form action="submitMarca" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" id="nombre" name="input_nombre">
            </div>
            <div class="form-group">
                <label for="modelo">Origen</label>
                <input class="form-control" id="modelo" name="input_origen">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Marca</button>
        </form>
    </div>

    {include file="footer.tpl"}