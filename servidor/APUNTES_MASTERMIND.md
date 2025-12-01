# Análisis Detallado del Proyecto Mastermind (PHP)

Este documento es una guía profunda sobre la implementación del juego Mastermind en PHP. Analiza la arquitectura, el flujo de datos, la gestión de sesiones y la lógica de negocio.

## 1. Arquitectura del Proyecto

El proyecto sigue una arquitectura **MVC (Modelo-Vista-Controlador)** simplificada, donde la lógica de negocio está separada de la presentación.

### Componentes:

1.  **Modelo (Clases)**:

    - `clases/Clave.php`: Gestiona la clave secreta (generación y almacenamiento).
    - `clases/Jugada.php`: Representa un intento del usuario y contiene la lógica de comparación (aciertos).
    - `clases/Plantilla.php`: Helper para generar HTML repetitivo (selectores de colores).

2.  **Controlador**:

    - `controlador.php`: Es el cerebro. Recibe las acciones del usuario (`$_POST`), decide qué hacer (jugar, reiniciar, mostrar clave) y actualiza el estado.

3.  **Vista**:
    - `index.php`: Pantalla de bienvenida.
    - `jugar.php`: Pantalla principal del juego. Muestra el tablero y los formularios.
    - `fin.php`: Pantalla de resultado (ganar/perder).

---

## 2. Flujo de Ejecución (Paso a Paso)

### A. Inicio (`index.php`)

1.  Inicia sesión (`session_start()`).
2.  Destruye cualquier sesión anterior (`session_destroy()`) para asegurar un juego limpio.
3.  Muestra las instrucciones y un botón para ir a `jugar.php`.

### B. Bucle Principal (`jugar.php` <-> `controlador.php`)

El archivo `jugar.php` incluye a `controlador.php` en la línea 2: `require "controlador.php";`. Esto significa que **antes** de mostrar cualquier HTML, se ejecuta toda la lógica.

**Ciclo de vida de una petición:**

1.  El usuario envía el formulario (botón "Jugar", "Mostrar Clave", etc.).
2.  `jugar.php` carga `controlador.php`.
3.  `controlador.php`:
    - Carga las clases automáticamente (`spl_autoload_register`).
    - Inicia/recupera la sesión.
    - Obtiene o genera la clave secreta (`Clave::obtener_clave()`).
    - Lee `$_POST['submit']` para saber qué botón se pulsó.
    - Ejecuta la acción correspondiente en el `switch`.
    - Si es una jugada, crea un objeto `Jugada`, lo evalúa y lo guarda en sesión.
    - Si el juego termina, redirige a `fin.php` con `header("location:fin.php...")`.
4.  Si no hay redirección, `jugar.php` continúa y renderiza el HTML con los datos actualizados (`$informacion`, `$mostrar_ocultar_clave`).

---

## 3. Gestión del Estado (Sesiones)

A diferencia del juego "Adivina Número" que usa inputs ocultos, Mastermind usa `$_SESSION` para persistir datos.

### Variables de Sesión Clave:

- `$_SESSION['clave']`: Array de 4 colores que representa la combinación secreta. Se genera una sola vez al principio.
- `$_SESSION['jugadas']`: Array que almacena el historial de intentos.
  - **Importante**: Almacena objetos `Jugada` **serializados**.

### ¿Por qué Serializar?

En `controlador.php`:

```php
$_SESSION['jugadas'][] = serialize($jugada);
```

PHP no puede guardar objetos vivos directamente en la sesión de forma segura entre peticiones si no se serializan (convierten a string). Al recuperarlos (`unserialize`), PHP reconstruye el objeto y podemos volver a usar sus métodos (como `__toString()` para imprimirlo).

---

## 4. Análisis de las Clases (Lógica de Negocio)

### Clase `Clave` (`clases/Clave.php`)

- **Responsabilidad**: Generar y recordar la combinación secreta.
- **Patrón Singleton (parcial)**: Usa métodos estáticos (`self::`) para que no haga falta instanciar la clase.
- **Método `obtener_clave()`**:
  - Mira si ya existe `$_SESSION['clave']`.
  - Si existe, la devuelve.
  - Si NO existe, llama a `genera_clave()` y la guarda en sesión.
