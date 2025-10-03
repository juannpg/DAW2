<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $edad = 13;
    if ($edad >= 18){?>
      <h1>ERES MAYOR DE EDAD</h1>
      <p>yupiii tienes <?= $edad ?></p>
    <?php } else {?>
      <h1>ERES MENOR DE EDAD</h1>
      <p>ups tienes <?= $edad ?> aun asi eres muy madura para tu edad</p>
    <?php }
  ?>
</body>
</html>