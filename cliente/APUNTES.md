# APUNTES - Desarrollo Web en Entorno Cliente (1er Trimestre)

Este documento constituye una referencia exhaustiva de todos los conceptos, funciones, etiquetas y patrones de código utilizados durante el primer trimestre.

# APUNTES - Desarrollo Web en Entorno Cliente (1er Trimestre)

Este documento constituye una referencia exhaustiva de todos los conceptos, funciones, etiquetas y patrones de código utilizados durante el primer trimestre.

## 1. Referencia HTML y Formularios

Se ha trabajado extensamente con formularios HTML5, utilizando una variedad de tipos de entrada y atributos para controlar la interacción del usuario.

### Etiquetas Estructurales de Formulario

- `<form action="#" method="POST">`: Contenedor principal. `action` define a dónde se envían los datos (usualmente `#` en estos ejercicios) y `method` el verbo HTTP.
- `<fieldset>`: Agrupa elementos relacionados dentro de un formulario, dibujando un recuadro por defecto.
- `<legend>`: Define un título para el `fieldset`.
- `<label for="id">`: Etiqueta descriptiva para un input. El atributo `for` debe coincidir con el `id` del input para mejorar la accesibilidad y usabilidad (click en label activa input).
- `<optgroup label="Titulo">`: Agrupa opciones dentro de un `<select>`.

### Tipos de Input (`<input type="...">`)

- `text`: Campo de texto básico.
- `email`: Campo validado automáticamente para direcciones de correo.
- `number`: Campo numérico (permite atributos `min`, `max`).
- `checkbox`: Casilla de verificación (permite selección múltiple).
  - **Patrón:** Usar `name="lenguaje[]"` para enviar múltiples valores como array al servidor.
- `radio`: Botón de opción (selección única dentro del mismo `name`).
- `hidden`: Campo oculto. No visible para el usuario, pero se envía al servidor.
  - **Uso:** Enviar tokens, IDs o estados predefinidos.

### Otros Elementos de Formulario

- `<textarea>`: Área de texto multilínea.
  - **Atributos:** `rows` (filas), `cols` (columnas).
- `<select>`: Menú desplegable.
  - **Atributos:** `multiple` (permite seleccionar varias opciones con Ctrl/Cmd).
- `<button type="submit">`: Envía el formulario.

### Atributos Globales y de Validación

- `id`: Identificador único (usado para CSS y JS).
- `name`: Nombre del campo (clave en el par clave-valor enviado al servidor).
- `value`: Valor inicial o valor enviado.
- `placeholder`: Texto de ayuda temporal dentro del campo.
- `required`: Hace obligatorio el campo.
- `readonly`: El campo es visible pero no editable.
- `disabled`: El campo es visible pero no editable y **no se envía** al servidor.
- `size`: Ancho del campo en caracteres (para inputs de texto).
- `title`: Texto que aparece como tooltip (usado para accesibilidad o instrucciones extra).

## 2. Referencia JavaScript (Core)

### Sintaxis y Variables

- **Declaración:**
  - `let`: Variables reasignables con alcance de bloque.
  - `const`: Constantes (no reasignables) con alcance de bloque.
  - `var`: Variables con alcance de función (evitar su uso moderno por problemas de _hoisting_).
- **Tipos de Datos:**
  - `String`: Cadenas de texto ("hola", 'hola', `hola`).
  - `Number`: Enteros y flotantes (10, 3.14).
  - `Boolean`: `true`, `false`.
  - `Array`: Listas ordenadas `[1, 2, 3]`.
  - `Object`: Colecciones clave-valor `{ nombre: "Juan" }`.
- **Operadores:**
  - Aritméticos: `+`, `-`, `*`, `/`, `%` (módulo).
  - Comparación: `===` (igualdad estricta), `!==`, `<`, `>`, `<=`, `>=`.
  - Lógicos: `&&` (AND), `||` (OR), `!` (NOT).

### Estructuras de Control

- **Condicionales:**
  - `if (condicion) { ... } else { ... }`
  - `switch (valor) { case x: ... break; default: ... }`
- **Bucles:**
  - `for (let i = 0; i < n; i++) { ... }`: Bucle contado estándar.
  - `while (condicion) { ... }`: Bucle mientras se cumpla la condición.
  - `for (const item of array) { ... }`: Iterar sobre valores de un iterable.

### Funciones

