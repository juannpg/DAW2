<?php
  require_once "./Racional.php";

  $entradaRacional = $_POST["entradaRacional"] ?? "";
  $racional1 = new Racional($entradaRacional);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>validar racional</title>
</head>
<body>
  <form action="validar.php" method="POST">
    <input
      type="text"
      placeholder="numero racional (x/y)"
      name="entradaRacional"
      value="<?= $entradaRacional ?>"
    />
    <button type="submit">Calcular</button>
  </form>
  <h2>Has introducido el numero: <?= $racional1 ?></h2>
</body>
</html>