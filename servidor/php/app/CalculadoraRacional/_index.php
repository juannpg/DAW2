<?php
  require_once "./Racional.php";

  $racional1 = new Racional(7, 9);
  $racional2 = new Racional();
  $racional3 = new Racional(25);
  $racional4 = new Racional("8/7");

  echo "valor de racional1 $racional1<br />";
  echo "valor de racional2 $racional2<br />";
  echo "valor de racional3 $racional3<br />";
  echo "valor de racional4 $racional4<br />";
?>