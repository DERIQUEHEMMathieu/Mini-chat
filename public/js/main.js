// Nombre de caractères max autorisés
const maxLength = 300;
  
// Span à modifier
let span = document.getElementById("count");
span.innerText = maxLength;

// récupère et ajoute un event au textarea
let textarea = document.getElementById("message");
let areaHelp = document.getElementById("messageHelp");
let btn = document.getElementById("new_message");

textarea.addEventListener("keyup", function(){
  let remain = maxLength - this.value.length;
  if(remain >= 0) {
    span.innerText = remain;
  }
  else {
    this.value = this.value.substring(0, maxLength - 1);
  }

  if(this.value.match(/(\bcon(ne|nard|nasse)?\b)|(\bsex(e)?\b)|(\bsalaud?\b)|(\bsalope?\b)|(\bpute?\b)/g)) {
    this.classList.add("border", "border-danger");
    areaHelp.innerText = "Insulte détectée petit malin";
    btn.disabled=true;
  }
  else {
    this.classList.remove("border", "border-danger");
    areaHelp.innerText = "";
    btn.disabled=false;
  }
});