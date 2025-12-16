import { CentroComercial } from "./CentroComercial.js";

const centro = new CentroComercial("Puerto Venecia", ["z-40", "3", "50008"]);

centro.agregarPlantasYLocales(2, 4);

centro.asignarTiendas({ planta: 1, local: 1, nombre: "Zara" });

centro.asignarTiendas({ planta: 1, local: 2, nombre: "Pull&Bear" });

centro.asignarTiendas({ planta: 2, local: 3, nombre: "Primor" });

centro.imprimeLocales();
