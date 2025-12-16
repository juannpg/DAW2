// prettier-ignore
const coloresMap = {
  "Azul": "blue",
  "Rojo": "red",
  "Naranja": "orange",
  "Verde": "green",
  "Violeta": "violet",
  "Amarillo": "yellow",
  "Marrón": "amber",
  "Rosa": "pink",
};

addEventListener("DOMContentLoaded", () => {
  let coloresSeleccionados = document.getElementsByName("colores[]");

  for (let colorSeleccionado of coloresSeleccionados) {
    colorSeleccionado.classList.add(
      "bg-" + coloresMap[colorSeleccionado.value] + "-600"
    );

    colorSeleccionado.addEventListener("change", () => {
      colorSeleccionado.classList.add(
        "bg-" + coloresMap[colorSeleccionado.value] + "-600"
      );
    });
  }
});
