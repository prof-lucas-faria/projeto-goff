<div>
	<?php
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
</div>


