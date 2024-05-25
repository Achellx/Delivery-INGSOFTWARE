<?php
if (!isset($_REQUEST['id'])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="icon" type="url"
    href="https://s3.amazonaws.com/cdn.designcrowd.com/blog/39-Food-Delivery-Logos-That-Will-Leave-You-Hungry-For-More/food-delivery-logo-by-abhishek-choudhary-dribbble.jpg">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
  <title>Orden Completado - PHP Carrito de Compras</title>
  <meta charset="utf-8">
  <style>
    .container {
      padding: 20px;
    }

    p {
      color: #34a853;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active bg-success" href="index.php"><i
                class="bi bi-house-door-fill"></i> Volver</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h1>Estado de tu Requerimiento</h1>
        <p>La Orden se ha enviado exitósamente. El ID de tu pedido es <?php echo $_GET['id']; ?></p>
      </div>
    </div>
  </div>
</body>

</html>