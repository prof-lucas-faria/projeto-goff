<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Relatório de Pedidos </title>
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
            	   <h2>Relatório de Pedidos em Aberto</h2>
                </div>
                <fieldset>
                    <div >
                        <?php if (listaPedidos() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>N° Ped</th>
                                    <th>Data / Hora</th>
                                    <th>Funcionário</th>
                                    <th>Mesa</th>
                                    <th>Qtd Itens</th>
                                    <th align="center" width="120">Ação</th>
                                </tr>
                                <?php foreach (listaPedidos() as $pedidos){?>
                                <tr data-id="<?= $pedidos->idPedido;?>">
                                    <td align="center"><?= $pedidos->idPedido;?></td>
                                    <td align="center"><?= date('d/m/Y H:i:s', strtotime($pedidos->data));?></td>
                                    <td><?= $pedidos->funcionario;?></td>
                                    <td><?= $pedidos->mesa;?></td>
                                    <td align="center"><?= $pedidos->qtdItens;?></td>
                                    <td align="center" width="120"><a href="impressaoPedido.php?pedido=<?php echo $pedidos->idPedido; ?>" target="_blank"><button class="botao_acao_p" id="botao_rel">Abrir</button></a></td>
                                </tr>
                                <?php }?>
                            </table>
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
