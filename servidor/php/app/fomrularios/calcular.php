<?php
  $operando1 = $_POST["operando1"];
  $operando2 = $_POST["operando2"];
  $operador = $_POST["operador"];

  $resultado = match ($operador) {
    '+' => $operando1 + $operando2,
    '-' => $operando1 - $operando2,
    '*' => $operando1 * $operando2,
    '/' => $operando2 != 0 ? $operando1 / $operando2 : 'Error: División por cero',
    default => 'Operador no válido',
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>datos</title>
</head>
<body>
  <h1>EL RESULTADO ES <?= $resultado ?></h1>
</body>
</html>