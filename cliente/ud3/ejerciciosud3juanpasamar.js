//ej 1
document.getElementById("ej1").addEventListener("click", window.history.back());

//ej 2
document
  .getElementById("ej2")
  .addEventListener(
    "click",
    window.open("www.vairalize.vercel.app", "vairalize")
  );

//ej 3
let noPrimos = 0;
let multiplos = [];

function esPrimo(num) {
  if (num <= 1) return false;
  for (let i = 2; i <= Math.sqrt(num); i++) {
    if (num % i === 0) return false;
  }
  return true;
}

for (let i = 1; i <= 500; i++) {
  if (i % 3 === 0) {
    multiplos.push(i);
  }
  if (!esPrimo(i)) {
    noPrimos++;
  }
}

console.log("Múltiplos de 3:", multiplos);
console.log("Número de números no primos:", noPrimos);

//ej 4
const arrayEj4 = [12, 8, 130, 44, 2, 1, 99, 7, 23, 67];
let mayorEj4 = arrayEj4[0];
let menorEj4 = arrayEj4[0];

for (let i = 1; i < arrayEj4.length; i++) {
  if (arrayEj4[i] > mayorEj4) {
    mayorEj4 = arrayEj4[i];
  }
  if (arrayEj4[i] < menorEj4) {
    menorEj4 = arrayEj4[i];
  }
}

console.log("Número mayor:", mayorEj4);
console.log("Número menor:", menorEj4);

//ej5
const promptEj5 = prompt("talla europea: ").trim().toLowerCase();
if (promptEj5 === "s" || promptEj5 === "xs" || promptEj5 === "xxs") {
  console.log("talla pequeña");
} else if (promptEj5 === "m") {
  console.log("talla mediana");
} else if (promptEj5 === "l" || promptEj5 === "xl" || promptEj5 === "xxl") {
  console.log("talla grande");
} else {
  console.log("talla no reconocida");
}

//ej 6
const promptEj6 = parseInt(prompt("ingrese un radio: "));
const longitud = 2 * Math.PI * promptEj6;
console.log("la longitud es: " + longitud);

//ej 7
const numerosEj7 = [];
const estrellasEj7 = [];

while (numerosEj7.length < 5) {
  const num = Math.ceil(Math.random() * 50);
  if (!numerosEj7.includes(num)) {
    numerosEj7.push(num);
  }
}

while (estrellasEj7.length < 2) {
  const estrella = Math.ceil(Math.random() * 10);
  if (!estrellasEj7.includes(estrella)) {
    estrellasEj7.push(estrella);
  }
}

console.log("Números: " + numerosEj7.join(", "));
console.log("Estrellas: " + estrellasEj7.join(", "));

//ej8
const filasEj9 = parseInt(prompt("Ingrese el número de filas: "));
const columnasEj9 = parseInt(prompt("Ingrese el número de columnas: "));

for (let i = 1; i <= filasEj9; i++) {
  for (let j = 1; j <= columnasEj9; j++) {
    console.log(`(${i},${j})`);
  }
}

//ej9
// que script de la calculadora???
