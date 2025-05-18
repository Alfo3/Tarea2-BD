<?php
include("conexion.php");

$usuario = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE Nombre_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['Contrasena_usuario'])) {
        //login exitoso, redirigir a la página principal
        session_start();
        $_SESSION['username'] = $row['Nombre_usuario'];
        $_SESSION['rol'] = $row['Rol_usuario'];
        $_SESSION['email'] = $row['Email_usuario'];
        $_SESSION['rut'] = $row['Rut_usuario'];
        header("Location: opciones.php");
        exit();
        }
    else {
        echo "<script>alert('Contraseña incorrecta'); window.location.href = 'login.php';</script>";
        }
}
else{
    echo "El usuario no existe";
}

$stmt->close();
$conexion->close();

?>