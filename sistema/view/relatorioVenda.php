<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Relatório de Vendas </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>
<body>
    <div>
        <?php include "header.php" ?>
        <div class="container">
            <div class="menu">
                <?php include "menu_lateral.php" ?>
            </div>
            <div class="form">
                <?php require_once '../controller/pedidoController.php';?>
                <div class="titulo_form">
            	   <h2>Relatório de Vendas</h2>
                </div>
                <fieldset>
                    <div >
                        <?php if (listaVendas() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>N° Ped</th>
                                    <th>Data</th>
                                    <th>Funcionário</th>
                                    <th>Mesa</th>
                                    <th>Tipo Recebimento</th>
                                    <th>Vl Pedido</th>
                                    <th>Desconto</th>
                                    <th>Vl Recebido</th>
                                </tr>
                                <?php foreach (listaVendas() as $pedidos){?>
                                <tr data-id="<?= $pedidos->idPedido;?>">
                                    <td align="center"><?= $pedidos->idPedido;?></td>
                                    <td align="center"><?= date('d/m/Y', strtotime($pedidos->data));?></td>
                                    <td><?= $pedidos->funcionario;?></td>
                                    <td><?= $pedidos->mesa;?></td>
                                    <td><?= $pedidos->tipoRecebimento;?></td>
                                    <td align="right" width="100"><?= number_format($pedidos->totalPedido,2,",",".");?></td>
                                    <td align="right" width="100"><?= number_format($pedidos->desconto,2,",",".");?></td>
                                    <td id="subTotal" align="right" width="100"><?= number_format($pedidos->valorRecebido,2,",",".");?></td>
                                </tr>
                                <?php }?>
                            </table>
                            <div class="total_ped vl_total">
                                <div>
                                    <h3 class="texto">Total das vendas</h3>
                                </div>
                                <div class="vl_total">
                                    <input class="col1" readonly type="text" id="total" name="total">
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </fieldset>
            </div>
        </div>  
        <?php include "footer.php" ?>
    </div>
</body>
<script type="text/javascript" src="../assets/js/function.js"></script>
</html>
