const main = document.getElementById("main");

const slot = document.getElementById("slot");
const slot2 = document.getElementById("slot2");
const slot3 = document.getElementById("slot3");
const slot4 = document.getElementById("slot4");
const slot5 = document.getElementById("slot5");
const slot6 = document.getElementById("slot6");
const slot7 = document.getElementById("slot7");
const slot8 = document.getElementById("slot8");
const slot9 = document.getElementById("slot9");
const slot10 = document.getElementById("slot10");

let nombre = prompt("ej1 nacimiento: Ingrese su nombre:");
let apellido = prompt("ej1 nacimiento: Ingrese su apellido:");

let fullName = nombre + " " + apellido;

let diaNacimiento = prompt(
  "ej1 nacimiento: Ingrese el día de su nacimiento (número):"
);
let mesNacimiento = prompt(
  "ej1 nacimiento: Ingrese el mes de su nacimiento (número):"
);
let anioNacimiento = prompt(
  "ej1 nacimiento: Ingrese el año de su nacimiento (número):"
);

let error = false;
if (isNaN(diaNacimiento) || typeof diaNacimiento === "string") {
  error = true;
  main.innerHTML += "<p>ej1: El día que has introducido no es un número</p>";
}

if (isNaN(mesNacimiento) || typeof mesNacimiento === "string") {
  error = true;
  main.innerHTML += "<p>ej1: El mes que has introducido no es un número</p>";
}

if (isNaN(anioNacimiento) || typeof anioNacimiento === "string") {
  error = true;
  main.innerHTML += "<p>ej1: El año que has introducido no es un número</p>";
}

if (!error) {
  let fechaNacimiento = new Date(
    anioNacimiento,
    mesNacimiento - 1,
    diaNacimiento
  );

  let hoy = new Date();
  let edadAnios = hoy.getFullYear() - fechaNacimiento.getFullYear();
  let edadMeses = hoy.getMonth() - fechaNacimiento.getMonth();
  let edadDias = hoy.getDate() - fechaNacimiento.getDate();

  if (edadMeses < 0 || (edadMeses === 0 && edadDias < 0)) {
    edadAnios--;
    edadMeses += 12;
  }

  if (edadDias < 0) {
    let mesAnterior = new Date(hoy.getFullYear(), hoy.getMonth(), 0);
    edadDias += mesAnterior.getDate() + 1;
    edadMeses--;
  }

  main.innerHTML = `
  <h1>Hola, ${fullName}</h1>
  <h2>Tienes ${edadAnios} años, ${edadMeses} meses y ${edadDias} días de vida.</h2>
`;
}

// 2
error = false;
let base = prompt("ej2 exponencial: Ingrese un numero:");
let exponente = prompt("ej2 exponencial: Ingrese un exponente:");

if (isNaN(base) || typeof base === "string") {
  error = true;
  slot.innerHTML = "ej2: El numero introducido no es un numero";
}

if (isNaN(exponente) || typeof exponente === "string") {
  error = true;
  slot.innerHTML = "ej2: El exponente introducido no es un numero";
}

if (!error) {
  const resultadoExp = Math.pow(base, exponente);

  slot.innerHTML = `${base} elevado a ${exponente} es ${resultadoExp}`;
}
//3
let num = prompt("ej3 par o imapr: Ingrese un numero:");
if (isNaN(num) || typeof num === "string") {
  slot2.innerHTML = "ej3: El numero introducido no es un numero";
} else {
  if (num % 2 === 0) {
    slot2.innerHTML = `${num} es par`;
  } else {
    slot2.innerHTML = `${num} es impar`;
  }
}

//4
error = false;
const n1 = prompt("ej4 multiplos: numero 1");
const n2 = prompt("ej4 multiplos: numero 2");
if (isNaN(n1) || typeof n1 === "string") {
  error = true;
  slot3.innerHTML = "ej4: El numero 1 introducido no es un numero";
}
if (isNaN(n2) || typeof n2 === "string") {
  error = true;
  slot3.innerHTML = "ej4: El numero 2 introducido no es un numero";
}

if (!error) {
  if (n1 % n2 === 0 || n2 % n1 === 0) {
    slot3.innerHTML = `${n1} y ${n2} Son multiplos`;
  } else {
    slot3.innerHTML = `${n1} y ${n2} No son multiplos`;
  }
}

//5
const meses = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];

for (let i = 0; i < meses.length; i++) {
  slot4.innerHTML += "mes" + (i + 1) + ": " + meses[i] + "<br>";
}

//6
error = false;
const n3 = prompt("ej6 mayor o menor: Ingrese un numero");
const n4 = prompt("ej6 mayor o menor: Ingrese otro numero");
if (isNaN(n3) || typeof n3 === "string") {
  error = true;
  slot5.innerHTML += "ej6:  numero 1 introducido no es un numero<br />";
}
if (isNaN(n4) || typeof n4 === "string") {
  error = true;
  slot5.innerHTML += "ej6:  numero 2 introducido no es un numero";
}

if (!error) {
  if (n3 > n4) {
    slot5.innerHTML = n3 + " es mayor que " + n4;
  } else if (n3 < n4) {
    slot5.innerHTML = n4 + " es mayor que " + n3;
  } else {
    slot5.innerHTML = n3 + " y " + n4 + " son iguales";
  }

  if (n3 > 0) {
    slot6.innerHTML = n3 + " es positivo";
  } else if (n3 < 0) {
    slot6.innerHTML = n3 + " es negativo";
  } else {
    slot6.innerHTML = n3 + " es cero";
  }

  if (n4 > 0) {
    slot7.innerHTML = n4 + " es positivo";
  } else if (n4 < 0) {
    slot7.innerHTML = n4 + " es negativo";
  } else {
    slot7.innerHTML = n4 + " es cero";
  }
}

// 7
for (let i = 0; i < 30; i++) {
  slot8.innerHTML += `${i} `;
}

//8
function factorial(num) {
  if (num === 0 || num === 1) return 1;
  return num * factorial(num - 1);
}

const n = prompt("ej8 factorial: Ingrese un número");

if (isNaN(n) || typeof n === "string") {
  slot9.innerHTML = "ej8: No has introducido un numero en el ejercicio8";
} else if (n < 0) {
  slot3.innerHTML =
    "ej8: No se puede calcular el factorial de un número negativo";
} else {
  const resultado = factorial(Number(n));
  slot9.innerHTML = `El factorial de ${n} es ${resultado}`;
}

//9
function promptCiudad() {
  const ciudad = prompt("ej9: Ingrese el nombre de una ciudad:").toLowerCase();

  switch (ciudad) {
    case "zaragoza":
      slot10.innerHTML = "Marvillosa gente. Capital del ebro";
      break;
    case "madrid":
      slot10.innerHTML = "El centro del mundo";
      break;
    case "barcelona":
      slot10.innerHTML = "Ciudad condal";
      break;
    default:
      slot10.innerHTML = "No conozco esa ciudad";
  }
}