- **Método `genera_clave()`**:
  - Usa `array_rand()` para elegir 4 claves aleatorias del array `COLORES`.
  - **Ojo**: `array_rand` devuelve _índices_, no valores. Por eso luego hace `self::$clave[] = $colores[$posicion]`.

### Clase `Jugada` (`clases/Jugada.php`)

- **Responsabilidad**: Evaluar un intento.
- **Constructor**: Recibe los colores del usuario, obtiene la clave secreta y llama a `evalua_jugada`.
- **Lógica de Evaluación (`evalua_jugada`)**:

  1.  **Aciertos de Color (Heridos)**:
      - Elimina duplicados de la jugada del usuario (`array_unique`) para no contar el mismo color dos veces si la clave solo lo tiene una vez.
      - Usa `in_array($color, $clave)` para ver si el color existe en la clave.
  2.  **Aciertos de Posición (Muertos)**:
      - Recorre los arrays comparando índice por índice: `if ($color == $clave[$pos])`.

- **Renderizado (`__toString`)**:
  - Genera HTML con "pines" negros (posición correcta) y blancos (color correcto).
  - Luego pinta los colores jugados.
  - Esto permite hacer `echo $jugada` directamente en la vista.

### Clase `Plantilla` (`clases/Plantilla.php`)

- **Responsabilidad**: Generar HTML repetitivo.
- **Método `genera_formulario_juego()`**:
  - Crea 4 `<select>`, cada uno con las opciones de colores.
  - Usa las constantes de `Clave::COLORES` para llenar las opciones.
  - Esto hace que si añades un color nuevo en `Clave.php`, aparezca automáticamente en el formulario.

---

## 5. Puntos Críticos y "Gotchas"

### 1. Autoloading

```php
$carga = fn($clase) => require("./clases/$clase.php");
spl_autoload_register($carga);
```

Esta función anónima se ejecuta cada vez que PHP encuentra una clase que no conoce (ej: `new Jugada()`). Busca el archivo en la carpeta `clases/` y lo incluye. Sin esto, tendrías que hacer `require` manual de todo.

### 2. Redirección con `header()`

En `controlador.php`:

```php
header("location:fin.php?win=$win");
exit;
```

Es vital poner `exit` después de `header`. Si no, el script sigue ejecutándose (y podría generar errores o mostrar contenido indebido) aunque el navegador ya esté intentando cambiar de página.

### 3. El operador Null Coalescing (`??`)

```php
$opcion = $_POST['submit'] ?? "";
```

Evita el error "Undefined index" si entras a la página directamente sin enviar el formulario. Si `$_POST['submit']` no existe, asigna `""`.

### 4. Visualización de Histórico

En `Jugada::obtener_historico_jugadas()`:

```php
foreach ($jugadas as $pos => $jugada) {
    $jugada = unserialize($jugada); // ¡CRUCIAL!
    $html .= " Jugada $pos: $jugada<br />"; // Llama a __toString implícitamente
}
```

Recupera los strings de la sesión, los convierte de nuevo a Objetos `Jugada`, y al concatenarlos con un string, PHP llama automáticamente al método mágico `__toString()` de la clase `Jugada`.

---

## 6. Resumen de Flujo de Datos

1.  **Usuario**: Elige colores [Rojo, Azul, Verde, Amarillo] y pulsa "Jugar".
2.  **Navegador**: Envía POST a `jugar.php`.
3.  **Controlador**:
    - Detecta acción "Jugar".
    - Crea `new Jugada(['Rojo', 'Azul'...])`.
    - `Jugada` compara con `$_SESSION['clave']`. Calcula aciertos.
    - Controlador guarda la jugada serializada en `$_SESSION['jugadas']`.
    - Verifica si ganó (4 aciertos de posición) o perdió (>10 intentos).
4.  **Vista**:
    - Recupera el historial de `$_SESSION['jugadas']`.
    - Lo imprime en pantalla.
