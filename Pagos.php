<?php
// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    header("Location: index.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM clientes WHERE id = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pagos</title>
    <meta charset="utf-8">
    <link rel="icon" type="url" href="https://s3.amazonaws.com/cdn.designcrowd.com/blog/39-Food-Delivery-Logos-That-Will-Leave-You-Hungry-For-More/food-delivery-logo-by-abhishek-choudhary-dribbble.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 65%;
            float: left;
        }

        .shipAddr {
            width: 30%;
            float: left;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
            margin-top: 20px;
        }

        .orderBtn {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="bi bi-house-door-fill"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="VerCarta.php"><i class="bi bi-cart-fill"></i> Carrito de Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-success" href="Pagos.php"><i class="bi bi-credit-card-fill"></i> Pagar</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <h1>Vista previa de la Orden</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                        ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo '$' . $item["price"] . ' MX'; ?></td>
                                    <td><?php echo $item["qty"]; ?></td>
                                    <td><?php echo '$' . $item["subtotal"] . ' MX'; ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4">
                                    <p>No hay artículos en tu carrito......</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' MX'; ?></strong></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
                <div class="shipAddr">
                    <h4>Detalles de envío</h4>
                    <p><?php echo $custRow['name']; ?></p>
                    <p><?php echo $custRow['email']; ?></p>
                    <p><?php echo $custRow['phone']; ?></p>
                    <p><?php echo $custRow['address']; ?></p>
                </div>
                <div class="footBtn">
                    <a href="index.php" class="btn btn-warning"><i class="bi bi-arrow-left"></i> Continuar Comprando</a>
                    <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!--Panek cierra-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>