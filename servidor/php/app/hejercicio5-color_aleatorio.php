<?php
  $h = rand(1,6);

  $rojo = dechex(rand(00,255));
  $verde = dechex(rand(00,255));
  $azul = dechex(rand(00,255));

  if (hexdec($rojo) < 15) {
    $rojo = "0".$rojo;
  }
  
  if (hexdec($verde) < 15) {
    $verde = "0".$verde;
  }
  
  if (hexdec($azul) < 15) {
    $azul = "0".$azul;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>color aleatorio</title>
</head>
<body>
  <?php
    echo "<h$h style='color: #$rojo$verde$azul;'>Color random - $rojo$verde$azul - con h$h</h$h>";
  ?>
</body>
</html>