$(document).ready(function () {
  console.log("--- Ejercicio 2: Recorrer y mostrar información del DOM ---");

  // 2. Selecciona todos los <li> y recórralos con each().
  // 3. Muestra en consola: índice + texto del elemento.
  console.log("Recorrido inicial:");
  $("li").each(function (index, element) {
    console.log("Índice: " + index + ", Texto: " + $(element).text());
  });

  // 4. Añade un <li> nuevo usando jQuery y vuelve a recorrerlos.
  $("ul").append("<li>Elemento Nuevo (Ex 2)</li>");

  console.log("Recorrido tras añadir elemento:");
  $("li").each(function (index, element) {
    console.log("Índice: " + index + ", Texto: " + $(element).text());
  });

  console.log("\n--- Ejercicio 3: Manipulación básica: get() y prevObject ---");

  // 1. Selecciona el primer <li> con get(0) y muéstralo en consola.
  var primerLi = $("li").get(0);
  console.log("Primer LI con get(0):", primerLi);

  // 3. Encadena dos selecciones y añade un console.log de prevObject.
  var seleccion = $("ul").find("li");
  console.log("prevObject de $('ul').find('li'):", seleccion.prevObject);

  // 4. Modifica el texto del primer <li> usando jQuery.
  $("li").eq(0).text("Elemento 1 Modificado");

  console.log("\n--- Ejercicio 4: Interacción con el botón ---");

  // 1. Haz que el botón “Mostrar info” muestre todos los <li> mediante consola.
  $("#btn-show").click(function () {
    console.log("Click en Mostrar info:");
    $("li").each(function (index) {
      console.log(index + ": " + $(this).text());
    });
  });

  // 2. Agrega otro botón: “Añadir elemento”. (Ya agregado en HTML)
  // 3. Haz que al pulsarlo cree un nuevo <li> con un número correlativo.
  $("#btn-add").click(function () {
    var numElementos = $("li").length + 1;
    $("ul").append("<li>Elemento " + numElementos + "</li>");
  });
});
