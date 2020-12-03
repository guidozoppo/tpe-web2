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
                <table>
                    <h3>{$mensaje}</h3>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Modelo</td>
                            <td>Precio</td>
                            <td>Marca</td>
                            <td>Origen</td>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$productos_smarty item=producto}
                        <form action="prodAction" method="POST">
                            <tr>
                                <td><input name="input_nombre" value="{$producto->nombre_guitarra}"></td>                   
                                <td><input name="input_modelo" value="{$producto->modelo}"></td> 
                                <td><input name="input_precio" value="{$producto->precio}"></td>
                                <td>
                                    <select id="marca"  name="select_marca">
                                        {foreach from=$marcas_smarty item=marca}
                                        <option {if $producto->id_marca == $marca->id_marca}selected="selected"{/if} value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                                        {/foreach} 
                                    </select>
                                </td>
                                <td><input name="input_descripcion" value="{$producto->origen}"></td>
                                <td><input type="hidden" name="id_guitarra" value="{$producto->id_guitarra}"></td>          
                                <td><button type="submit" name="eliminarProducto">Eliminar</button></td>            
                                <td><button type="submit" name="editarProducto">Editar</button></td>                                            
                            </tr>
                        </form>
                        {/foreach}
                    </tbody>
                </table>   
            </div>
        </article>

    {include file="footer.tpl"}