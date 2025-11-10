<?php
$carga = fn($clase) => require_once "./$clase.php";
spl_autoload_register($carga);

$entrada1 = $_POST["racional1"] ?? "";
$entrada2 = $_POST["racional2"] ?? "";
$operacion = $_POST["operacion"] ?? "";

$resultado = "";
$resultadoSimplificado = "";

if ($entrada1 !== "" && $entrada2 !== "" && $operacion !== "") {
  $r1 = new Racional($entrada1);
  $r2 = new Racional($entrada2);

  switch ($operacion) {
    case "sumar":
      $resultado = Racional::sumar($r1, $r2);
      break;
    case "restar":
      $resultado = Racional::restar($r1, $r2);
      break;
    case "multiplicar":
      $resultado = Racional::multiplicar($r1, $r2);
      break;
    case "dividir":
      $resultado = Racional::dividir($r1, $r2);
      break;
  }

  if ($resultado !== "") {
    $resultadoSimplificado = $resultado->simplificar();
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Calculadora de Racionales</title>
</head>
<body>
  <h1>Calculadora de Números Racionales</h1>
  <form method="POST" action="calculadora.php">
    <input
      type="text"
      name="racional1"
      placeholder="Primer racional (x/y)"
      value="<?= $entrada1 ?>"
      required
    />
    <select name="operacion" required>
      <option value="sumar" <?= $operacion === "sumar" ? "selected" : "" ?>>+</option>
      <option value="restar" <?= $operacion === "restar" ? "selected" : "" ?>>-</option>
      <option value="multiplicar" <?= $operacion === "multiplicar" ? "selected" : "" ?>>*</option>
      <option value="dividir" <?= $operacion === "dividir" ? "selected" : "" ?>>÷</option>
    </select>
    <input
      type="text"
      name="racional2"
      placeholder="Segundo racional (x/y)"
      value="<?= $entrada2 ?>"
      required
    />
    <button type="submit">Calcular</button>
  </form>

  <h2>Resultado: <?= $resultado ?? "" ?></h2>
  <h3>Resultado simplificado: <?= $resultadoSimplificado ?? "" ?></h3>
</body>
</html>
