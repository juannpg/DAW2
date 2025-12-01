# 📝 Desarrollo Web en Entorno Servidor

**Fecha:** 1 de Diciembre de 2025

## 1. El Examen y Práctica Mastermind

Para el examen vamos a realizar una ejercicio muy parecido al que ha explicado manuel en clase: **el Mastermind**. El ejercicio del examen será prácticamente igual a este.

Además de todo lo que ya sabemos, ha dicho que habrá que:

- Tendremos que implementar **autenticación**.
- Incluirá lo que estamos viendo de **Bases de Datos**.

🔗 **El ejercicio base es este:** [Mastermind Cert en GitHub](https://github.com/MAlejandroR/mastermind_cert)

## 2. Variables de Sesión

### ¿Qué son?

Son variables que sirven para **guardar información del cliente** (navegador) al recargar la página o navegar por la web.

- La información se guarda en la `session`.
- Tienen un tiempo determinado de vida.

### Funcionamiento

1.  El cliente solicita la web.
2.  El servidor inicia la sesión.
3.  Para saber a qué conexión pertenece una sesión, el servidor nos asigna una **cookie** que funciona como identificación de la sesión.

### Código y Sintaxis

Para guardar datos entre sesiones es obligatorio usar `session_start()` antes de cualquier otra cosa.

**Iniciar la sesión:**

```php
session_start();
```

**Guardar una variable:**

```php
$_SESSION['usuario'] = 'xiomara';
```

**Acceder al valor guardado:**

```php
$usuario = $_SESSION['usuario'];
```

**Acabar la sesión:**

```php
session_destroy();
```
