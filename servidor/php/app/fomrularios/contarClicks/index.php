<?php
  $clicks = $_POST["contador"] ?? 0;

  if (isset($_POST["submit"])) {
    $clicks++;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>contar clicks</title>
  </head>
  <body>
    <form action="index.php" method="POST">
      <fieldset>
        <legend>contador de clicks</legend>
        <button type="submit" name="submit" value="click">Click</button>
        
        <h1>
          has hecho
          <input
            style="border: none; width: 30px;"
            type="text"
            name="contador"
            id="contador"
            value="<?= $clicks ?>"
            readonly
          >clicks
        </h1>
        
      </fieldset>
    </form>
  </body>
</html>
