<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Controle Caixas </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>
<body>
    <div>
        <?php include "header.php" ?>
        <div class="container_pdv">
            <div class="menu">
                <?php include "menu_lateral.php" ?>
            </div>
            <div class="form_pdv" id="mydiv">
                <div class="titulo_form">
                   <h2>Finalizar Pedido</h2>
                </div>
                <div>
                    <?php require_once '../controller/pedidoController.php';?>
                    <div>
                        <div >
                            <div class="table">
                                <table>
                                    <tr>
                                        <th>N° Ped</th>
                                        <th>Mesa</th>
                                        <th>Qtd Itens</th>
                                        <th>Total Pedido</th>
                                    </tr>
                                    <?php foreach (listaPedidos() as $pedidos){
                                    if($pedidos->idPedido == $_GET['pedido']){ ?>
                                    <tr data-id="<?= $pedidos->idPedido;?>">
                                        <td align="center"><?= $pedidos->idPedido;?></td>
                                        <td><?= $pedidos->mesa;?></td>
                                        <td align="right"><?= $pedidos->qtdItens;?></td>
                                        <td align="right"><?= number_format($pedidos->totalPedido,2,",",".");?></td>
                                    </tr>
                                   
                                </table>
                            </div>
                            <?php }?>
                        <?php }?>
                        </div>
                        <br><br>
                        <form id="finalizarPedido" name="finalizarPedido" method="POST" action="../controller/pedidoController.php" >
                            <input type="hidden" id="totalPedido" name="totalPedido" value="<?= $pedidos->totalPedido;?>">
                            <input type="hidden" id="idPedido" name="idPedido" value="<?= $pedidos->idPedido;?>">
                            <div class="campocol4">
                                    <div class="campo col4" id="campocol4">
                                        <label id="label">Desconto</label>
                                    </div>
                                    <div class="campo col4">
                                        <input class="col4" type="text" id="desconto" name="desconto" required autofocus>    
                                    </div>
                                    <div class="campo col4" id="campocol4">
                                        <label id="label">Valor a Pagar</label>
                                    </div>
                                    <div class="campo col4">
                                        <input class="col4" type="text" id="valorRecebido" name="valorRecebido" readonly disabled>
                                    </div>
                            </div><br>
                            <div class="campocol3">
                                <div class="campo col3">
                                    <label>Tipo de Pagamento:</label>
                                    <select class="col3" id="tipoRecebimento" name="tipoRecebimento" required>
                                        <option value="1">Dinheiro</option>
                                        <option value="2">Cartão Débito</option>
                                        <option value="3">Cartão Crédito</option>
                                    </select>
                                </div>
                                <div class="campo col3">
                                    <label>Valor Pago: </label>
                                    <input class="col3" type="text" id="valorPago" name="valorPago">
                                </div>
                                <div class="campo col3">
                                    <label>Troco: </label>
                                    <input class="col3" type="text" id="troco" name="troco" readonly disabled>
                                </div>
                                
                            </div>
                        </form>
                        <br>
                        <div class="botao" align="center">
                            <input class="botao_principal" type="submit" form="finalizarPedido" id="finalizar" name="finalizar" value="Finalizar">
                            <input class="botao_secundario" type="submit" form="finalizarPedido" id="cancelar" name="cancelar" value="Cancelar">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php include "footer.php" ?>
    </div>
</body>
<script type="text/javascript">
document.getElementById("desconto").addEventListener('change', function() {
    var totalPedido = document.getElementById('totalPedido').value;
    var desconto = document.getElementById('desconto').value;
    var valorRecebido = totalPedido - desconto;
    valorRecebido = parseFloat(valorRecebido).toFixed(2);
    document.getElementById('valorRecebido').value = valorRecebido;
});
document.getElementById("valorPago").addEventListener('change', function() {
    var valorRecebido = document.getElementById('valorRecebido').value;
    var valorPago = document.getElementById('valorPago').value;
    var troco = valorPago - valorRecebido;
    troco = parseFloat(troco).toFixed(2);
    document.getElementById('troco').value = troco;
});

</script>
</html>