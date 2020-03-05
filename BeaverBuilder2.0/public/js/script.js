
var elementos = document.querySelectorAll('.qty');
console.log(elemento);
for (var elemento of elementos) {
  elemento.onChange = function(){
    console.log(elemento.value);
  }
}
