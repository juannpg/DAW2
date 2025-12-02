class Gasto {
  descripcion;
  valor;
  fecha;
  etiquetas;

  constructor(descripcion, valor, fecha, etiquetas) {
    this.descripcion = descripcion;
    this.valor = valor;
    this.fecha = fecha;
    this.etiquetas = etiquetas;
  }

  mostrarGasto() {
    return (
      "Gasto correspondiente a " +
      this.descripcion +
      " con valor " +
      this.valor +
      " €."
    );
  }

  actualizarDescripcion(desc) {
    this.descripcion = desc;
  }

  actualizarValor(valor) {
    this.valor = valor;
  }
}

export { Gasto };
