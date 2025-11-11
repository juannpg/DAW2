let varTablero; //VARIABLE A USAR LUEGO
let piezas = ["♖", "♘", "♗", "♕", "♔", "♗", "♘", "♖"]; // ARRAY CON LAS PIEZAS ORDENADAS
let peon = "♙"; // VARIBALE DE PEONES

/* CREAMOS EL TABLERO */
onload = function tablero() {
  /* REFERIMOS LA TABLA VACÍA EN UNA VARIABLE */
  /* CREA EN LA TABLA 8 FILAS CON DO WHILE */
  /* INSERTA CADA FILA DEL TABLERO EN UNA NUEVA VARIABLE FILA: .insertRow(0), .insertRow(1)....*/
  /* CREA EN CADA FILA 8 CELDAS. EMPLEA FOR  */
  /* INSERTA TODAS LAS CELDAS EN SU CORRESPONDIENTES 8 FILAS (a modo de columnas) .insertCell(0), .insertCell(0)*/
  /* AHORA QUE TENEMOS EL TABLERO CONSTRUIDO DE 8X8; CON INNERHTML Y EMPLEADO SWITCH-CASE RELLENA LAS FILAS 0 Y 7 CON LAS PIEZAS CORRESPONDIENTES Y LAS FILAS 1 Y 6 CON LOS PEONES*/
  const tabla = document.getElementById("tablero");
  for (let i = 0; i < 8; i++) {
    let fila = tabla.insertRow(i);
    for (let j = 0; j < 8; j++) {
      let celda = fila.insertCell(j);
      switch (i) {
        case 0:
        case 7:
          celda.innerHTML =
            `<div class=${i === 0 ? "negras" : "blancas"}>` +
            piezas[j] +
            "</div>";
          break;
        case 1:
        case 6:
          celda.innerHTML =
            `<div class=${i === 1 ? "negras" : "blancas"}>` + peon + "</div>";
          break;
        default:
      }
    }
  }
};
