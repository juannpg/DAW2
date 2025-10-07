const n1 = prompt("Ingrese un numero");
const n2 = prompt("Ingrese otro numero");

if (n1 > n2) {
  alert(n1 + " es mayor que " + n2);
} else if (n1 < n2) {
  alert(n2 + " es mayor que " + n1);
} else {
  alert("Los numeros son iguales");
}

if (n1 > 0) {
  alert(n1 + " es positivo");
} else if (n1 < 0) {
  alert(n1 + " es negativo");
} else {
  alert(n1 + " es cero");
}

if (n2 > 0) {
  alert(n2 + " es positivo");
} else if (n2 < 0) {
  alert(n2 + " es negativo");
} else {
  alert(n2 + " es cero");
}
