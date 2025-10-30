<?php
  $productos = [
      'lechuga' => ['unidades' => 200,
                    'precio' => 0.90],
      'tomates' => ['unidades' => 2000,
                  'precio' => 2.15],
      'cebollas' => ['unidades' => 3200,
                    'precio' => 0.49],
      'fresas' => ['unidades' => 4800,
                  'precio' => 4.50],
      'manzanas' => ['unidades' => 2500,
                    'precio' => 2.10],
  ];

  $mostrarFormulario = function(array $productos): string {
    $html = "
      <form action=\"verduderia.php\" method=\"POST\">
      <div style=\"display: flex; flex-direction: row;\">
    "; 
    foreach ($productos as $p => $props) {
      $html .= "
        <div>
          <h2>$p</h2>
          <p>Unidades: {$props['unidades']}</p>
          <p>Precio por unidad: {$props['precio']}€</p>
          <input type=\"number\" placeholder=\"cantidad $p\" name=\"cantidad_$p\"/>
        </div>
      ";
    }
    $html .= "
        </div>
        <button type=\"submit\" name=\"submit\">Comprar</button>
      </form>
    ";

    return $html;
  };

  $mostrarInventario = function() use ($productos): string {
    $html = "";
    
    foreach ($productos as $p => &$props) {
      if (isset($_POST["cantidad_$p"]) && $_POST["cantidad_$p"] > 0) {
        $cantidad = $_POST["cantidad_$p"];
        $props['unidades'] = (int) $props['unidades'] - (int) $cantidad;
      } 
    }

    foreach ($productos as $p => $props) {
      $html .= "
        <div>
          <h2>$p</h2>
          <p>Unidades: {$props['unidades']}</p>
          <p>Precio por unidad: {$props['precio']}€</p>
        </div>
      ";
    }

    return $html;
  };

  $mostrarFactura = function() use ($productos): string {
    $html = "<h1>-----------FACTURA------------- </h1>";
    $total = 0;

    foreach ($productos as $p => &$props) {
      if (isset($_POST["cantidad_$p"]) && $_POST["cantidad_$p"] > 0) {
        $cantidad = $_POST["cantidad_$p"];
        $precio = (int) $cantidad * $props["precio"];
        $total += $precio;

        $html .= "
          <div>
            <h2>$p</h2>
            <p>Unidades compradas: $cantidad</p>
            <p>Precio: $precio €</p>
          </div>
        ";
      } 
    }

    $html .= "
      <h3>total: $total €</h3>
    ";

    $html .= "<a href=\"verduderia.php\">Volver</a>"; 

    return $html;
  };

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>verduderia</title>
</head>
<body>
  <?php
    if (isset($_POST['submit'])) {
      echo $mostrarInventario();
      echo $mostrarFactura();
    } else {
      echo $mostrarFormulario($productos);
    }
  ?>
</body>
</html>