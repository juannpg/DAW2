<?php
  $edad = rand(1, 120);
  switch (true) {
    case ($edad < 4):
      $msj = "eres un bebe";
      break;
    case ($edad < 12):
      $msj = "eres un niño";
      break;
    case ($edad < 18):
      $msj = "eres un adolescente";
      break;
    case ($edad < 31):
      $msj = "eres un joven";
      break;
    case ($edad < 61):
      $msj = "eres un adulto";
      break;
    case ($edad < 91):
      $msj = "eres un experimentado";
      break;
    default:
      $msj = "eres un suertudo";
  }
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