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
                <h2>Listado de Marcas</h2>

                <div class="alert alert-danger" role="alert">
                    <h3>{$mensaje}</h3>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Origen</td>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$marcas_smarty item=marca}
                        <form action="marcaAction" method="POST">
                        <tr>
                            <td><input name="input_nombre" value="{$marca->nombre_marca}"></td>                   
                            <td><input name="input_origen" value="{$marca->origen}"></td> 
                            <td><input type="hidden" name="input_idMarca" value="{$marca->id_marca}"></td>                              
                            <td><button type="submit" name="eliminarMarca">Eliminar</button></td>                        
                            <td><button type="submit" name="editarMarca">Editar</button></td>                        
                        </tr>
                        </form>
                        {/foreach}
                    </tbody>
                </table>       
            </div>
        </article>
    </div>

    {include file="footer.tpl"}