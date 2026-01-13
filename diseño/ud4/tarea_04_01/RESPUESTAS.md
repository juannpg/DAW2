# Respuestas y Explicaciones del Proceso

## Index.html (Estructura)

1.  **Estructura Semántica**: Se ha estructurado el HTML en secciones claras: `Header`, `Main` (Multimedia, Formulario).
2.  **Identificadores**: Se han asignado IDs únicos a los elementos interactivos para facilitar la selección con jQuery (e.g., `#book-image`, `#promo-video`).
3.  **Estado Inicial**: Se ha ocultado inicialmente la sección multimedia (`style="display: none;"`) para permitir el efecto `slideDown` al cargar la página.
4.  **Integración**: Se ha incluido la librería jQuery desde una CDN antes de nuestro propio script.

## Styles.css (Diseño)

1.  **Responsive**: Se usa Flexbox en `.multimedia-section` con `flex-wrap: wrap` para un diseño responsive que se adapta a diferentes pantallas.
2.  **Estilo de Imágenes**: `#book-image` tiene `border-radius` para bordes redondeados y `box-shadow` para dar profundidad.
3.  **Video**: `#promo-video` tiene un borde personalizado.
4.  **Clases de Utilidad**: Se definen clases como `.hidden` y `.fade` para ser usadas por los efectos de jQuery (toggleClass).

## Script.js (Interactividad jQuery)

1.  **Animación Inicial**: Se selecciona el contenedor `.multimedia-section` y se aplica `.slideDown(1500)` para mostrarlo suavemente al cargar.
2.  **Hover Imagen**: Usamos `.css()` dentro de `.hover()` para modificar `transform: scale(1.1)`, creando un efecto de zoom.
3.  **Video Toggle**: `.fadeToggle()` alterna automáticamente entre fadeIn y fadeOut para la descripción del video.
4.  **Acordeón Detalles**: `.slideToggle()` despliega o contrae los detalles extra del libro.
5.  **Animación Texto Promo**: `.toggleClass("fade")` añade o quita la clase de opacidad al pasar el cursor.
6.  **Formulario**:
    - Se previene el envío por defecto con `event.preventDefault()`.
    - Se usa `.val()` para obtener los valores de los inputs.
    - `.toggleClass("hidden")` oculta el formulario suavemente tras la validación correcta.
    - `.fadeIn("slow")` muestra el mensaje de confirmación.
