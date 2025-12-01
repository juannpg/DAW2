# Respuestas - Actividad 04_01

## Ejercicio 1. Preparación del proyecto

**a) ¿Qué es el DOM y cómo se diferencia del HTML?**

- El DOM (Document Object Model) es una interfaz de programación para documentos web. Representa la página para que los programas puedan cambiar la estructura, el estilo y el contenido del documento. El DOM representa el documento como nodos y objetos.
- HTML es el lenguaje de marcado que se usa para estructurar y desplegar una página web y sus contenidos. El DOM es la representación en memoria viva de ese HTML, que puede ser modificada por JavaScript.

**b) ¿Por qué no podemos manipular el DOM antes de cargarlo por completo?**

- Porque si intentamos acceder a un elemento que aún no ha sido renderizado o analizado por el navegador, obtendremos un error o un valor nulo, ya que el nodo correspondiente aún no existe en el árbol del DOM.

**c) ¿Por qué necesitamos $(document).ready()?**

- Para asegurarnos de que el código JavaScript se ejecute solo cuando el DOM esté completamente cargado y listo para ser manipulado, evitando errores de referencia a elementos inexistentes.

## Ejercicio 2. Recorrer y mostrar información del DOM

**¿Por qué each() recibe dos valores: índice y elemento?**

- El primer argumento es el índice del elemento en la colección actual (0, 1, 2...).
- El segundo argumento es el elemento DOM nativo en sí mismo (no el objeto jQuery).
  Esto permite acceder tanto a la posición como al contenido del elemento durante la iteración.

## Ejercicio 3. Manipulación básica: get() y prevObject

**Observa el tipo de dato devuelto (HTML element).**

- Es un elemento del DOM nativo (HTMLLIElement), no un objeto jQuery.

## Ejercicio 4. Interacción con el botón

**a) ¿Qué ocurre si intentas aplicar css() a un selector vacío?**

- No ocurre ningún error visible. jQuery simplemente no hace nada porque no hay elementos sobre los que iterar para aplicar el estilo. Falla silenciosamente.

**b) ¿Cómo detecta jQuery que la selección es nula?**

- jQuery devuelve un objeto jQuery vacío (con propiedad length igual a 0). Se puede verificar con `if ($(selector).length === 0)`.
