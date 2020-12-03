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
            <table>
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
                <tr>
                    <td>{$producto->nombre_guitarra} </td>                   
                    <td>{$producto->modelo}</td> 
                    <td>{$producto->precio}</td>
                    <td>{$producto->nombre_marca}</td>
                    <td>{$producto->origen}</td>                        
                    <td><button><a href="infoCompleta/{$producto->id_guitarra}">Info completa</a></button></td>                        
                </tr>
                {/foreach}
                </tbody>
            </table>   
        {* <div class="pagination">
        <h3>Navega por las paginas</h3>
        <nav >
            <ul >
                <li class="apuntador"><</li>
        {foreach from=$cantPaginas_smarty item=pagina}
                <li><a href="{$pagina}">{$pagina}</a></li>
        {/foreach}
                <li class="apuntador">></li>
            </ul>
        </nav>
        </div> *}
        </div>
    </article>

    {include file="footer.tpl"}