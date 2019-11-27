<?php 
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
    session_start();
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../assets/css/pdf.css" />
</head>
<body>
    <fieldset>
        <div>
            <h1>SISTEMA GERENTE</h1>
             <h2>CERES - GO</h2>
        
        </div>
    
    <div class='center sub-titulo'>
    <?php foreach (imprimirPedidos() as $pedidos){}
        if($pedidos->idPedido == $_GET['pedido']){ ?>
        <p>Pedido nº:   <?php echo $pedidos->idPedido; ?></p>
        <p>Mesa:   <?php echo $pedidos->mesa; ?></p>
        <p><?php echo $pedidos->data; ?></p>
    <?php }?>
    </div>
    <div align="center">
        <div class="table">
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach (imprimirPedidos() as $pedidos){
                    if($pedidos->idPedido == $_GET['pedido']){ ?>
                <?php $subtotal = $pedidos->quantidade * $pedidos->precoVenda; 
                ?>
                <tr data-id="<?= $pedidos->idPedido;?>">
                    <td><?= $pedidos->produto;?></td>
                    <td align="right"><?= $pedidos->quantidade;?></td>
                    <td align="right"><?= $pedidos->precoVenda;?></td>
                    <td align="right" id="subTotal"><?= number_format($subtotal,2,".",".");?></td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td colspan="3"><strong>Total das Vendas</strong></td>
                    <td align="right"><strong><div id="total"></div></strong></td>
                </tr>
            </table>
        </div>
    </div>
    </fieldset>
</body>
<script type="text/javascript" >
var tdsValores = document.querySelectorAll('#subTotal')
var total = 0
for (var i = 0; i < tdsValores.length; i++) {
    var valor = parseFloat(tdsValores[i].textContent)
    total = total + valor
}
total = parseFloat(total).toFixed(2);
document.getElementById('total').innerHTML = total;
</script>
</html>

