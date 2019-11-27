var tdsValores = document.querySelectorAll('#subTotal')
var total = 0
for (var i = 0; i < tdsValores.length; i++) {
    var valor = parseFloat(tdsValores[i].textContent)
    total = total + valor
}
total = total.toLocaleString('pt-br', {minimumFractionDigits: 2});
document.getElementById('total').value = total;


var tdsQuant = document.querySelectorAll('#quant')
var t_quant = 0
for (var i = 0; i < tdsQuant.length; i++) {
    var valor = parseInt(tdsQuant[i].textContent)
    t_quant = t_quant + valor
}
document.getElementById('qtd_itens').value = t_quant;

function ocultar() {
    if(document.getElementById("novaFoto").value == ""){
        document.getElementById("foto").style.display = "block";    
    } else {
        document.getElementById("foto").style.display = "none"; 
    }
}

function mostrar_obs() {
    document.getElementById("div_obs").style.display = "block";    
}


function enviar_form(){
    document.getElementById("opcao").value = "sessao";
    document.getElementById("cadastroPedido").submit();
}

/*
var divh = document.getElementById('mydiv').offsetWidth;
     alert("Largura = " + divh);
*/
