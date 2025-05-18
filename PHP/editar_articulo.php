<?php
session_start();
include("conexion.php");

// Obtener el ID del artículo a editar
if (!isset($_GET['id'])) {
    echo "<script>alert('ID de artículo no especificado'); window.location.href='articulos_autores.php';</script>";
    exit();
}

$articulo_id = $_GET['id'];

// Si el formulario fue enviado, procesar la actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $resumen = $_POST['resumen'] ?? '';
    $fecha_envio = $_POST['fecha_envio'] ?? date('Y-m-d H:i:s');

    $sql = "UPDATE articulo SET titulo = ?, resumen = ?, fecha_envio = ? WHERE articulo_ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $titulo, $resumen, $fecha_envio, $articulo_id);

    if ($stmt->execute()) {
        echo "<script>alert('Artículo actualizado correctamente'); window.location.href='articulos_autores.php';</script>";
        $stmt->close();
        $conexion->close();
        exit();
    } else {
        echo "<script>alert('Error al actualizar el artículo');</script>";
    }
    $stmt->close();
}

// Obtener los datos actuales del artículo
$sql = "SELECT * FROM articulo WHERE articulo_ID = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $articulo_id);
$stmt->execute();
$result = $stmt->get_result();
$articulo = $result->fetch_assoc();
$stmt->close();
$conexion->close();

if (!$articulo) {
    echo "<script>alert('Artículo no encontrado'); window.location.href='articulos_autores.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Artículo</title>
    <link rel="stylesheet" href="../css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Editar Artículo</h2>
        <form method="POST">
            <div class="field">
                <label class="label">Título</label>
                <div class="control">
                    <input class="input" type="text" name="titulo" value="<?php echo htmlspecialchars($articulo['titulo']); ?>" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Resumen</label>
                <div class="control">
                    <input class="input" type="text" name="resumen" value="<?php echo htmlspecialchars($articulo['resumen']); ?>" maxlength="150" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Fecha de Envío</label>
                <div class="control">
                    <input class="input" type="datetime-local" name="fecha_envio" value="<?php echo date('Y-m-d\TH:i', strtotime($articulo['fecha_envio'])); ?>" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Guardar Cambios</button>
                    <a class="button is-light" href="articulos_autores.php">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>