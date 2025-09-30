let x = 123;

document.getElementById("demo").innerHTML =
  x.toString() + "<br>" + (123).toString() + "<br>" + (100 + 23).toString();

document.getElementById("demo2").innerHTML = x.toString(2);
