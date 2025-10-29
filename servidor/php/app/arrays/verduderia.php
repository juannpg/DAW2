<?php
  $productos = [
      'lechuga' => ['unidades' => 200,
                    'precio' => 0.90],
      'tomates' =>['unidades' => 2000,
                  'precio' => 2.15],
      'cebollas' =>['unidades' => 3200,
                    'precio' => 0.49],
      'fresas' =>['unidades' => 4800,
                  'precio' => 4.50],
      'manzanas' =>['unidades' => 2500,
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

  $mostrarInventario = function(array $productos): string {
    foreach ($productos as $p => $props) {
      if (isset($_PSOT["cantidad_$p"])) {
        $cantidad = $_POST["cantidad_$p"];
        $props['unidades'] -= $cantidad;
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
  }
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
      $mostrarInventario($productos);
      // $mostrarFactura($productos);
    } else {
      echo $mostrarFormulario($productos);
    }
  ?>
</body>
</html>