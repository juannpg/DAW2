<?php
  $num = 0;
  $resultado = 0;
  $contador = 0;
  while ($contador < 100) {
    if ($num % 2 == 0) {
      $resultado += $num;
      $contador++;
    }
    $num++;
  }

  $suma = 0;
  for ($i = 0; $i < 100; $i++) {
    $suma += $i;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>while sumar 100 primeros numeros nuemors pares</title>
</head>
<body>
  <h2><?php echo "el resultado de sumar los 100 primeros numeros pares es (while): $resultado";?></h2>
  <h2><?php echo "el resultado de sumar los 100 primeros numeros es (for): $suma";?></h2>
</body>
</html>