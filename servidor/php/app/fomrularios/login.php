<?php
  $NOMBRE = htmlspecialchars($_POST["nombre"]);
  $PASASWORD = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
  $EDAD = filter_input(INPUT_POST, "edad", FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <legend>datos personales</legend>
  <h1>Nombre: <?= $NOMBRE ?></h1>
  <h1>Pasasword: <?= $PASASWORD ?></h1>
  <h1>edad: <?= $EDAD ?></h1>
  <a href="login.html">Volver</a>
</body>
</html>