<?php
include("conexion.php");

$rut = $_POST['rut'];
$usuario = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = $_POST['role'];
$email = $_POST['email'];

$sql = "SELECT * FROM usuario WHERE Nombre_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0){
    echo "El usuario ya existe";
}
else{
    $sql = "INSERT INTO usuario (Rut_usuario, Nombre_usuario, Contrasena_usuario, Rol_usuario, Email_usuario) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $rut, $usuario, $pass, $rol, $email);
    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el usuario'); window.location.href= 'login.php; </script>'";
    }
}
$stmt->close();
$conexion->close();

?>