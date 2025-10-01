let nombre = prompt("Ingrese su nombre:");
let apellido = prompt("Ingrese su apellido:");

let fullName = nombre + " " + apellido;

let diaNacimiento = prompt("Ingrese el día de su nacimiento (número):");
let mesNacimiento = prompt("Ingrese el mes de su nacimiento (número):");
let anioNacimiento = prompt("Ingrese el año de su nacimiento (número):");

if (isNaN(diaNacimiento) || isNaN(mesNacimiento) || isNaN(anioNacimiento)) {
  alert("algun dato que has introducido no es un numero");
} else {
  let fechaNacimiento = new Date(
    anioNacimiento,
    mesNacimiento - 1,
    diaNacimiento
  );

  let hoy = new Date();
  let edadAnios = hoy.getFullYear() - fechaNacimiento.getFullYear();
  let edadMeses = hoy.getMonth() - fechaNacimiento.getMonth();
  let edadDias = hoy.getDate() - fechaNacimiento.getDate();

  if (edadMeses < 0 || (edadMeses === 0 && edadDias < 0)) {
    edadAnios--;
    edadMeses += 12;
  }

  if (edadDias < 0) {
    let mesAnterior = new Date(hoy.getFullYear(), hoy.getMonth(), 0);
    edadDias += mesAnterior.getDate() + 1;
    edadMeses--;
  }

  document.getElementById("main").innerHTML = `
  <h1>Hola, ${fullName}</h1>
  <h2>Tienes ${edadAnios} años, ${edadMeses} meses y ${edadDias} días de vida.</h2>
`;
}
