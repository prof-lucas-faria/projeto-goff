<div>
    <?php require_once '../controller/pedidoController.php';?>
    <fieldset>
        <div>
            <form name="cadastroPedido" method="POST" action="../controller/pedidoController.php" >
            <div class="campo col_1">
                <select class="col1" id="idMesa" name="idMesa">
                    <option value="">Selecione a mesa</option>
                    <?php foreach (listaMesas() as $mesas){?>
                    <option id="<?= $mesas->idMesa; ?>" value="<?= $mesas->idMesa; ?>"><?= $mesas->nome;?></option>
                    <?php }?>
                </select>
            </div>
            </form>
        </div>
    </fieldset>
    <fieldset>
        <div class="form_pedidos">
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
                <?php 
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
                    <td><?= $quantidade;?></td>
                    <td><?= number_format($itens[0]->precoVenda,2,",",".");?></td>
                    <td class="subTotal"><?= number_format($subTotal,2,",",".");?></td>
                    <td><a href="cadastroProduto.php?excluir_registro=<?php echo $produtos->idProduto; ?>"><button>Excluir</button></a></td>
                </tr>
                <?php }?>
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
        <div class="botao">
            <input class="botao_verde" type="submit" id="observacao" name="observacao" value="Observação">
            <input class="botao_principal" type="submit" id="salvar" name="salvar" value="Salvar">
            <input class="botao_secundario" type="submit" id="cancelar" name="cancelar" value="Cancelar">
            <input class="botao_principal" type="submit" id="imprimir" name="imprimir" value="Imprimir">
        </div>
    </fieldset>
</div>
