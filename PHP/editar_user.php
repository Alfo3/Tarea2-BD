<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include("conexion.php");
    $username = $_SESSION['username'] ?? null;
    if (!$username) {
        header("Location: login.php");
        exit();
    }

    $sql = "SELECT Nombre_usuario, Rol_usuario, Email_usuario, Rut_usuario FROM usuario WHERE Nombre_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        exit();
    }

    $stmt->close();
    ?>

    <h2 class="subtittle">Editar datos del usuario</h2>
    <form action="procesar_editar_user.php" method="POST">
        <div class="field">
            <label class="label">Nombre de usuario</label>
            <div class="control">
                <input class="input" type="text" name="name_usuario" value="<?php echo htmlspecialchars($user['Nombre_usuario']); ?>" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" name="name_email" value="<?php echo htmlspecialchars($user['Email_usuario']); ?>" required>
            </div> 
        </div>

        <div class="field">
            <div class="label">Nueva contraseña</div>
            <div class="control">
                <input class="input" type="password" name="name_password" placeholder="Ingrese nueva contraseña">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-primary" type="submit">Guardar cambios</button>
            </div>
        </div>

    </form>
    <br>
    <a href="opciones.php">
        <button class="button is-link">Volver</button>
    </a>

</body>
</html>