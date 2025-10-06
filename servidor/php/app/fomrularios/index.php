<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulario</title>
</head>
<body>
  <form action="calcular.php" method="POST">
    <input type="text" name="operando1" id="operando1" placeholder="op1">
    <select name="operador" id="operador">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type="text" name="operando2" id="operando2" placeholder="op2">
    <button type="submit">Calcular</button>
  </form>
</body>
</html>