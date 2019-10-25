<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
</head>
<body>
    <?php require_once '../controller/produtoController.php';?>
    <!-- FORMULÁRIO PARA EDITAR DADOS -->
    <?php if(isset($_GET['editar_registro'])){
        foreach (listaProdutos() as $produtos){
            if($produtos->idProduto == $_GET['editar_registro']){ ?>
    <h2>Editar Cadastro Produtos</h2>

    <div>
        <form name="editarProduto" method="POST" action="../controller/ProdutoController.php">

            <div>
                <input type="hidden" id="idProduto" name="idProduto" value="<?php echo $produtos->idProduto ?>">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" autofocus value="<?php echo $produtos->nome ?>">
            </div>

             <div>
                <label>Categoria:</label>
                <select id="categoria" name="idCategoria">
                    <option selected="selected" value="<?php echo $produtos->idCategoria ?>"><?php echo $produtos->idCategoria ?></option>
                    <option value="">--Selecione--</option>
                    <option value="1">Sanduba</option>
                    <option value="2">Espeto</option>
                </select>
            </div>
<!-- 
            <label>foto: </label>
                <input type="file" id="foto" name="foto"  value="<?php echo $produtos->foto ?>">
            </div>


 -->
            <div>
                <label>Digite o nome da foto teste 25: </label>
                <input type="text" id="foto" name="foto" value="<?php echo $produtos->foto ?>">
            </div>

            

            <div>
                <label>Preço Custo: </label>
                <input type="text" id="precoCusto" name="precoCusto" value="<?php echo $produtos->precoCusto ?>">
            </div>


            <div>
                <label>Preço Venda: </label>
                <input type="text" id="precoVenda" name="precoVenda" value="<?php echo $produtos->precoVenda ?>">
            </div>


             <div>
                <label>Status:</label>
                <select id="status" name="status">
                    <option value="1"  <?php  if($produtos->status == 1){echo 'selected';} ?>>Ativo</option>
                    <option value="0"  <?php  if($produtos->status == 0){echo 'selected';} ?>>Inativo</option>
                </select>
            </div>


            <hr>
            <div>
                <input type="submit" id="editar" name="editar" value="Editar">
                <input type="submit" id="cancelar" name="cancelar" value="Cancelar">
            </div>
        </form>
    </div>


    <?php
            }
        }
        
    // EXIBIR A MENSAGEM DE CONFIRMAÇÃO DE EXCLUIR DADOS
    } elseif (isset($_GET['excluir_registro'])) {
        foreach (listaProdutos() as $produtos){
            if($produtos->idProduto == $_GET['excluir_registro']){ ?>
    <div>
        <form name="excluirProduto" method="POST" action="../controller/produtoController.php">
            <div>
                <input type="hidden" id="idProduto" name="idProduto" value="<?php echo $produtos->idProduto ?>">
                <h2>Excluir Produto</h2>
                <h4>Deseja mesmo excluir o produto?</h4>
            </div>
            <hr>
            <div>
                <input type="submit" id="excluir" name="excluir" value="Excluir">
                <input type="submit" id="cancelar" name="cancelar" value="Cancelar">
            </div>
        </form>
    </div>
    <?php 
            }
        }
    } else { ?>




    <!-- FORMULÁRIO PARA INSERIR DADOS -->
    <div>
    	<h2>Cadastro Produtos</h2>
        <div>
            <form name="cadastroProduto" method="POST" action="../controller/produtoController.php">
              
            <div>
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" autofocus value="">
            </div>

             <div>
                <label>Categoria:</label>
                <select id="categoria" name="idCategoria">
                    <option value="">--Selecione--</option>
                    <option value="1">Sanduba</option>
                    <option value="2">Espeto</option>
                </select>

<!--             </div>
                <label>foto: </label>
                <input type="file" id="foto" name="foto"  value="">
            </div>
 -->
            

            <div>
                <label>Digite o nome da foto teste 25: </label>
                <input type="text" id="foto" name="foto" value="">
            </div>

            <div>
                <label>Preço Custo: </label>
                <input type="text" id="precoCusto" name="precoCusto" value="">
            </div>


            <div>
                <label>Preço Venda: </label>
                <input type="text" id="precoVenda" name="precoVenda" value="">
            </div>

                <div>
                    <input type="submit" id="salvar" name="salvar" value="Salvar">
                    <input type="reset" value="Novo" />
                </div>
            </form>
        </div>
        <hr>
        <div>
            <?php if (listaProdutos() != null) {?>
            <h3>PRODUTOS CADASTRADOS</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Foto</th>
                        <th>Preco Custo</th>
                        <th>Preco Venda</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <?php foreach (listaProdutos() as $produtos){?>
                <tbody>
                    <tr data-id="<?= $produtos->idProduto;?>">
                        <td><?= $produtos->idProduto;?></td>
                        <td><?= $produtos->nome;?></td>
                        <td><?= $produtos->idCategoria;?></td>
                        <td><?= $produtos->foto;?></td>
                        <td><?= $produtos->precoCusto;?></td>
                        <td><?= $produtos->precoVenda;?></td>
                        <td><a href="cadastroProdutos.php?editar_registro=<?php echo $produtos->idProduto; ?>"><button>Editar</button></a></td>
                        <td><a href="cadastroProdutos.php?excluir_registro=<?php echo $produtos->idProduto; ?>"><button>Excluir</button></a></td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
            <?php }?>
        </div>
    </div>
    <?php }?>    
</body>
</html>