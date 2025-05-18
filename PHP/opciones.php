<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 class="titulosLeft">Eliga una opcion de usuario</h1>

            <a href="articulos_autores.php">
            <button class="button is-primary">Ver articulos</button>
            </a>

            <a href="index.php">
            <button class="button is-info">Datos del usuario</button>
            </a>

            <a href="borrar_user.php">
            <button class="button is-danger">Borrar usuario</button>
            </a>

            <a href="editar_user.php">
            <button class="button is-warning ">Editar datos usuario</button>
            </a>

            <a href="login.php">
            <button class="button is-link">Volver</button>
            </a>

    </div>    
</body>
</html>