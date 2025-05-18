<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include("conexion.php");



    $nombre_usuario = $_POST['name_usuario'] ?? null;
    $email_usuario = $_POST['name_email'] ?? null;
    $nueva_contraseña = $_POST['name_password'] ?? null;
    $username = $_SESSION['username'] ?? null;

    if(!$nombre_usuario || !$email_usuario){
        echo "Error: Nombre de usuario o email no proporcionados.";
        exit();
    }


    if (!empty($nueva_contraseña)) {
        $password_usuario = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET Nombre_usuario = ?, Email_usuario = ?, Password_usuario = ? WHERE Nombre_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $nombre_usuario, $email_usuario, $password_usuario, $username);
    }
    else{
        $sql = "UPDATE usuario SET Nombre_usuario = ?, Email_usuario = ? WHERE Nombre_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $nombre_usuario, $email_usuario, $username);
    }

    if ($stmt->execute()) {
        // Actualización exitosa
        $_SESSION['username'] = $nombre_usuario; // Actualiza el nombre de usuario en la sesión
        echo "<script>alert('Datos actualizados correctamente'); window.location.href = 'opciones.php';</script>";
    } else {
        // Error al actualizar
        echo "<script>alert('Error al actualizar los datos'); window.location.href = 'editar_user.php';</script>";
    }

    $stmt->close();
    $conexion->close();
    ?>
</body>
</html>