<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Guitars Tandil</title>
</head>
<body>
    
    {include file="nav.tpl"}

    <div class="contenido">
        <h2>TU CUENTA</h2>
        <p>{$mail_smarty}</p>
        {if $isAdmin == 1}
        <button><a href="admin">SECCION ADMINISTRADOR</a></button>
        {/if}
        <button><a href="logout">CERRAR SESION</a></button>     
    </div>

    {include file="footer.tpl"}