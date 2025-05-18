<!-- filepath: c:\Users\miner\OneDrive\Escritorio\Tarea1-BD-main\Tarea1-BD-main\Tarea2_BD\tarea2BD\php\login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
</head>
<body class="section">
        <div class="has-text-centered">
        <img src="../img/Logo .png" alt="Logo del sitio" style="max-height: 300px;">
        </div>

        <div class="container">
        <form action="procesar_login.php" method="POST">
            <!-- Campo Usuario -->
            <div class="field">
                <label class="label" for="login_username">Usuario</label>
                <p class="control has-icons-left">
                    <input class="input" type="text" id="login_username" name="username" placeholder="Ingrese su usuario" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
            </div>

            <!-- Campo Contraseña -->
            <div class="field">
                <label class="label" for="login_password">Contraseña</label>
                <p class="control has-icons-left">
                    <input class="input" type="password" id="login_password" name="password" placeholder="Ingrese su contraseña" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <!-- Botones -->
            <br>
            <button class="button is-Iniciar Sesión is-rounded" type="submit">Iniciar Sesión</button>
            <button class="button is-link is-light is-rounded" type="button" onclick="window.location.href='register.php';">Registrarse</button>
</form>

</body>
</html>