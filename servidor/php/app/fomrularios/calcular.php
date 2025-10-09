<?php
  $operando1 = $_POST["operando1"];
  $operando2 = $_POST["operando2"];
  $operador = $_POST["operador"];

  if (!is_numeric($operando1) || !is_numeric($operando2)) {
    $output = 'Error: Ambos operandos deben ser números enteros.';
  } else {
    $output = match ($operador) {
      '+' => $operando1 + $operando2,
      '-' => $operando1 - $operando2,
      '*' => $operando1 * $operando2,
      '/' => $operando2 != 0 ? $operando1 / $operando2 : 'Error: División por cero',
      default => 'Operador no válido',
    };
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>datos</title>
</head>
<body>
  <h1><?= $output ?></h1>
</body>
</html>