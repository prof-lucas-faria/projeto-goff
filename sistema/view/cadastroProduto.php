<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE - Cadastro Produtos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div>
        <?php include "header.php" ?>
        <div class="container">
            <div class="menu">
                <?php include "menu_lateral.php" ?>
            </div>
            <div class="form">      
                <?php require_once '../controller/produtoController.php';?>
                <?php 
                // EXIBIR A MENSAGEM DE CONFIRMAÇÃO DE EXCLUIR DADOS
                if (isset($_GET['excluir_registro'])) {
                    foreach (listaProdutos() as $produtos){
                        $caminho = "../assets/img/produtos/";
                        $imagem = $caminho.$produtos->foto;
                        if($produtos->idProduto == $_GET['excluir_registro']){ ?>
                <div>
                    <form name="excluirProduto" method="POST" action="../controller/produtoController.php">
                        <input type="hidden" id="idProduto" name="idProduto" value="<?php echo $produtos->idProduto ?>">
                        <div class="titulo_form">
                            <h2>Excluir Produto</h2>
                        </div>
                        <div class="confirmacao_excluir">
                            <h4>Deseja mesmo excluir o produto?</h4>
                        </div>
                        <div class="form_group">
                            <div class="campo2col_pr">
                                <div class="campo col2">
                                    <label>Nome: </label>
                                    <input class="col2" type="text" id="nome" name="nome" autofocus value="<?php echo $produtos->nome ?>">
                                </div>
                                <div class="campo col2">
                                    <label>Foto: </label>
                                    <?php echo "<img src='$imagem' width='50px' height='50px'/>";?>
                                </div>
                            </div>
                        </div>
                        <div class="botao">
                            <input class="botao_principal" type="submit" id="excluir" name="excluir" value="Excluir">
                            <input class="botao_secundario" type="submit" id="cancelar" name="cancelar" value="Cancelar">
                        </div>
                    </form>
                </div>
                <?php 
                        }
                    }
                } else { ?>
                <!-- FORMULÁRIO PARA INSERIR DADOS -->
                <div>
                    <div class="titulo_form">
            	        <h2>Cadastro Produtos</h2>
                    </div>
                    <fieldset>
                        <div class="form_group">
                            <form name="cadastroProduto" method="POST" action="../controller/produtoController.php" enctype="multipart/form-data">
                            <div class="campo2col_pr">
                                <div class="campo col2">
                                    <label>Nome: </label>
                                    <input class="col2" type="text" id="nome" name="nome" autofocus>
                                </div>
                                <div class="campo col2">
                                    <label>Categoria:</label>
                                    <select class="col2" id="idCategoria" name="idCategoria">
                                        <option value="">--Selecione--</option>
                                        <?php foreach (listaCategorias() as $categorias){?>
                                        <option id="<?= $categorias->idCategoria; ?>" value="<?= $categorias->idCategoria; ?>"><?= $categorias->nome;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="campo3col">
                                <div class="campo col3">
                                    <label>Foto: </label>
                                    <input class="col3" type="file" id="foto" name="foto">
                                </div>

                                <div class="campo col3">
                                    <label>Preço Custo: </label>
                                    <input class="col3" type="text" id="precoCusto" name="precoCusto">
                                </div>
                                <div class="campo col3">
                                    <label>Preço Venda: </label>
                                    <input class="col3" type="text" id="precoVenda" name="precoVenda">
                                </div>
                            </div>
                            <div class="botao">
                                <input class="botao_principal" type="submit" id="salvar" name="salvar" value="Salvar">
                                <input class="botao_secundario" type="reset" value="Novo" />
                            </div>
                            </form>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div>
                            <?php if (listaProdutos() != null) {?>
                            <div class="titulo_table">
                                <h3>Produtos Cadastrados</h3>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Foto</th>
                                    <th>Preco Custo</th>
                                    <th>Preco Venda</th>
                                    <th width="70">Ação</th>
                                </tr>
                                <?php foreach (listaProdutos() as $produtos){?>
                                <?php $caminho = "../assets/img/produtos/";
                                $imagem = $caminho.$produtos->foto;
                                ?>
                                <tr data-id="<?= $produtos->idProduto;?>">
                                    <td align="center"><?= $produtos->idProduto;?></td>
                                    <td><?= $produtos->nome;?></td>
                                    <td><?= $produtos->categoria;?></td>
                                    <td align="center"><?php echo "<img src='$imagem' width='60px' height='60px'/>";?></td>
                                    <td align="right"><?= number_format($produtos->precoCusto,2,",",".");?></td>
                                    <td align="right"><?= number_format($produtos->precoVenda,2,",",".");?></td>
                                    <td align="center" width="70"><a href="cadastroProduto.php?excluir_registro=<?php echo $produtos->idProduto; ?>"><button class="botao_acao_s">Excluir</button></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                            <?php }?>
                        </div>
                    </fieldset>
                </div>
                <?php }?>   
            </div>
        </div> 
        <?php include "footer.php" ?>        
    </div>
</body>
<script type="text/javascript" src="../assets/js/function.js"></script>
</html>