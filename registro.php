<?php
require 'configuracion.php'; // Asegúrate de que este archivo contiene la variable $db para la conexión

if (isset($_POST['registro'])) {
    // Obtener los valores enviados por el formulario
    $usuario = $db->real_escape_string($_POST['nombre_user']);
    $contrasena = $db->real_escape_string($_POST['contrasena_user']);
    $correo = $db->real_escape_string($_POST['correo_user']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre_user, contrasena_user, correo_user) VALUES ('$usuario', '$contrasena', '$correo')";
    $resultado = mysqli_query($db, $sql);

    if ($resultado) {
        // Inserción correcta
        header("Location: index.php");
        exit();
    } else {
        // Inserción fallida
        echo "¡No se puede insertar la información!" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro de Usuario</title>
    <meta charset="UTF-8">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="url"
        href="https://s3.amazonaws.com/cdn.designcrowd.com/blog/39-Food-Delivery-Logos-That-Will-Leave-You-Hungry-For-More/food-delivery-logo-by-abhishek-choudhary-dribbble.jpg">e
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Formulario de registro -->
                <form action="registro.php" method="POST">
                    <h2 class="mt-5 mb-4">Registro de Usuario</h2>
                    <!-- Campo de entrada para el nombre de usuario -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nombre_user" name="nombre_user"
                            placeholder="Nombre de usuario" required>
                    </div>
                    <!-- Campo de entrada para la contraseña -->
                    <div class="mb-3">
                        <input type="password" class="form-control" id="contrasena_user" name="contrasena_user"
                            placeholder="Contraseña" required>
                    </div>
                    <!-- Campo de entrada para el correo -->
                    <div class="mb-3">
                        <input type="email" class="form-control" id="correo_user" name="correo_user"
                            placeholder="Correo electrónico" required>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-success" name="registro">Registrar</button>
                </form>

                <p class="mt-3">¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>