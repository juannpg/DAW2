<?php
  $clicks = $_POST["clicks"] ?? [];
  $nombrePost = $_POST["nombre"] ?? "";
  
  $msj = "";
  
  if ($nombrePost !== "") {
    isset($clicks[$nombrePost])
      ? $clicks[$nombrePost]++
      : $clicks[$nombrePost] = 1;

    foreach ($clicks as $nombre => $numero) {
      $msj .= " <br />$nombre - $numero";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>click</title>
</head>
<body>
  <form action="click.php" method="POST">
    <input type="text" name="nombre" id="nombre" value="<? $nombrePost ?>">
    <input type="submit" value="Click">
    <?php if (!empty($clicks)): ?>
      <?php foreach ($clicks as $n => $v): ?>
        <input type="hidden" name="clicks[<?= $n ?>]" value="<?= $v ?>">
      <?php endforeach; ?>
    <?php endif; ?>
    <?= $msj ?>
  </form>
</body>
</html>
