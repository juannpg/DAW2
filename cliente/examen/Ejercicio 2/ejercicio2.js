document.addEventListener("DOMContentLoaded", () => {
  const botonHabilita = document.getElementById("boton1");

  botonHabilita.addEventListener("click", () => {
    habilitar();
  });
});

function habilitar() {
  const botonValidar = document.getElementById("boton2");

  const nombre = document.getElementById("nombre").value;
  const apellidos = document.getElementById("apellidos").value;
  const correo = document.getElementById("correo").value;
  const usuario = document.getElementById("usuario").value;
  const dni = document.getElementById("dni").value;

  let errores = [];

  if (
    nombre === "" ||
    apellidos === "" ||
    correo === "" ||
    usuario === "" ||
    dni === ""
  ) {
    errores.push("Debes rellenar todos los campos");
  }

  if (
    nombre.replaceAll(/[0-9]/g, "").length < 2 ||
    apellidos.replaceAll(/[0-9]/g, "").length < 2
  ) {
    errores.push(
      "el nombre y apellidos deben tener al menos 2 caracteres no numéricos"
    );
  }

  if (usuario.length < 5 || usuario.length > 8) {
    errores.push("el usuario debe tener entre 5 y 8 caracteres");
  }

  if (!correo.includes("@")) {
    errores.push('el correo debe contener una "@"');
  }

  if (!verificarDNI(dni)) {
    errores.push("dni incorrecto");
  }

  for (const error of errores) {
    alert(error);
  }

  if (errores.length === 0) {
    botonValidar.removeAttribute("disabled");
  }
}

function datosBancarios() {
  const iban = document.getElementById("iban").value;
  const ccc = document.getElementById("ccc").value;
  const pass = document.getElementById("pass").value;

  let errores = [];

  if (
    !iban.startsWith("ES") ||
    iban.length != 4 ||
    !iban.charAt(2).match(/[0-9]/g) ||
    !iban.charAt(3).match(/[0-9]/g)
  ) {
    errores.push("iban debe tener el formato ESXX, siendo XX dos numeros");
  }

  if (ccc.replaceAll(/[0-9]/g, "").length != 0 || ccc.length != 20) {
    errores.push("ccc debe tener 20 numeros");
  }

  if (pass === "") {
    errores.push("la contraseña debe tener valor");
  }

  for (const error of errores) {
    alert(error);
  }

  if (errores.length === 0) {
    alert("todo bien!!");
  }
}

function validarDatos() {
  event.preventDefault();
}

function verificarDNI(dni) {
  const abecedario = [
    "T",
    "R",
    "W",
    "A",
    "G",
    "M",
    "Y",
    "F",
    "P",
    "D",
    "X",
    "B",
    "N",
    "J",
    "Z",
    "S",
    "Q",
    "V",
    "H",
    "L",
    "C",
    "K",
    "E",
  ];
  let letra = dni.charAt(dni.length - 1);
  let numero = dni.substring(0, dni.length - 1);

  if (numero.length === 0 || isNaN(numero)) {
    return false;
  }
  if (numero < 0 || numero > 99999999) {
    return false;
  }
  if (!letra || letra.length !== 1) {
    return false;
  }

  letra = letra.toUpperCase();
  let letraCorrecta = abecedario[numero % 23];

  if (letra === letraCorrecta) {
    return true;
  } else {
    return false;
  }
}
