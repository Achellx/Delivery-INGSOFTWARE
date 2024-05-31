<?php
require 'configuracion.php';

$error = '';

if (isset($_POST['login'])) {
    $usuario = $db->real_escape_string($_POST['nombre_user']);
    $contrasena = $db->real_escape_string($_POST['contrasena_user']);

    $sql = $db->prepare("SELECT * FROM usuarios WHERE nombre_user = ? AND contrasena_user = ?");
    $sql->bind_param('ss', $usuario, $contrasena);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows > 0) {
        // Inicio de sesión exitoso
        // Redirigir al index.php
        header("Location: index.php");
        exit();
    } else {
        // Credenciales inválidas
        $error = "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña.";
    }

    $sql->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Página de inicio de sesión</title>
    <meta charset="UTF-8">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="url"
        href="https://s3.amazonaws.com/cdn.designcrowd.com/blog/39-Food-Delivery-Logos-That-Will-Leave-You-Hungry-For-More/food-delivery-logo-by-abhishek-choudhary-dribbble.jpg">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Formulario de inicio de sesión -->
                <form action="" method="POST">
                    <h2 class="mt-5 mb-4">Iniciar sesión</h2>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

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
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-success" name="login">Iniciar sesión</button>
                </form>
                <!-- Enlace para redirigir al formulario de registro -->
                <p class="mt-3">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>