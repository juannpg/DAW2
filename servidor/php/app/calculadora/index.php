<?php
  $_ = fn($__) => require_once "./$__.php";
  spl_autoload_register($_);
  
  $operacion = $_POST['operacion'] ?? null;
  $operando1Print = null;
  $operando2Print = null;
  $operadorPrint = null;
  $tipoOperacion = null;
  $resultado = '';

  if (isset($_POST['submit'])) {
    $tipoOperacion = Operacion::tipoOperacion($operacion);
    switch ($tipoOperacion) {
      case 'real':
        $operacionObj = new OperacionReal($operacion);
        $resultado = $operacionObj->operar();
        $operando1Print = $operacionObj->getOperando1();
        $operando2Print = $operacionObj->getOperando2();
        $operadorPrint = $operacionObj->getOperador();
        break;
      case 'racional':
        $operacionObj = new OperacionRacional($operacion);
        $resultado = $operacionObj->operar();
        $operando1Print = $operacionObj->getOperando1();
        $operando2Print = $operacionObj->getOperando2();
        $operadorPrint = $operacionObj->getOperador();
        break;
      default:
        $resultado = "Operación no válida";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>calculadora</title>
</head>
<body>
  <form action="index.php" method="POST">
    <input type="text" name="operacion" id="operacion" placeholder="Ingrese operacion" value ="<?= $operacion ?? '' ?>">
    <button type="submit" name="submit">Calcular</button>
    <h3>Resultado: <?= $resultado ?? '' ?></h3>
    <p>Operando1: <?= $operando1Print ?? '' ?></p>
    <p>Operando2: <?= $operando2Print ?? '' ?></p>
    <p>Operador: <?= $operadorPrint ?? '' ?></p>
    <p>Tipo de Operación: <?= $tipoOperacion ?? '' ?></p>
  </form>
</body>
</html>