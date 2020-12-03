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
        <h2>Iniciar Sesion</h2>
        <form action="verifyUser" method="post" id="form-consulta">
            <input type="email" placeholder="Mail" name="consulta-mail">
            <input type="password" placeholder="Password" name="consulta-password">
            <button type="submit" id="btn-enviar">Iniciar Sesion</button>
        </form>
        <button>
            <a href="register">Registrarse</a>
        </button>
            
        <div class="alert alert-danger" role="alert">{$mensaje}</div>
    </div>

    {include file="footer.tpl"}