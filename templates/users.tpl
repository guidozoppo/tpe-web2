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
                <h3>{$mensaje}</h3>
                <table>
                    <thead>
                        <tr>
                            <td>Email</td>
                            <td>Administrador</td>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$user_smarty item=user}
                        <form action="userAction" method="POST">
                        <tr>
                            <td>
                                <input name="input_email" value="{$user->email}" readonly="readonly">
                            </td>        
                            <td>
                                <select name="input_administrador">
                                    <option {if $user->administrador == "1"}selected="selected"{/if} value="1">Si</option>
                                    <option {if $user->administrador == "0"}selected="selected"{/if} value="0">No</option>
                                </select>
                            </td>                  
                            <td>
                                <input type="hidden" name="input_idUsuario" value="{$user->id}">
                            </td>                     
                            <td>
                                <button type="submit" name="eliminarUser">Eliminar</button>
                            </td>                                            
                            <td>
                                <button type="submit" name="editarUser">Editar</button>
                            </td>
                        </tr>
                        </form>
                        {/foreach}
                    </tbody>
                </table>   
            </div>
        </article>
    </div>

    {include file="footer.tpl"}