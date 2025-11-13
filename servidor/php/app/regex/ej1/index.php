<?php
  $carga = fn($clase) => require_once "./$clase.php";
  spl_autoload_register($carga);

  $cadena = $_POST['cadena'] ?? '';
  $regex = $_POST['regex'] ?? '';
  
  if (isset($_POST['submit'])) {
    if ($cadena === '' || $regex === '') {
      $html = "debes introducir ambos valores";
    } else {
      $html = RegEx::validar($regex, $cadena) ? 'Sí cumple' : 'No cumple';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cumple??</title>
</head>
<body>
  <form action="index.php" method="POST">
    <input type="text" placeholder="cadena" name="cadena" value="<?= $cadena ?>">
    <input type="text" placeholder="regex" name="regex" value="<?= $regex ?>">
    <button type="submit" name="submit">Validar</button>
    <h1><?= $html ?? '' ?></h1>
  </form>
</body>
</html>