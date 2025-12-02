import { Presupuesto } from "../classes/Presupuesto.js";
import { Gasto } from "../classes/Gasto.js";

let presupuesto = new Presupuesto(0);

function mostrarPresupuesto() {
  return presupuesto.mostrarPresupuesto();
}

function actualizarPresupuesto(presupuesto) {
  return presupuesto.actualizarPresupuesto(presupuesto);
}

function crearGasto(...rest) {
  const descripcion = rest[0];
  let valor = rest[1];
  const fecha = rest[2];

  let etiquetas = [];
  for (let i = 3; i < rest.length; i++) {
    etiquetas.push(rest[i]);
  }

  if (isNaN(valor) || valor < 0) {
    valor = 0;
  }

  return new Gasto(descripcion, valor, fecha, etiquetas);
}

export { mostrarPresupuesto, actualizarPresupuesto, crearGasto };
