
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Buscar Artículo</title>
</head>
<body>
    <h1 class="title is-4">Buscar Artículo</h1>
    <form method="get" action="buscar_articulo.php">
        <input type="text" name="search" placeholder="Buscar por título o email del autor" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Buscar</button>
    </form>
    <hr>
    <?php
        require("conexion.php");

        $busqueda = $_GET['search'] ?? '';

        $consulta = "SELECT * FROM vista_busqueda_articulos
                     WHERE titulo LIKE ? OR email_autor LIKE ?";
        $param = "%$busqueda%";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("ss", $param, $param);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<h2>" . htmlspecialchars($row['titulo']) . "</h2>";
                echo "<p><strong>Resumen:</strong> " . htmlspecialchars($row['resumen']) . "</p>";
                echo "<p><strong>Autor:</strong> " . htmlspecialchars($row['nombre_autor']) . " (" . htmlspecialchars($row['email_autor']) . ")</p>";
                echo "<p><strong>Fecha de envío:</strong> " . htmlspecialchars($row['fecha_envio']) . "</p>";
                echo "<hr>";
            }
        } else {
            if ($busqueda !== '') {
                echo "<p>No se encontraron resultados para '" . htmlspecialchars($busqueda) . "'.</p>";
            }
        }
    ?>
</body>
</html>