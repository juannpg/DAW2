<?php
  $a = 14;
  $b = 38;
  $resultado = 0;

  echo "mcd entre $a y $b";

  function mcdRecursivo(int $x, int $y): int {
    return $y == 0 ? $x : mcdRecursivo($y, $x % $y);
  }

  echo "<br />El MCD es con funcion recursiva: " . mcdRecursivo($a, $b);

  $a = 14;
  $b = 38;

  $mcdVariable = function(int $x, int $y) use (&$mcdVariable): int {
    return $y == 0 ? $x : $mcdVariable($y, $x % $y);
  };

  echo "<br />El MCD es con funcion variable: " . $mcdVariable($a, $b);

  $a = 14;
  $b = 38;

  function mcdNormal(int $x, int $y): int {
    while($y != 0) {
      $resto = $x % $y;
      $x = $y;
      $y = $resto;
    }
    return $x;
  }

  echo "<br />El MCD es con funcion normal: " . mcdNormal($a, $b);
?>