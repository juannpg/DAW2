const slot11 = document.getElementById("slot11");
const slot12 = document.getElementById("slot12");
const slot13 = document.getElementById("slot13");
const slot14 = document.getElementById("slot14");

const mensaje =
  "ej1 mensaje: Hola a todo el mundo!\nQué fácil es incluir 'comillas simples'\ny \"comillas dobles\"";

alert(mensaje);

//2
let err = false;
const dec1 = prompt("ej2 numero1: Dame un numero");
const desplazamiento = prompt("ej2 desplazamiento: desplazamiento");

if (isNaN(dec1) || dec1 == "") {
  slot13.innerHTML = "ej2: No has introducido un numero en numero1";
  err = true;
}

if (isNaN(desplazamiento) || desplazamiento == "") {
  slot13.innerHTML = "ej2: No has introducido un numero en desplazamiento";
  err = true;
}

if (!err) {
  const resultadoDecimal = dec1 >> desplazamiento;
  const resultadoBinario = resultadoDecimal.toString(2);
  slot13.innerHTML = `ej2: El numero ${dec1} desplazado ${desplazamiento} posiciones a la derecha es ${resultadoDecimal} y en binario es ${resultadoBinario}`;
}

//3
err = false;
const dec2 = prompt("ej3 numero1: Dame un numero");
const desplazamiento2 = prompt("ej3 desplazamiento: desplazamiento");

if (isNaN(dec2) || dec2 == "") {
  slot14.innerHTML = "ej3: No has introducido un numero en numero1";
  err = true;
}

if (isNaN(desplazamiento2) || desplazamiento2 == "") {
  slot14.innerHTML = "ej3: No has introducido un numero en desplazamiento";
  err = true;
}

if (!err) {
  const resultadoDecimal = dec2 << desplazamiento2;
  const resultadoBinario = resultadoDecimal.toString(2);
  slot14.innerHTML = `ej3: El numero ${dec2} desplazado ${desplazamiento2} posiciones a la derecha es ${resultadoDecimal} y en binario es ${resultadoBinario}`;
}
//4
console.log("maximo valor posible", Number.MAX_VALUE);
console.log("valor mas cercano a 0", Number.MIN_VALUE);
console.log("infinito", Number.MAX_VALUE * 2);

// 5
const OVNI = "OBJETO VOLADOR NO IDENTIFICADO";
const Info = "En un lugar de la mancha";

function comprobarMayusMinus(cadena) {
  if (cadena === null || cadena.length === 0) {
    return "Cadena vacía o nula";
  } else if (cadena === cadena.toUpperCase()) {
    return `${cadena} esta en mayus`;
  } else if (cadena === cadena.toLowerCase()) {
    return `${cadena} eesta en minus`;
  } else {
    return `${cadena} esta en maysu y minus`;
  }
}

slot11.innerHTML = `OVNI: ${comprobarMayusMinus(
  OVNI
)}<br />Info: ${comprobarMayusMinus(Info)}`;

const textoUsuario = prompt("ej5 mayusculas minusculas: Introduce una cadena");
slot12.innerHTML = `${textoUsuario}: ${comprobarMayusMinus(textoUsuario)}`;
