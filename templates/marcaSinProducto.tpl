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
   {include file="busqueda.tpl"}

    <article class="eleccion-producto">
        <div class="marcas">
        <h2>Marcas</h2>
            <ul>
            {foreach from=$marcas_smarty item=marca}
                <a href="{$marca->id_marca}"><li>{$marca->nombre_marca}</li></a>
            {/foreach}
                <a href="productos"><li>Todas</li></a>
            </ul>
        </div>
        <div class="producto">
            {$mensaje}   
        </div>
    </article>


{include file="footer.tpl"}