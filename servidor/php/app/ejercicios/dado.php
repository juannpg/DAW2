<?php
  $intentos = 1000000;
  $veces1 = 0;
  $veces2 = 0;
  $veces3 = 0;
  $veces4 = 0;
  $veces5 = 0;
  $veces6 = 0;;

  for ($i = 0; $i < $intentos; $i++) {
    $dado = rand(0, 5);
    match ($dado) {
      0 => $veces1++,
      1 => $veces2++,
      2 => $veces3++,
      3 => $veces4++,
      4 => $veces5++,
      5 => $veces6++,
    };
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dado</title>
</head>
<body>
  <?php
    printf("
    <h1>Resultados de lanzar un dado %d veces</h1>
    <p>El 1 ha salido %d veces</p>
    <p>El 2 ha salido %d veces</p>
    <p>El 3 ha salido %d veces</p>
    <p>El 4 ha salido %d veces</p>
    <p>El 5 ha salido %d veces</p>
    <p>El 6 ha salido %d veces</p>",
    $intentos, $veces1, $veces2, $veces3, $veces4, $veces5, $veces6
    );
  ?>
</body>
</html>