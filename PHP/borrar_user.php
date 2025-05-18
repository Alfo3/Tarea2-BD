<?php
session_start();        
include("conexion.php");

if (isset($_SESSION['username'])) {
    // Eliminar todas las variables de sesión
    $username = $_SESSION['username'];
    $sql = "DELETE FROM usuario WHERE Nombre_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        // La sesión se ha cerrado correctamente
        echo "<script>alert('Usuario eliminado correctamente');</script>";
    } else {
        // Error al eliminar el usuario
        echo "<script>alert('Error al eliminar el usuario');</script>";
    }
    $stmt->close();
}
$conexion->close();
session_unset();       
session_destroy();     
header("Location: login.php");
exit();
?>