- **Declaración Clásica:** `function nombre(params) { ... }`
- **Arrow Functions (ES6):** `const nombre = (params) => { ... }`
- **Argumentos Variables:**
  - `arguments`: Objeto array-like disponible en funciones clásicas.
  - `...rest`: Operador rest para agrupar argumentos en un array real (ej. `function suma(...numeros)`).

## 3. Objetos Nativos y Métodos

### String (Cadenas)

- `.length`: Longitud de la cadena.
- `.trim()`: Elimina espacios extremos.
- `.toUpperCase()` / `.toLowerCase()`: Conversión de caja.
- `.substring(inicio, fin)`: Extrae fragmento.
- `.charAt(indice)`: Carácter en posición.
- `.includes(texto)`: Devuelve `true` si contiene el texto.

### Array (Arreglos)

- `.push(elemento)`: Añade al final.
- `.join(separador)`: Convierte a string uniendo elementos.
- `.includes(elemento)`: Busca un elemento.
- **Iteración:** Uso de bucles `for` para recorrerlos.

### Math (Matemáticas)

- `Math.PI`: Número Pi.
- `Math.sqrt(n)`: Raíz cuadrada.
- `Math.ceil(n)`: Redondeo al entero superior.
- `Math.random()`: Aleatorio entre 0 y 1.

### Date (Fechas)

- `new Date()`: Fecha actual.
- `.getDate()`: Día del mes.
- `.getMonth()`: Mes (0-11). **Nota:** Enero es 0.
- `.getFullYear()`: Año (4 dígitos).
- `.getDay()`: Día de la semana (0-6, Domingo es 0).

### Globales

- `parseInt(str)`: Convierte string a entero.
- `isNaN(valor)`: Comprueba si no es un número.
- `console.log(...)`: Imprime en consola.

## 4. DOM y Eventos

### Selección de Elementos

- `document.getElementById('id')`: El método más usado para seleccionar elementos únicos.

### Manipulación

- `.innerHTML`: Modifica el HTML interno (útil para inyectar resultados formateados).
- `.textContent`: Modifica solo el texto (más seguro).
- `.value`: Accede al valor de inputs de formulario.
- `.style.propiedad`: Modifica estilos CSS en línea (ej. `.style.display = 'none'`).

### Eventos

- **Manejadores:**
  - Atributo HTML: `onclick="funcion()"`, `onsubmit="funcion(event)"`.
  - JavaScript: `elemento.addEventListener('click', funcion)`.
- **Tipos de Eventos:**
  - `click`: Click del ratón.
  - `submit`: Envío de formulario.
- **Objeto Evento (`e` o `event`):**
  - `e.preventDefault()`: Evita la acción por defecto (vital en formularios para evitar recarga de página).

## 5. Programación Orientada a Objetos (POO)

En la Unidad 4 se introduce el paradigma de POO utilizando la sintaxis moderna de clases de ES6.

### Definición de Clases (`class`)

Una clase es una plantilla para crear objetos. Encapsula datos (propiedades) y comportamientos (métodos).

```javascript
class Persona {
  // Definición de campos públicos (opcional, pero buena práctica para documentar)
  nombre;
  apellido;
  edad;
  email;

  // Constructor: Método especial que se ejecuta al crear una instancia
  constructor(nombre, apellido, edad, email) {
    // 'this' hace referencia a la instancia actual
    this.nombre = nombre;
    this.apellido = apellido;
    this.edad = edad;
    this.email = email;
  }

  // Métodos: Funciones asociadas a la clase
  getEdad() {
    return this.edad;
  }

  saludar() {
    return `Hola, soy ${this.nombre} ${this.apellido}`;
  }
}
```

### Conceptos Clave

- **Instanciación (`new`):** Para crear un objeto a partir de una clase se usa la palabra clave `new`.
  ```javascript
  const p1 = new Persona("Juan", "Pérez", 30, "juan@email.com");
  ```
- **`this`:** Palabra clave que dentro de una clase se refiere al objeto que se está manipulando en ese momento. Permite acceder a sus propias propiedades.
- **Campos Públicos:** Variables declaradas directamente dentro de la clase (fuera de métodos).
- **Métodos:** Funciones definidas dentro del cuerpo de la clase. No necesitan la palabra clave `function`.

### Uso Práctico en el Proyecto

Se ha utilizado POO para modelar entidades de negocio (como `Persona`) y realizar operaciones sobre conjuntos de objetos, como calcular la media de edad de un grupo de personas pasadas como argumentos.

