<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TABLA NUMEROS</title>
</head>
<body>
  <table>
    <tr>
      <th>decimal</th>
      <th>binario</th>
      <th>octal</th>
      <th>hexadecimal</th>
    </tr>
    <?php
    for ($i = 0; $i <= 16; $i++) {
      // $binario = decbin($i);
      // $octal = decoct($i);
      // $hexadecimal = dechex($i);
      
      // echo "<tr>";
      // echo "<td>$i</td>";
      // echo "<td>$binario</td>";
      // echo "<td>$octal</td>";
      // echo "<td>$hexadecimal</td>";
      // echo "</tr>";

      printf("
        <tr>
          <td>%d</td>
          <td>%b</td>
          <td>%o</td>
          <td>%x</td>
        </tr>",
        $i, $i, $i, $i);
    }
    ?>
  </table>
</body>
</html>