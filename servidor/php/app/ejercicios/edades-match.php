<?php
  $edad = rand(1, 120);
  $msj = match (true) {
    $edad < 4 => "eres un bebe",
    $edad < 12 => "eres un niño",
    $edad < 18 => "eres un adolescente",
    $edad < 31 => "eres un joven",
    $edad < 61 => "eres un adulto",
    $edad < 91 => "eres un experimentado",
    default => "eres un suertudo"
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edades</title>
</head>
<body>
  <h1><?php echo "Tienes $edad años y eres un $msj" ?></body></h1>
</body>
</html>