## 6. Algoritmos y Patrones Detectados

### Validación de Formularios

Se ha implementado un patrón robusto de validación manual en JS:

1. Recoger valores del DOM.
2. Crear un array de errores (`let errores = []`).
3. Aplicar reglas (longitud, tipo, paridad, rangos).
4. Si hay error, hacer `push` al array.
5. Al final, si `errores.length > 0`, mostrarlos; si no, procesar.

**Reglas específicas vistas:**

- Matrículas: 5 números + 1 letra.
- Teléfonos: Empezar por 8 o 9, longitud 9, sin negativos.

### Números Primos

Algoritmo para detectar primos:

```javascript
function esPrimo(num) {
  if (num <= 1) return false;
  for (let i = 2; i <= Math.sqrt(num); i++) {
    if (num % i === 0) return false;
  }
  return true;
}
```

### Generación de Aleatorios Únicos

Patrón para loterías o sorteos (sin repetidos):

```javascript
while (array.length < cantidad) {
  const num = Math.ceil(Math.random() * max);
  if (!array.includes(num)) {
    array.push(num);
  }
}
```

## 7. Resumen Detallado de Prácticas

### Ejercicios Formularios 1 y 2 (UD0)

**Objetivo:** Dominar la creación de interfaces de entrada de datos.

- **Formularios Básicos:** Creación de estructuras con `label` e `input`.
- **Tipos de Datos:** Uso correcto de `type="email"` vs `text` para aprovechar la validación nativa del navegador.
- **Agrupación:** Uso de `fieldset` y `legend` para organizar formularios largos.
- **Selectores:** Implementación de menús desplegables simples y múltiples (`<select multiple>`) y agrupados (`<optgroup>`).
- **Atributos Avanzados:** Uso de `readonly` para mostrar datos no editables (ej. contratos) y `disabled` para bloquear opciones.

### Unidad 2: Introducción a JavaScript

**Objetivo:** Fundamentos del lenguaje.

- **Consola:** Uso de `console.log` para depuración y trazas.
- **Variables:** Diferenciación práctica entre `var` (scope función) y `let`/`const` (scope bloque).
- **Strings:** Manipulación de cadenas, uso de comillas simples, dobles y _backticks_ (plantillas).
- **Hoisting:** Demostración de cómo `var` se "eleva" al inicio del contexto, causando comportamientos inesperados, a diferencia de `let`.

### Unidad 3: Lógica y Algoritmia

**Objetivo:** Desarrollar el pensamiento lógico.

- **Cálculos Matemáticos:** Uso de `Math` para calcular áreas, longitudes de circunferencia y potencias.
- **Números Primos:** Implementación de bucles anidados para verificar primalidad.
- **Arrays:**
  - Filtrado de datos (ej. guardar solo múltiplos de 3).
  - Búsqueda de extremos (mayor y menor número en un array).
  - Generación de datos aleatorios sin repetición (ej. cartones de bingo o lotería).
- **Fechas:** Formateo manual de fechas accediendo a días y meses por separado.

### Unidad 4: DOM y Eventos

**Objetivo:** Interactividad y aplicaciones dinámicas.

- **Validación en Tiempo Real:** Comprobación de datos antes de enviar (evitar recargas innecesarias).
- **Manipulación del DOM:**
  - Ocultar/Mostrar elementos (`display: none/block`) para simular navegación (ej. Login -> Banco).
  - Inserción dinámica de mensajes de error o éxito.
- **Objetos y Clases:**
  - Creación de la clase `Persona`.
  - Uso de métodos getters/setters.
  - Cálculo de medias de edad iterando sobre objetos.

## 8. Glosario de Términos

- **DOM (Document Object Model):** Representación en árbol de la estructura HTML que permite a JS modificar el contenido y estilo.
- **Hoisting:** Comportamiento de JS de mover declaraciones al inicio de su ámbito.
- **Scope (Ámbito):** Contexto donde una variable es visible (Global, Función, Bloque).
- **Callback:** Función que se pasa como argumento a otra función (ej. en `addEventListener`).
- **Evento:** Señal que emite el navegador cuando ocurre algo (click, carga, input).
- **Array:** Estructura de datos tipo lista.
- **Objeto:** Estructura de datos tipo clave-valor.
- **Clase:** Plantilla para la creación de objetos (ES6).
- **Instancia:** Objeto concreto creado a partir de una clase.
