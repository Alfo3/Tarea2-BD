<?php
$servernombre = "localhost";
$usuario = "root";
$contraseña = "";
$basededatos = "congresos_ltda";

$conexion = new mysqli($servernombre, $usuario, $contraseña, $basededatos);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>