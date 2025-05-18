<?php
session_start();
include("conexion.php");

if (isset($_GET['id'])) {
    $articulo_id = $_GET['id'];

    // Elimina el artículo con el ID recibido
    $sql = "DELETE FROM articulo WHERE articulo_ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $articulo_id);

    if ($stmt->execute()) {
        echo "<script>alert('Artículo eliminado correctamente'); window.location.href='articulos_autores.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el artículo'); window.location.href='articulos_autores.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ID de artículo no especificado'); window.location.href='articulos_autores.php';</script>";
}

$conexion->close();
?>