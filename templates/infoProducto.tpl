<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/productos.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Guitars Tandil</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>

    {include file="nav.tpl"}    

    <div class="contenido">
        <article class="eleccion-producto">
            <div class="producto">
                {foreach from=$infoProd_smarty item=productoInfo}
                    <h1>{$productoInfo->nombre_guitarra}</h1>   
                    <h2>Modelo: {$productoInfo->modelo}</h2>   
                        <p>{$productoInfo->descripcion}</p>
                    <ul>
                        <li>Marca: {$productoInfo->nombre_marca}</li>            
                        <li>Fabricada en: {$productoInfo->origen}</li>            
                        <li>Precio ${$productoInfo->precio}</li>            
                    </ul>
                {/foreach}        
            </div>
        </article>
    </div>
    <div class="container">
        <div class="row">
            <div>
                {include file="vue/comentario.vue"}
            </div>
            <div class="formComentario">
                {include file="crearComentario.tpl"}      
            </div>
        </div>
    </div>

    <script src="../js/comentario.js"></script>

    {include file="footer.tpl"}