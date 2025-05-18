<?php
include("conexion.php");
session_start();


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
}
else{
    exit();
}

$sqlArt = "SELECT cantidad_articulos_usuario(?) AS total";
$stmtArt = $conexion->prepare($sqlArt);
$stmtArt->bind_param("s", $user['Email_usuario']);
$stmtArt->execute();
$resultArt = $stmtArt->get_result();
$totalArticulos = 0;
if ($rowArt = $resultArt->fetch_assoc()) {
    $totalArticulos = $rowArt['total'];
}
$stmtArt->close();
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Usuario</title>
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
    <h2 class="subtittle">Información del usuario</h2>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['Nombre_usuario']); ?></p>
    <p><strong>Rol:</strong> <?php echo htmlspecialchars($user['Rol_usuario']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['Email_usuario']); ?></p>
    <p><strong>Rut:</strong> <?php echo htmlspecialchars($user['Rut_usuario']); ?></p>
    <p><strong>Artículos publicados:</strong> <?php echo $totalArticulos; ?></p>
    <button class="button is-danger mt-3" onclick="window.location.href='logout.php'">Cerrar Sesión</button>
    <button class="button is-info mt-3" onclick="window.location.href='opciones.php'">Volver</button>
</body>
</html>