<?php
  $nombre = $_POST["nombre"] ?? null;
  $password = $_POST["password"] ?? null;

  if ($nombre !== null && $password !== null) {
    if ($nombre === "admin" && $password === "1234") {
      header(header: "Location: bienvenida.php?nombre=" . $nombre);
      exit();
    } else {
      echo '<h1 style="color: red">Credenciales incorrectas</h1>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>redirigir</title>
</head>
<body>
  <form action="redirigir.php" method="POST">
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="password" name="password" id="passowrd" placeholder="Password">
    <button type="submit">Login</button>
  </form>
</body>
</html>