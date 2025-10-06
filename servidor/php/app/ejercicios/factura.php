<?php
  $cliente = "Juan Pérez";
  $fecha = date("d/m/Y");
  $factura = 1;
  $producto1 = "Cuadros";
  $precio1 = rand(1, 100);
  $producto2 = "Luminarias intensas";
  $precio2 = rand(1, 100);
  $total = $precio1 + $precio2;
  
  const ANCHURA = 42;

  const INDENT = ANCHURA / 2;
  const INDENT_DECIMALES = INDENT - 1;

  $facturaFormatted = str_pad(
    "factura numero $factura",
    ANCHURA,
    " ",
    STR_PAD_BOTH
  );

  $producto1Formatted = sprintf(
    "%-".INDENT."s %".INDENT_DECIMALES.".2f",
    $producto1, $precio1
  );
  $producto2Formatted = sprintf(
    "%-".INDENT."s %".INDENT_DECIMALES.".2f",
    $producto2, $precio2
  );
  $totalFormatted = sprintf(
    "%-".INDENT."s %".INDENT_DECIMALES.".2f",
    "total", $total
  );

  $linea = str_pad(
    "",
    ANCHURA,
    "="
  );
  
  $html = <<<HTML
    <p>$linea</p>
    <p>$facturaFormatted</p>
    <p>$linea</p>
    <p>$producto1Formatted</p>
    <p>$producto2Formatted</p>
    <p>$linea</p>
    <p>$totalFormatted</p>
  HTML;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>factura</title>
</head>
<body>
  <pre><?= $html ?></pre>
</body>
</html>