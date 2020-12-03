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
        <h2>Registrar Usuario</h2>
        <form action="submitRegister" method="post">
            <div class="form-group">
                <label for="mail">Mail</label>
                <input type="email" class="form-control" id="mail" name="input_mail">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="input_password">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse!</button>
        </form>
                
        <div class="alert alert-danger" role="alert">{$mensaje}</div>
    </div>