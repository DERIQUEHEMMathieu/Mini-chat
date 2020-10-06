// Nombre de caractères max autorisés
const maxLength = 300;

// Span à modifier
let span = document.getElementById("count");
span.innerText = maxLength;

// récupère et ajoute un event au textarea
let textarea = document.getElementById("message");
textarea.addEventListener("keyup", function() {
  let remain = maxLength - this.value.length;
  if(remain >= 0) {
    span.innerText = remain;
  }
  else {
    this.value = this.value.substring(0, maxLength - 1);
  }
});