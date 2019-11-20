<div>
	<?php
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
	}
    if (listaProdutos() != null) { 
        foreach (listaProdutos() as $produtos){
        	$caminho = "../assets/img/produtos/";
        	$imagem = $caminho.$produtos->foto;
        ?>
        <div class="item_pedido">
            <?php echo "<a class='produto' href='PDV.php?add=itens&id=".$produtos->idProduto."'>";?>
            <div class="foto">
        		<?php echo "<img src='$imagem' width='60px' height='60px'/>";?>
            </div>
            <div class="descricao">
                <p><?= $produtos->nome;?></p>
            </div>
        </div>
        <?php echo "</a>";?>
        <?php }?>
    <?php }?>
    <?php 

    //unset($_SESSION['itens']);

    ?>
</div>


