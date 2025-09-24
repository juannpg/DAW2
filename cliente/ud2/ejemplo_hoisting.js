console.log(x); // undefined
var x = 1;
console.log(b); // referenceError cannot access 'b' before initialization
let b = 1;

function foo() {
  if (true) {
    var a = 10; // var tiene scope de función
    let c = 20; // let tiene scope de bloque
    console.log(a); // 10
    console.log(c); // 20
  }

  console.log(a); // 10 (var es accesible fuera del bloque)
  console.log(c); // ReferenceError: b is not defined (let NO es accesible fuera del bloque)
}

foo();
