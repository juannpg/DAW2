<?php
  $datos = $_POST["datos"] ?? null;
  $nombrePost = $_POST["nombre"] ?? "";
  $numeroPost = $_POST["numero"] ?? "";

  $textoError = "";

  $botonEliminarTodos = $_POST["eliminarTodos"] ?? null;
  $botonSubmit = $_POST["submit"] ?? null;

  if (isset($botonEliminarTodos) && isset($datos)) {
    foreach ($datos as $nombre => $_) {
      unset($datos[$nombre]);
    }
  }

  if (isset($botonSubmit)) {
    if ($nombrePost !== "" && $numeroPost !== "") {
      $datos[$nombrePost] = $numeroPost;
    } else if ($nombrePost !== "" && $numeroPost === "") {
      if (isset($datos[$nombrePost])) {
        unset($datos[$nombrePost]);
      } else {
        $textoError .= "<br />debes introducir un numero para el nuevo contacto $nombrePost<br />";
      }
    } else {
      $textoError .= "<br />Debes introducir un nombre";
    }
  }

  $mostrarDatos = function() use ($datos): string {
    $html = "";
    
    if (isset($datos)) {
      foreach ($datos as $nombre => $numero) {
        $html .= "<input type=\"hidden\" name=\"datos[$nombre]\" value=\"$numero\" />";
        $html .= "<h2>$nombre - $numero</h2>";
      }
    } else {
      $html .= "<br />agenda vacia";
    }
      
    return $html;
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>agenda</title>
</head>
<body>
  <form action="agenda.php" method="POST">
    <h1>Agenda</h1>
    <input type="text" name="nombre" id="nombre" placeholder="nombre">
    <input type="text" name="numero" id="numero" placeholder="numero">
    <?php
      echo $mostrarDatos();
      echo "<p style=\"color: red;\">$textoError</p>";
    ?>
    <button type="submit" name="submit" value="submit">Agregar</button>
    <button name="eliminarTodos" value="eliminarTodos">Eliminar todos los contactos</button>
  </form>
</body>
</html>