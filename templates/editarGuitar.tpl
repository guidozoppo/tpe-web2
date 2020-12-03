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
        <h2>Agregar Guitarra</h2>
        <form action="insert" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" id="nombre" name="input_nombre">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input class="form-control" id="modelo" name="input_modelo">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio"  name="input_precio">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <div><textarea id="descripcion"  name="input_descripcion"></textarea></div>
            </div>
            <div class="form-group">
                <label for="title">Marca</label>
                <select id="marca"  name="select_marca">
                {foreach from=$marca_smarty item=marca}
                <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                {/foreach} 
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>