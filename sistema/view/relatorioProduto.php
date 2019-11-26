<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Relatorio de Produtos </title>
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
                <?php require_once '../controller/produtoController.php';?>
                <div class="titulo_form">
            	   <h2>Relatório de Produtos</h2>
                </div>
                <fieldset>
                    <div>
                        <?php if (listaProdutos() != null) {?>
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Foto</th>
                                <th>Preco Custo</th>
                                <th>Preco Venda</th>

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
                                <td align="right"><?= $produtos->precoCusto;?></td>
                                <td align="right"><?= $produtos->precoVenda;?></td>
                            </tr>
                            <?php }?>
                        </table>
                        <?php }?>
                    </div>
                </fieldset>
            </div>
        </div>  
        <?php include "footer.php" ?>
    </div>
</body>
</html>
