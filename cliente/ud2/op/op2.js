const slot11 = document.getElementById("slot11");
const slot12 = document.getElementById("slot12");

const mensaje =
  "ej1 mensaje: Hola a todo el mundo!\nQué fácil es incluir 'comillas simples'\ny \"comillas dobles\"";

alert(mensaje);

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
