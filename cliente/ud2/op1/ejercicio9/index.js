const slot = document.getElementById("slot");

function promptCiudad() {
  const ciudad = prompt("Ingrese el nombre de una ciudad:").toLowerCase();

  switch (ciudad) {
    case "zaragoza":
      slot.innerHTML = "Marvillosa gente. Capital del ebro";
      break;
    case "madrid":
      slot.innerHTML = "El centro del mundo";
      break;
    case "barcelona":
      slot.innerHTML = "Ciudad condal";
      break;
    default:
      slot.innerHTML = "No conozco esa ciudad";
  }
}
