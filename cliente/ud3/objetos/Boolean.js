console.log("new false - no new");
let myFalse = new Boolean(false);
let g = Boolean(myFalse);
console.log(myFalse + "-" + g);

console.log("no new false - no new");
let myFalse2 = Boolean(false);
let g2 = Boolean(myFalse2);
console.log(myFalse2 + "-" + g2);

console.log("no new true - no new");
let myFalse3 = Boolean(true);
let g3 = Boolean(myFalse3);
console.log(myFalse3 + "-" + g3);

console.log("new true - no new");
let myFalse4 = new Boolean(true);
let g4 = Boolean(myFalse4);
console.log(myFalse4 + "-" + g4);

console.log("new true - new");
let myFalse5 = new Boolean(true);
let g5 = new Boolean(myFalse5);
console.log(myFalse5 + "-" + g5);

console.log("new false - new");
let myFalse6 = new Boolean(false);
let g6 = new Boolean(myFalse6);
console.log(myFalse6 + "-" + g6);
