function factorial(num) {
  if (num === 0 || num === 1) return 1;
  return num * factorial(num - 1);
}

const n = prompt("Ingrese un número");

if (isNaN(n)) {
  alert("El valor ingresado no es un número");
} else if (n < 0) {
  alert("No se puede calcular el factorial de un número negativo");
} else {
  const resultado = factorial(Number(n));
  document.getElementById(
    "slot"
  ).innerHTML = `El factorial de ${n} es ${resultado}`;
}
