<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEMA GERENTE</title>
</head>


<body>
	<div>
	<?php require_once '../controller/produtoController.php';
	if (!isset($_SESSION['itens'])) {
		$_SESSION['itens'] = array();
	}
	if (isset($_GET['add']) && $_GET['add'] == "itens") {
		$idProduto = $_GET['id'];
		if (!isset($_SESSION['itens'][$idProduto])) {
			$_SESSION['itens'][$idProduto] = 1;
		}else {
			$_SESSION['itens'][$idProduto] += 1;
		}
	} ?>
	<table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Qtd</th>
                <th>Preço</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
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
        <tbody>
            <tr data-id="<?= $itens[0]->idProduto;?>">
                <td><?= $itens[0]->nome;?></td>
                <td><?= $quantidade;?></td>
                <td><?= number_format($itens[0]->precoVenda,2,",",".");?></td>
                <td class="subTotal"><?= number_format($subTotal,2,",",".");?></td>
                <td><a href="cadastroProduto.php?excluir_registro=<?php echo $produtos->idProduto; ?>"><button>Excluir</button></a></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
	Total geral<input type="text" id="total" name="total">
	<?php 

	//unset($_SESSION['itens']);

	?>
	</div>
	<div>
        <?php if (listaProdutos() != null) {?>
        <h3>PRODUTOS CADASTRADOS</h3>
        <table>
        	<tr>
	            <?php 
	            $cont = 0;
	            foreach (listaProdutos() as $produtos){
	            	$cont++;
	            	$caminho = "../assets/img/produtos/";
	            	$imagem = $caminho.$produtos->foto;

	            ?>
        		<td><center><?php echo "<a href='itensPedido.php?add=itens&id=".$produtos->idProduto."'><img src='$imagem' width='70px' height='70px'/></a>";?><p><?= $produtos->nome;?></p></center></td>
        		<?php 
        		if($cont == 3){
        			echo "</tr>";
        			echo "<tr>";
        			$cont = 0;
        		}

        		}?>
        	</tr>

            
        </table>
        <?php }?>
    </div>	
</body>
<script>
    var tdsValores = document.querySelectorAll('.subTotal')

    var total = 0

    for (var i = 0; i < tdsValores.length; i++) {

        var valor = parseFloat(tdsValores[i].textContent)

        total = total + valor
    }

    total = total.toLocaleString('pt-br', {minimumFractionDigits: 2});

    console.log(total) 
    document.getElementById('total').value = total;
</script>
</html>

