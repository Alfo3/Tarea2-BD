<?php

session_start();
include("conexion.php");

$sql_comprobar = "SELECT COUNT(*) AS total FROM articulo";
$result = $conexion->query($sql_comprobar);
if ($result) {
    $id = rand();
} else {
    echo "Error al contar los artículos: " . $conexion->error;
}

$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$fecha_envio = $_POST['fecha_envio']; 
$contacto_autor = $_SESSION['email'];

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "INSERT INTO articulo (articulo_ID, titulo, resumen, fecha_envio, contacto_autor) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

if($stmt){
    $stmt->bind_param("sssss", $id, $titulo, $resumen, $fecha_envio, $contacto_autor);
    if($stmt->execute()){
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
$conexion->close();
?>