<?php
  function numeroRacional(int | string $numerador = 1, int $denominador = 1): string {
    if (is_string($numerador)) {
      $valores = explode("/", $numerador);
      $numerador = $valores[0];
      $denominador = $valores[1];
    }

    return "$numerador/$denominador";
  }

  $r1 = numeroRacional(1, 6); // 1/6
  $r2 = numeroRacional(20); // 20/1
  $r3 = numeroRacional("7/8"); // "7/8"
  $r4 = numeroRacional(); // 1/1
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sobrecarga</title>
</head>
<body>
  <?= $r1 ?>
  <br />
  <?= $r2 ?>
  <br />
  <?= $r3 ?>
  <br />
  <?= $r4 ?>
</body>
</html>