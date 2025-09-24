for (var i = 0; i < 3; i++) {
  console.log("primer", i);
  for (var i = 0; i < 3; i++) {
    // <--- este var sobreescribe el primero porque tiene ambito de función
    console.log("segundo", i);
  }
}

console.log("---");

for (let j = 0; j < 3; j++) {
  console.log("primer", j);
  for (let j = 0; j < 3; j++) {
    // <--- este let no sobreescribe el primero porque tiene ambito de bloque
    console.log("segundo", j);
  }
}
