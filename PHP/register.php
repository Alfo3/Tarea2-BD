<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
</head>
<body class="section">
        <div class="has-text-right">
        <img src="../img/Logo .png" alt="Logo del sitio" style="max-height: 200px;">
        </div>
        <div class="container">
        <form action="procesar_register.php" method="POST">

            <div class="field">
                <h1 class="titulos">Registro de Usuario</h1>
                
                <label class = "label" for ="register_rut">Rut:</label>
                <p class="control has-icons-left"> 
                    <input class = "input" type="text" id="register_rut" name="rut" placeholder="Ingrese su rut" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </p>
                </div>

            <div class="field">
                <label class = "label" for="register_username">Usuario:</label>
                <p class="control has-icons-left"> 
                    <input class = "input" type="text" id="register_username" name="username" placeholder = "Ingrese el usuario" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </p>
                </div>
                
            <div class="field">
                <label class = "label" for="register_password">Contraseña:</label>
                <p class="control has-icons-left">                      
                    <input class = "input" type="password" id="register_password" name="password" placeholder = "Ingrese constrasena" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </p>
                    </div>

            <div class="field">
                <label class = "label" for="register_role">Rol:</label>  
                <p class="control has-icons-left"> 
                <p class="select is-fullwidth">    
                <select id="register_role" name="role" required>
                    <option value="" disabled selected hidden>Seleccione un rol</option>
                    <option value="autor">Autor</option>
                    <option value="revisor">Revisor</option>
                </select>
                </span>
            </div>

            <div class="field">
                <label class = "label" for="register_email">Email:</label>
                <p class="control has-icons-left"> 
                    <input class = "input" type ="email" id="register_email" name="email" placeholder = "Ingrese Email" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </p>
                    </div>

            <br>
            <button class="button is-Iniciar Sesión is-rounded" type = "submit" >Registrarse</button>
    </form>
</body>
</html>