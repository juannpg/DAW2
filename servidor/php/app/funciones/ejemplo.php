<?php
  function mayor(int | string $n1, int | string $n2): int | string {
    if (is_string($n1) || is_string($n2)) {
      $mayor = $n1 > $n2 ? $n2 : $n1;
    } else {
      $mayor = $n1 > $n2 ? $n1 : $n2;
    }
    return $mayor;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mayor</title>
</head>
<body>
  <?php
    $a = 5;
    $b = 10;
    $resultado = mayor($a, $b);
    echo "<h1>El mayor entre $a y $b es $resultado</h1>";

    $c = "maria";
    $d = "juan";
    $resultado = mayor($c, $d);
    echo "<h1>El mayor entre $c y $d es $resultado</h1>";
  ?>
</body>
</html>