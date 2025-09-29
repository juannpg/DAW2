<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>codigo ascii</title>
</head>
<body>
  <table>
    <tr>
      <th>numero</th>
      <th>codigo</th>
    </tr>
    <?php
      for ($i = 32; $i < 128; $i++) {
        printf("
          <tr>
            <td>%d</td>
            <td>%c</td>
          </tr>",
          $i, $i);
      }
    ?>
  </table>
</body>
</html>