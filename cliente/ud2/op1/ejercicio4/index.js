const n1 = prompt("numero 1");
const n2 = prompt("numero 2");

if (isNaN(n1) || isNaN(n2)) {
  alert("algun dato que has introducido no es un numero");
} else {
  if (n1 % n2 === 0 || n2 % n1 === 0) {
    alert("Son multiplos");
  } else {
    alert("No son multiplos");
  }
}
