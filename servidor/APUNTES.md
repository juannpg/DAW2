# Apuntes del Proyecto de Servidor (PHP)

Este documento recoge los patrones, estructuras y conceptos clave encontrados en el proyecto `daw2/servidor`. Sirve como guía de estudio y referencia para entender cómo funcionan las diferentes aplicaciones (Mastermind, Adivina Número, Gestor de BD, etc.).

## 1. Estructura General del Proyecto

El proyecto está organizado en carpetas temáticas dentro de `php/app`:

- **`formularios/`**: Ejercicios básicos de manejo de formularios y estado sin base de datos.
- **`mastermind_cert/`**: Una aplicación más compleja que sigue un patrón MVC (Modelo-Vista-Controlador) y usa sesiones.
- **`bd/`**: Ejemplo de conexión a base de datos usando POO, Namespaces y variables de entorno (`.env`).
- **`clases/`**: Definiciones de objetos y lógica de negocio.

---

## 2. Gestión del Estado (State Management)

PHP es un lenguaje "sin estado" (stateless). Esto significa que cuando el servidor termina de enviar la página al navegador, "olvida" todo lo que pasó. Para crear juegos o aplicaciones interactivas, necesitamos mecanismos para recordar datos entre una carga de página y la siguiente.

En este proyecto se usan dos patrones principales para esto:

### Patrón A: Inputs Ocultos (`input type="hidden"`)

**Dónde se ve:** `formularios/adivina_numero/jugar.php`

Este patrón consiste en enviar el estado actual del juego (número secreto, intentos restantes, rango actual) de vuelta al servidor en cada envío del formulario.

**Cómo funciona:**

1.  El servidor calcula los nuevos valores.
2.  El servidor genera el HTML e incrusta estos valores en inputs invisibles dentro del `<form>`.
3.  Cuando el usuario pulsa "Enviar", estos valores viajan en `$_POST` junto con la nueva acción del usuario.

**Ejemplo (`adivina_numero/jugar.php`):**

```php
<!-- El servidor "recuerda" el número secreto y el estado del juego escribiéndolo en el HTML -->
<input type="hidden" name="numero_secreto" value="<?= $numero_secreto ?>">
<input type="hidden" name="intentos" value="<?= $intentos ?>">
<input type="hidden" name="min" value="<?= $min ?>">
<input type="hidden" name="max" value="<?= $max ?>">
```

**Ventajas:** No consume memoria en el servidor (no usa sesiones).
**Desventajas:** El usuario puede modificar los valores si inspecciona el HTML (trampas fáciles). No sirve para datos sensibles.

### Patrón B: Sesiones (`$_SESSION`)

**Dónde se ve:** `mastermind_cert/controlador.php`

**¿Qué son?**
Son variables que sirven para **guardar información del cliente** (navegador) al recargar la página o navegar por la web. La información se guarda en el servidor, pero tiene un tiempo determinado de vida.

**Cómo funciona:**

1.  El cliente solicita la web.
2.  El servidor inicia la sesión (`session_start()`).
3.  El servidor guarda los datos en un archivo temporal o memoria.
4.  Para saber a qué conexión pertenece una sesión, el servidor asigna al cliente una **cookie** (generalmente llamada `PHPSESSID`) que funciona como identificación de la sesión.

**Sintaxis Básica:**

- **Iniciar:** `session_start();` (Obligatorio antes de cualquier output).
- **Guardar:** `$_SESSION['usuario'] = 'xiomara';`
- **Leer:** `$usuario = $_SESSION['usuario'];`
- **Borrar:** `session_destroy();` (Para cerrar sesión o reiniciar juego).

**Ejemplo en el Proyecto (`mastermind_cert`):**

En este proyecto, usamos sesiones para persistir el estado del juego (las jugadas realizadas) entre peticiones POST.

```php
// controlador.php
session_start();

// Guardar un objeto completo en la sesión (serializado)
$jugada = new Jugada($_POST['combinacion']);
$_SESSION['jugadas'][] = serialize($jugada);

// Recuperar y usar
$jugadas_guardadas = $_SESSION['jugadas'];
```

**Nota sobre Serialización:** A veces es necesario usar `serialize()` para guardar objetos complejos en sesión y `unserialize()` al recuperarlos, para asegurar que PHP reconstruye el objeto correctamente con sus métodos.

