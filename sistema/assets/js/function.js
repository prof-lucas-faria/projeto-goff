var tdsValores = document.querySelectorAll('.subTotal')
var total = 0
for (var i = 0; i < tdsValores.length; i++) {
    var valor = parseFloat(tdsValores[i].textContent)
    total = total + valor
}
total = total.toLocaleString('pt-br', {minimumFractionDigits: 2});
document.getElementById('total').value = total;



function ocultar() {
    if(document.getElementById("novaFoto").value == ""){
        document.getElementById("foto").style.display = "block";    
    } else {
        document.getElementById("foto").style.display = "none"; 
    }
    
}



/*
var divh = document.getElementById('mydiv').offsetWidth;
     alert("Largura = " + divh);
*/
