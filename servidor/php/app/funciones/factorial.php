<?php
  function factorial(int $num): int {
    return $num == 0 ? 1 : $num * factorial($num - 1);
  }

  $factorialVariable = function(int $num) use (&$factorialVariable): int {
    return $num == 0 ? 1 : $num * $factorialVariable($num - 1);
  };

  echo factorial(0);
  echo "<br />";
  echo $factorialVariable(5);
?>

