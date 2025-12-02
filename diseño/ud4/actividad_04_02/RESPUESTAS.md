# Respuestas - Actividad 04_02

## Ejercicio 1. Preparación

**a) ¿Por qué se recomienda controlar estilos mediante clases y no con .css() en jQuery?**

- **Separación de responsabilidades:** Mantiene el diseño (CSS) separado de la lógica (JavaScript). Es más limpio y profesional.
- **Mantenibilidad:** Es más fácil modificar una clase en un archivo CSS que buscar y cambiar múltiples llamadas `.css()` dispersas en el código JavaScript.
- **Especificidad:** El método `.css()` aplica estilos en línea (`style="..."`), que tienen una especificidad muy alta y son difíciles de sobrescribir desde hojas de estilo externas.
- **Rendimiento:** Añadir o quitar una clase es generalmente más eficiente que manipular múltiples propiedades de estilo individualmente.

**b) ¿Qué ocurre si un usuario hace clic en un elemento muy rápidamente? ¿Debe soportarlo el evento?**

- El navegador captura todos los eventos de clic y los encola. Si el manejador del evento es rápido (como un simple cambio de clase), no suele haber problema.
- Sin embargo, si el evento desencadena animaciones (como `fadeIn`, `slideToggle`), estas se acumulan en la cola de efectos de jQuery, provocando que el elemento siga animándose mucho después de que el usuario haya dejado de hacer clic.
- El sistema de eventos lo soporta, pero visualmente puede ser indeseable. Para evitarlo en animaciones, se suele usar `.stop()` antes de la nueva animación.

## Ejercicio 3. Botones globales

**¿Qué diferencia conceptual hay entre “ocultar” y “desactivar un estado visual”?**

- **Ocultar:** Significa hacer que el elemento desaparezca de la vista (por ejemplo, `display: none` o `visibility: hidden`). El elemento deja de ser visible para el usuario.
- **Desactivar un estado visual:** Significa cambiar su apariencia para indicar que ya no está activo o seleccionado (por ejemplo, quitar un borde resaltado o volver a un color gris), pero el elemento **sigue siendo visible** y ocupando su espacio en la página. En este ejercicio, "Ocultar todas" se refiere a quitar el estado "resaltada", no a desaparecer las cajas.

## Ejercicio 4. Manejo de errores

**Explica por qué jQuery no arroja error al seleccionar un elemento inexistente.**

- jQuery está diseñado para ser tolerante a fallos y permitir el encadenamiento de métodos (chaining).
- Cuando un selector no encuentra coincidencias, devuelve un objeto jQuery vacío (un envoltorio con `length: 0`).
- Al invocar métodos sobre este objeto vacío (como `.hide()` o `.addClass()`), jQuery simplemente no hace nada (no-op) en lugar de lanzar una excepción. Esto evita que un script entero se rompa por la ausencia de un elemento opcional en el DOM.
