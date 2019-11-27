<div>
    <?php
    if (!isset($_SESSION['itens'])) {
        $_SESSION['itens'] = array();
    }
    if (!isset($_SESSION['dados'])) {
        $_SESSION['dados'] = array();
        $_SESSION['dados']['idMesa'] = "";
        $_SESSION['dados']['nome'] = "";
        $_SESSION['dados']['observacao'] = "";
    }
    if (isset($_GET['add']) && $_GET['add'] == "itens") {
        $idProduto = $_GET['id'];
        if (!isset($_SESSION['itens'][$idProduto])) {
            $_SESSION['itens'][$idProduto] = 1;
        }else {
            $_SESSION['itens'][$idProduto] += 1;
        }
        header("Location: ../view/PDV.php");
    }
    if (isset($_GET['del']) && $_GET['del'] == "itens") {
        $idProduto = $_GET['id'];
        if ($_SESSION['itens'][$idProduto] > 1) {
            $_SESSION['itens'][$idProduto] -= 1;
        }else {
            unset($_SESSION['itens'][$idProduto]);
        }
        header("Location: ../view/PDV.php");
    }
    require_once '../controller/pedidoController.php';?>
    <div>
        <form id="cadastroPedido" name="cadastroPedido" method="POST" action="../controller/pedidoController.php" >
            <input type="hidden" id="opcao" name="opcao" value="">
            <?php if ($_SESSION['dados']['idMesa'] == ""){ ?>
            <div class="campo col1">
                <select class="col1" id="idMesa" name="idMesa" required autofocus onchange="enviar_form()">
                    <option value="">Selecione a mesa</option>
                    <?php foreach (listaMesas() as $mesas){?>
                    <option id="<?= $mesas->idMesa; ?>" value="<?= $mesas->idMesa; ?>"><?= $mesas->nome;?></option>
                    <?php }?>
                </select>
            </div>
            <?php } else{ ?>
            <div class="campo col1">
                <input class="col1" type="hidden" id="idMesa" name="idMesa" onchange="enviar_form()" value="<?php echo $_SESSION['dados']['idMesa']; ?> ">
                <select class="col1" id="idMesa" name="idMesa" required autofocus onchange="enviar_form()">
                    <option selected="selected" value="<?php echo $_SESSION['dados']['idMesa']; ?>"><?php echo $_SESSION['dados']['nome'] ?></option>
                    <option value="">Selecione a mesa</option>
                    <?php foreach (listaMesas() as $mesas){?>
                    <option id="<?= $mesas->idMesa; ?>" value="<?= $mesas->idMesa; ?>"><?= $mesas->nome;?></option>
                    <?php }?>
                </select>
            </div>
            <?php } ?>
            <div class="form_pedidos">
            <table>
                <tr>
                    <th>Produto</th>
                    <th width="40">Qtd</th>
                    <th width="80">Preço</th>
                    <th width="80">Subtotal</th>
                    <th width="60"></th>
                </tr>
                <?php 
                $_SESSION['itensPedido'] = array();
                $conexao = new PDO("mysql:host=127.0.0.1;dbname=sistemagerente", 'root', "");
                foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
                    $sql = 'SELECT * FROM produtos WHERE idProduto = ?';
                    $stmt = $conexao->prepare($sql);
                    $stmt->bindValue(1, $idProduto);
                    $stmt->execute();
                    $itens = $stmt->fetchAll(PDO::FETCH_OBJ);
                    $subTotal = $quantidade * $itens[0]->precoVenda;
                ?>
                <tr data-id="<?= $itens[0]->idProduto;?>">
                    <td><?= $itens[0]->nome;?></td>
                    <td id="quant" width="40" align="center"><?= $quantidade;?></td>
                    <td width="80" align="right"><?= number_format($itens[0]->precoVenda,2,",",".");?></td>
                    <td id="subTotal" width="80" align="right"><?= number_format($subTotal,2,",",".");?></td>
                    <td><a href="PDV.php?del=itens&id=<?php echo $itens[0]->idProduto; ?>"><button class="botao_acao_s" width="60">Excluir</button></a></td>
                </tr>
                <?php

                array_push($_SESSION['itensPedido'],
                    array(
                        'idProduto' => $idProduto,
                        'quantidade' => $quantidade
                    )
                );

                 }?>
            </table>
        </div>
        <div class="total_ped">
            <div class="total_ped qtd_itens">
                <div>
                    <label>Qtd de itens</label>
                </div>
                <div class="vl_total">
                    <input class="col1" readonly type="text" id="qtd_itens" name="qtd_itens">    
                </div>
            </div>
            <div class="total_ped vl_total">
                <div>
                    <label>Total geral</label>
                </div>
                <div class="vl_total">
                    <input class="col1" readonly type="text" id="total" name="total">
                </div>
            </div>
        </div>
        <?php if ($_SESSION['dados']['observacao'] != ""){ ?>
        <div class="campo col1">
            <label>Observação: </label>
            <?php $observacao = $_SESSION['dados']['observacao']; ?>
            <textarea id="observacao" name="observacao" onchange="enviar_form()"><?php echo $observacao;?></textarea>
        </div>

        <?php } else{ ?>

        <div class="campo col1" id="div_obs">
            <label>Observação: </label>
            <textarea id="observacao" name="observacao" onchange="enviar_form()"></textarea>
        </div>            

        <?php } ?>
        </form>
        <div class="botao" align="center">
            <button class="botao_verde" onclick="mostrar_obs()" id="observacao" name="observacao">Observação</button>
            <input class="botao_principal" type="submit" form="cadastroPedido" id="salvar" name="salvar" value="Salvar">
            <input class="botao_secundario" type="submit" form="cadastroPedido" id="cancelar" name="cancelar" value="Cancelar">
        </div>
        <div >
            <?php if (listaPedidos() != null) {?>
            <div class="titulo_table">
                <h3>Pedidos Lançados</h3>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>N° Ped</th>
                        <th>Mesa</th>
                        <th>Qtd Itens</th>
                        <th>Total Pedido</th>
                        <th colspan="2" width="140">Ação</th>
                    </tr>
                    <?php foreach (listaPedidos() as $pedidos){?>
                    <tr data-id="<?= $pedidos->idPedido;?>">
                        <td align="center"><?= $pedidos->idPedido;?></td>
                        <td><?= $pedidos->mesa;?></td>
                        <td><?= $pedidos->qtdItens;?></td>
                        <td align="right"><?= number_format($pedidos->totalPedido,2,",",".");?></td>
                        <td class="botao_acao"><a href="finalizarPedido.php?pedido=<?php echo $pedidos->idPedido; ?>"><button class="botao_acao_p">Finalizar</button></a>
                            <a href="../controller/pedidoController.php?excluir=<?php echo $pedidos->idPedido; ?>"><button class="botao_acao_s">Excluir</button></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <?php }?>
        </div>
    </div>
</div>
