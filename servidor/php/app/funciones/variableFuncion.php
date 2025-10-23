<?php
  $mayor = function(int $a, int $b): int {
    return match ($a <=> $b) {
      1 => $a,
      -1 => $b,
      default => $a
    };
  };

  $a = 4;
  $b = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>variable function</title>
</head>
<body>
  <h1>El mayor de <?= $a ?> y <?= $b ?> es <?= $mayor($a, $b); ?></h1>
</body>
</html>