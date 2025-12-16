class CentroComercial {
  nombre;
  direccion; //array de calle, nuumero y codigoPostal
  plantas;

  constructor(nombre, direccion) {
    this.nombre = nombre;
    this.direccion = direccion;
    this.plantas = null;

    console.log(
      `Construido nuevo centro comercial: ${this.nombre}, Calle: ${this.direccion[0]}, nº: ${this.direccion[1]}, CP: ${this.direccion[2]}`
    );
  }

  agregarPlantasYLocales(numPlantas, numLocales) {
    const indice = this.plantas === null ? 0 : this.plantas.length;
    if (this.plantas === null) {
      this.plantas = [];
    }

    for (let i = indice; i < indice + numPlantas; i++) {
      let locales = [];

      for (let j = 1; j < numLocales + 1; j++) {
        locales[j] = "";
      }

      this.plantas[i + 1] = locales;
    }

    console.log(
      `Agregamos ${numPlantas} plantas con ${numLocales} locales por planta`
    );
  }

  modificarNombre(nombre) {
    this.nombre = nombre;
  }

  modificarDireccion(...props) {
    this.direccion = [props[0], props[1], props[2]];
  }

  asignarTiendas(...tiendas) {
    for (const tienda of tiendas) {
      if (!this.plantas[tienda.planta]) {
        this.agregarPlantasYLocales(1, tienda.local);
      }

      this.plantas[tienda.planta][tienda.local] = tienda.nombre;
      console.log(
        `${tienda.nombre} es ahora la tienda del local ${tienda.local} de la planta ${tienda.planta}`
      );
    }
  }

  imprimeLocales() {
    console.log(`Listado de iendas del centro comercial ${this.nombre}`);
    for (let i = 0; i < this.plantas.length; i++) {
      if (this.plantas[i]) {
        for (let j = 0; j < this.plantas[i].length; j++) {
          if (this.plantas[i][j] !== undefined) {
            console.log(
              `tienda del local ${j} de la planta ${i}: ${this.plantas[i][j]}`
            );
          }
        }
      }
    }
  }
}

export { CentroComercial };
