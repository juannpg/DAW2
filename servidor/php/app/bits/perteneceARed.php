<?php
  $ip1 = $_POST['ip1'] ?? null;
  $ip2 = $_POST['ip2'] ?? null;
  $ip3 = $_POST['ip3'] ?? null;
  $ip4 = $_POST['ip4'] ?? null;

  $mascara1 = $_POST['mascara1'] ?? null;
  $mascara2 = $_POST['mascara2'] ?? null;
  $mascara3 = $_POST['mascara3'] ?? null;
  $mascara4 = $_POST['mascara4'] ?? null;

  if (
    isset(
      $ip1,
      $ip2,
      $ip3,
      $ip4,
      $mascara1,
      $mascara2,
      $mascara3,
      $mascara4
    )
  ) {
    $red1 = $ip1 & $mascara1;
    $red2 = $ip2 & $mascara2;
    $red3 = $ip3 & $mascara3;
    $red4 = $ip4 & $mascara4;

    $msj = "La dirección IP $ip1.$ip2.$ip3.$ip4 pertenece a la red $red1.$red2.$red3.$red4";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pertenece</title>
</head>
<body>
  <form action="perteneceARed.php" method="POST">
    <div>
      <label>Dirección IP:</label>
      <input type="number" name="ip1" id="ip1" min="0" max="255" required value=<?= $ip1 ?>  >
      .
      <input type="number" name="ip2" id="ip2" min="0" max="255" required value=<?= $ip2 ?>  >
      .
      <input type="number" name="ip3" id="ip3" min="0" max="255" required value=<?= $ip3 ?>  >
      .
      <input type="number" name="ip4" id="ip4" min="0" max="255" required value=<?= $ip4 ?>  >
    </div>
    <div>
      <label>Máscara de red:</label>
      <input type="number" name="mascara1" id="mascara1" min="0" max="255" required value=<?= $mascara1 ?? 255 ?>  >
      .
      <input type="number" name="mascara2" id="mascara2" min="0" max="255" required value=<?= $mascara2 ?? 255 ?>  >
      .
      <input type="number" name="mascara3" id="mascara3" min="0" max="255" required value=<?= $mascara3 ?? 255 ?>  >
      .
      <input type="number" name="mascara4" id="mascara4" min="0" max="255" required value=<?= $mascara4 ?? 255 ?>  >
    </div>
    <input type="submit" value="Comprobar">
  </form>
  <h2><?= $msj ?? "" ?></h2>
</body>
</html>