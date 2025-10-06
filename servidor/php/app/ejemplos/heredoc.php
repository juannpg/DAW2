<?php
  $nombre = "juan";
  $texto = <<<FIN
  select nombre, edad
  from usuarios
  where nombre = "$nombre" 
  FIN;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    echo "<pre>$texto</pre>";
  ?>
</body>
</html>