/*
let contadorNoPrimos = 0;
let arrayNoPrimos = [];
for(let i = 1; i <= 500 ; i++){
    let contador = 0;
    for(let j = 1;j <= i; j++){
        if(i % j == 0){
            contador++;
        }
    }
    if(contador !== 2){
        arrayNoPrimos.push(i);
        contadorNoPrimos++;
    }
}
document.getElementById("NoPrimos").innerHTML += arrayNoPrimos;
document.getElementById("nonPrimos").innerHTML += contadorNoPrimos;
*/

/*
let arrayNumeros = [];
let arrayOrdenados = [];
for(let i = 0; i < 10; i++){
    arrayNumeros[i] = numero;
    arrayOrdenados = arrayNumeros.sort(function(a, b){return a-b});
}
document.getElementById("numeros").innerHTML += "Números: " + arrayNumeros + "<br>";
document.getElementById("menor").innerHTML += "Número menor: " + arrayOrdenados[0] + "<br>";
document.getElementById("mayor").innerHTML += "Número mayor: " + arrayOrdenados[arrayOrdenados.length - 1] + "<br>";    
*/

/*
let arrayNumeros2 = [];
let arrayOrdenados2 = [];
for(let i = 0; i < 10; i++){
    arrayNumeros2[i] = numero;
    arrayOrdenados2 = arrayNumeros2.sort(function(a, b){return a-b});
}
document.getElementById("numeros2").innerHTML += "Números: " + arrayNumeros2 + "<br>";
document.getElementById("menor2").innerHTML += "Número menor: " + arrayOrdenados2[0] + "<br>";
document.getElementById("mayor2").innerHTML += "Número mayor: " + arrayOrdenados2[arrayOrdenados2.length - 1] + "<br>";    
*/

/*EJERCICIO 3
    Crea un script que permita identificar la talla de una prenda de ropa, a partir 
    de las tallas europeas. Los valores de la tallas europeas son: XXL, XL,L,M,S, XS, XXS. 
    La talla esperada sería: Grande, Mediana y Pequeña. 
    Introducir valor por teclado y sacar resultado por pantalla. 
    Ayuda:  
    Grande: {XXL,XL,L}; Mediana:{S}; Pequeña: {S, XS, XXS}
*/

/*
let talla = prompt("Escriba una de talla de ropa:");
talla.toUpperCase();

let categoria;

if(talla === "XXL" || talla === "XL" || talla === "L"){
    categoria = "Grande";
}else if(talla === "M"){
    categoria = "Mediana";
}else if(talla === "S"|| talla === "XS" || talla === "XXS"){
    categoria = "Pequeña";
}
document.getElementById("tallaRopa").innerHTML += "La talla de ropa seleccionada es de tipo: "+categoria;
*/

/* EJERCICIO 4:

    Calcular la longitud (L) de la circunferencia, dado su radio empleando objetos 
    propios de Javascript.  
    Ayuda: L=2*π*radio. 


let radio = Math.random() * 10;
let formula = (2 * Math.PI * radio);

document.getElementById("radio").innerHTML = "La longitud es: "+ formula;

*/

/*
    La administración general de loterías europea, nos ha encomendado generar 
    un script para rellenar la puesta de EUROMILLONES de forma aleatoria. 
    Nota:  
    Calcular de 5 números de 1 al 50 
    Calcular 2 estrellas del 1 al 10 
    Ayuda:  
    Math.random(). Genera un número aleatorio entre 0 y 1. 
    Math.ceil(). Redondea al siguiente número entero. 
    Math.round(). Redondea al número entero más próximo. Ej.: 5,4 =5 ó 5,6=6 ó 5,5=6 
    Método array.push(). Añadir un nuevo elemento al array y devolver su nuevo tamaño. 


let arrayNumeros = [];
let arraysEstrellas = [];

for(let i = 0 ; i < 5; i++){
    let numero = Math.random()
    numero *= 50
    numero = Math.round(numero);
    arrayNumeros.push(numero);
}

for(let i = 0 ; i < 2; i++){
    let star = Math.random()
    star *= 10
    star = Math.round(star);
    arraysEstrellas.push(star);
}

document.getElementById("euromillon").innerHTML += "Numero de euromillon: (" + arrayNumeros.join(" - ") + ") Estrellas: (" + arraysEstrellas.join(" - ") + ")";

*/

/* EJERCICIO 7: */
let filas = prompt("Introduce el número de filas:");
let columnas = prompt("Introduce el número de columnas:");

for (let i = 1; i <= filas; i++) {
  for (let j = 1; j <= columnas; j++) {
    Document.write("(" + i + "," + j + ") ");
  }
  Document.write("<br>");
}
