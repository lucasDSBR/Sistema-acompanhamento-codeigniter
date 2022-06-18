console.log("Olá mundo");

var elemento = document.getElementsByClassName("trecho-percorrido");
console.log(elemento);
if(elemento != null){
    var cordenadas = elemento[0].getBoundingClientRect();
    console.log(cordenadas);
}
