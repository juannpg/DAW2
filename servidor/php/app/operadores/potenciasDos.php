<?php
  $elevadoDesaplazado = "";
  for ($i = 0; $i < 10; $i++) {
    $potencia = 1 << $i;
    $elevadoDesaplazado .= "2<sup>$i</sup> = $potencia<br>";
  }

  $elevadoNormal = "";
  for ($i = 0; $i < 10; $i++) {
    $potencia = 2 ** $i;
    $elevadoNormal .= "2<sup>$i</sup> = $potencia<br>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>potencias de dos</title>
</head>
<body>
  <h1>Elevado con desplazamiento</h1>
  <?= $elevadoDesaplazado ?>
  <h1>Elevado con potencia</h1>
  <?= $elevadoNormal ?>
</body>
</html>