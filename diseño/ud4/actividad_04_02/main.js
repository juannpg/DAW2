$(document).ready(function () {
  console.log("--- Inicio de la actividad 04_02 ---");

  // Ejercicio 2. Eventos básicos
  $(".box").each(function (index, element) {
    // Al hacer clic
    $(element).on("click", function () {
      $(this).toggleClass("resaltada");
      console.log("Caja clicada. Índice: " + index);
    });

    $(element).hover(
      function () {
        $(this).css("background-color", "#b3e5fc"); // Azul claro
      },
      function () {
        $(this).css("background-color", "");
      }
    );
  });

  // Ejercicio 3. Botones globales
  $("#btn-highlight-all").click(function () {
    $(".box").addClass("resaltada");
  });

  $("#btn-hide-all").click(function () {
    $(".box").removeClass("resaltada");
  });

  $("#btn-toggle-all").click(function () {
    $(".box").toggleClass("resaltada");
  });

  // Ejercicio 4. Manejo de errores
  console.log("\n--- Ejercicio 4: Manejo de errores ---");
  var selectorInexistente = $("#elemento-que-no-existe");

  console.log(
    "Intento de selección de '#elemento-que-no-existe':",
    selectorInexistente
  );
  console.log(
    "Propiedad length del objeto devuelto:",
    selectorInexistente.length
  );

  if (selectorInexistente.length === 0) {
    console.log(
      "El elemento no existe, pero jQuery no lanza error, devuelve un objeto vacío."
    );
  }
});
