<?php
  $NOMBRE = htmlspecialchars($_GET["nombre"] ?? "");
  if ($NOMBRE === "") {
    header("Location: redirigir.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hola</title>
</head>
<body>
  <h1>Hola <?= $NOMBRE ?></h1>
  <a href="redirigir.php">Volver</a>
</body>
</html>