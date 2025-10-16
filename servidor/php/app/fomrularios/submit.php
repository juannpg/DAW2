<?php
  $opcion = $_POST["submit"] ?? null;
  $msj = match($opcion) {
    "acceder" => "Has accedido",
    "borrar" => "Has borrado",
    "listar" => "Has listado",
    default => "Has venido flow get"
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>submit</title>
</head>
<body>
  <form action="submit.php" method="POST">
    <fieldset>
      <legend>Datos</legend>
      <button type="submit" value="acceder" name="submit">Acceder</button>
      <button type="submit" value="borrar" name="submit">Borrar</button>
      <button type="submit" value="listar" name="submit">Listar</button>
    </fieldset>
  </form>
  <h1><?= $msj ?></h1>
</body>
</html>