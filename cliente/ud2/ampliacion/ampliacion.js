function calcularNota() {
  let NotaProyecto = parseFloat(
    prompt("Introduce la nota del Proyecto (0-10):")
  );
  let NotaExamen = parseFloat(prompt("Introduce la nota del Examen (0-10):"));

  let resultado = document.getElementById("resultadoNota");

  if (
    isNaN(NotaProyecto) ||
    isNaN(NotaExamen) ||
    NotaProyecto < 0 ||
    NotaProyecto > 10 ||
    NotaExamen < 0 ||
    NotaExamen > 10
  ) {
    resultado.textContent = "Error: Las notas deben estar entre 0 y 10.";
    return;
  }

  let media = (NotaProyecto + NotaExamen) / 2;
  let calificacion = "";

  if (NotaProyecto < 4.5 || NotaExamen < 4.5) {
    calificacion = "Suspenso";
  } else if (media < 5) {
    calificacion = "Suspenso";
  } else if (media < 7) {
    calificacion = "Aprobado";
  } else if (media < 9) {
    calificacion = "Notable";
  } else {
    calificacion = "Sobresaliente";
  }

  resultado.textContent = `Media: ${media.toFixed(
    2
  )} | Calificación: ${calificacion}`;
}

function verificarDNI() {
  const abecedario = [
    "T",
    "R",
    "W",
    "A",
    "G",
    "M",
    "Y",
    "F",
    "P",
    "D",
    "X",
    "B",
    "N",
    "J",
    "Z",
    "S",
    "Q",
    "V",
    "H",
    "L",
    "C",
    "K",
    "E",
  ];
  let numero = prompt("Introduce el número del DNI:");
  let letra = prompt("Introduce la letra del DNI:");

  let resultado = document.getElementById("resultadoDNI");

  if (numero.length === 0 || isNaN(numero)) {
    resultado.textContent = "Número de DNI inválido.";
    return;
  }
  if (numero < 0 || numero > 99999999) {
    resultado.textContent = "Número de DNI fuera de rango.";
    return;
  }
  if (!letra || letra.length !== 1) {
    resultado.textContent = "Letra de DNI no introducida o incorrecta.";
    return;
  }

  letra = letra.toUpperCase();
  let letraCorrecta = abecedario[numero % 23];

  if (letra === letraCorrecta) {
    resultado.textContent = `DNI correcto: ${numero}-${letra}`;
  } else {
    resultado.textContent = `DNI incorrecto. La letra correcta es ${letraCorrecta}.`;
  }
}

let salida7 = "";
for (let i = 1; i <= 10; i++) {
  salida7 += `7 x ${i} = ${7 * i}\n`;
}
document.getElementById("tabla7").textContent = salida7;

let salida8 = "";
let j = 1;
while (j <= 10) {
  salida8 += `8 + ${j} = ${8 + j}\n`;
  j++;
}
document.getElementById("tabla8").textContent = salida8;

let salida9 = "";
let k = 1;
do {
  salida9 += `9 / ${k} = ${9 / k}\n`;
  k++;
} while (k <= 10);
document.getElementById("tabla9").textContent = salida9;

let salidaBits = "";
salidaBits += `125 / 8 con desplazamiento de bits = ${125 >> 3}\n`;
salidaBits += `25 / 2 con desplazamiento de bits = ${25 >> 1}\n`;
salidaBits += `40 x 4 con desplazamiento de bits = ${40 << 2}\n`;
salidaBits += `10 x 16 con desplazamiento de bits = ${10 << 4}\n`;

document.getElementById("operacionesBits").textContent = salidaBits;
