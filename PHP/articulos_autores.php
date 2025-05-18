<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Articulos</title>

</head>
<body class = "section">
    <div class="columns">
        <div class="column is-one-third">
            <h1 class="titulosLeft">Introduzca datos del nuevo artículo</h1>  
            <form action="procesar_articulo.php" method="POST">
                <div class="field">
                    <label class="label">Título del artículo</label>
                    <div class="control">
                        <input class="input" type="text" name="titulo" placeholder="Introduzca título" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Resumen del artículo</label>
                    <div class="control">
                        <input class="input" type="text" name="resumen" placeholder="Resumen (máx. 150 caracteres)" maxlength="150" required>
                    </div>
                </div>

                <input type="hidden" name="fecha_envio" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <input type="hidden" name="contacto_autor" value="<?php echo $_SESSION['email']; ?>">

                <div class="field">
                    <div class="control">
                        <button class="button is-link is-rounded" type="submit">Registrar artículo</button>
                    </div>
                </div>
            </form>
            <br>
                <div>
                    <a href="opciones.php">
                    <button class="button is-succes is-rounded">Volver</button>
                    </a>
                </div>
        </div>

        <!-- Columna derecha: Tabla -->
        <div class="column is-half">
            <h2 class="title is-4">Artículos registrados</h2>

            <!--Formulario para buscar -->
            <form action="buscar_articulo.php" method="GET" class="mb-4">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" name="search" placeholder="Buscar artículo por título o autor" required>
                    </div>
                    <div class="control">
                        <button class="button is-info" type="submit">
                            <span class="icon"><i class="fas fa-search"></i></span>
                        </button>

                    </div>
                </div>
            </form>
            <table class="table is-striped is-bordered is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Resumen</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conexion.php");
                    $result = mysqli_query($conexion, "SELECT * FROM articulo");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $row['articulo_ID'] ?></td>
                            <td><?= htmlspecialchars($row['titulo']) ?></td>
                            <td><?= $row['fecha_envio'] ?></td>
                            <td><?= htmlspecialchars($row['resumen']) ?></td>
                            <td><?= htmlspecialchars($row['contacto_autor']) ?></td>
                            <td>
                                <a class="button is-small is-info" href="editar_articulo.php?id=<?= $row['articulo_ID'] ?>">
                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                </a>
                                <a class="button is-small is-danger" href="eliminar_articulo.php?id=<?= $row['articulo_ID'] ?>">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                </a>
                                <a class="button is-small is-primary" href="leer_articulo.php?id=<?= $row['articulo_ID'] ?>">
                                    <span class="icon"><i class="fas fa-book-open"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>
</html>