---

## 3. Patrones de Diseño y Arquitectura

### MVC (Modelo-Vista-Controlador) Simplificado

**Dónde se ve:** `mastermind_cert/`

- **Modelo (`clases/`)**: `Clave.php`, `Jugada.php`. Contienen la lógica pura (reglas del juego, generar claves, comparar colores). No saben nada de HTML.
- **Vista (`jugar.php`, `index.php`, `fin.php`)**: Archivos que solo muestran HTML y datos. Usan `<?= $variable ?>` para imprimir.
- **Controlador (`controlador.php`)**: Recibe la petición del usuario (`$_POST`), decide qué hacer (llamar al modelo, actualizar sesión) y carga la vista adecuada.

**Flujo:**

1.  `jugar.php` incluye a `controlador.php` al priVncipio.
2.  `controlador.php` procesa la lógica.
3.  `jugar.php` muestra el resultado.

### Singleton (Instancia Única)

**Dónde se ve:** `bd/` (probablemente en `class/db/db.php`)

Se usa para asegurar que solo haya **una** conexión a la base de datos abierta, sin importar cuántas veces la pidamos.

```php
// Uso en index.php
$conexion = DB::getInstance();
```

### Autoloading (Carga Automática)

Para no tener que hacer `require "Clase.php"` por cada archivo, se usan autoloader.

**Método 1: `spl_autoload_register` (Manual)**
Visto en `mastermind_cert/controlador.php`:

```php
$carga = fn($clase) => require("./clases/$clase.php");
spl_autoload_register($carga);
```

Cuando intentas usar `new Jugada()`, PHP busca automáticamente el archivo `clases/Jugada.php`.

**Método 2: Composer (Estándar PSR-4)**
Visto en `bd/`:

```php
require './vendor/autoload.php';
use \class\db\db as DB;
```

Es el estándar profesional moderno.

---

## 4. Conceptos "Difíciles" Explicados

### Lógica de Búsqueda Binaria (Adivina Número)

El juego de adivinar número usa el algoritmo de búsqueda binaria para adivinar eficientemente.

- **Concepto**: Si el número está entre 1 y 100, pregunto por el 50.
  - Si es "Mayor", el nuevo rango es 51-100.
  - Si es "Menor", el nuevo rango es 1-49.
- **Código**:

  ```php
  $min = $_POST["min"]; // Rango inferior actual
  $max = $_POST["max"]; // Rango superior actual
  $pregunta = ($min + $max) / 2; // El punto medio

  if ($estado == "mayor") {
      $min = $pregunta; // Subimos el suelo
  } elseif ($estado == "menor") {
      $max = $pregunta; // Bajamos el techo
  }
  ```

### Comparación de Arrays (Mastermind)

Para saber cuántos colores ("heridos") y posiciones ("muertos") se han acertado.

**Lógica:**

1.  **Posiciones exactas (Muertos)**: Recorrer ambos arrays con el mismo índice.
    ```php
    foreach ($this->colores as $pos => $color) {
        if ($color == $clave[$pos]) {
            $aciertos_posicion++;
        }
    }
    ```
2.  **Colores presentes (Heridos)**: Usar `in_array` o `array_intersect`.
    ```php
    // Opción con funciones de array (más elegante)
    $colores_comunes = array_intersect($clave, $jugada);
    $cantidad_colores = count($colores_comunes);
    ```

### Variables de Entorno (`.env`)

En `bd/`, se usa un archivo `.env` para guardar contraseñas de base de datos.
**¿Por qué?** Para no subir contraseñas al código fuente (Git).

```php
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Ahora las variables están en $_ENV
```

---

## 5. Trucos y Consejos

- **Debug**: Usa `var_dump($variable); die();` para ver qué está pasando y detener la ejecución. Es tu mejor amigo.
- **Null Coalescing (`??`)**: Muy útil para formularios.
  ```php
  // Si $_POST['nombre'] existe úsalo, si no, usa "Invitado"
  $nombre = $_POST['nombre'] ?? "Invitado";
  ```
- **Redirecciones**: Después de procesar un formulario (especialmente si guardas en BD o sesión), es buena práctica redirigir para evitar reenvíos al refrescar.
  ```php
  header("Location: index.php");
  exit; // ¡Siempre pon exit después de header!
  ```
