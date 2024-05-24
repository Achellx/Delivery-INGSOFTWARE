<?php
include 'Configuracion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito de Compras</title>
    <meta charset="utf-8">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            padding: 20px;
        }

        .cart-link {
            width: 100%;
            text-align: right;
            display: block;
            font-size: 22px;
        }

        .thumbnail {
            border-radius: 10%;
            overflow: hidden;
            padding: 0;
        }

        img {
            width: 100%;
            padding: 0 !important;
            margin: 0 auto;
        }

        .thumbnail {
            transition-duration: .3s;
            transition-property: all;
        }

        .thumbnail:hover {
            transform: translateY(-2px);
            cursor: pointer;
            box-shadow: 0 12px 20px rgba(0,0,0,.04);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active bg-success" href="index.php"><i class="bi bi-house-door-fill"></i>
                            Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="VerCarta.php"><i class="bi bi-cart-fill"></i> Carrito de
                            Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="Pagos.php"><i class="bi bi-credit-card-fill"></i>
                            Pagar</a>
                    </li>
                </ul>
            </div>

            <div class="card-body ">
                <h1>Todos los pedidos</h1>
                <a href="VerCarta.php" class="cart-link" title="Ver Carta">
                    <i class="bi bi-basket2-fill text-success"></i>
                </a>
                <div id="products" class="d-flex flex-wrap">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            ?>
                            <div class="item col-lg-4">
                                <div class="card thumbnail shadow m-1">
                                    <img src="<?php echo $row["image_path"]; ?>" class="card-img-top"
                                        alt="<?php echo $row["name"]; ?>"> <!-- Aquí se agrega la imagen -->
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                                        <p class="card-text"><?php echo $row["description"]; ?></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="fw-bolder lead text-success">
                                                    <?php echo '$' . $row["price"] . ' MX'; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-success"
                                                    href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>"><i
                                                        class="bi bi-plus-circle"></i></i> Enviar al Carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p>Producto(s) no existe.....</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>