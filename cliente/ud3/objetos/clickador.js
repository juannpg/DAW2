function clicador() {
  if (typeof Storage !== "undefined") {
    if (localStorage.clickCount) {
      localStorage.clickCount = Number(localStorage.clickCount) + 1;
    } else {
      localStorage.clickCount = 1;
    }

    document.getElementById("result").innerHTML =
      "click" + localStorage.clickCount + "";
  } else {
    document.getElementById("result").innerHTML = "no soportó";
  }
}
