class Presupuesto {
  presupuesto;

  constructor(presupuesto) {
    this.presupuesto = presupuesto;
  }

  actualizarPresupuesto(pres) {
    if (isNaN(pres) || pres < 0) {
      return -1;
    }

    this.presupuesto = pres;
    return this.presupuesto;
  }

  mostrarPresupuesto() {
    return "Tu presupuesto actual es " + this.presupuesto + "€";
  }
}

export { Presupuesto };
