<nav>
    <ul class='nav'>        
        <!-- MENU COM SUBMENU -->
        <?php if ($_SESSION['dados_usuario']->funcao == 'Administrador'): ?>
        <li><a href="#"> Cadastros </a>
            <ul>
                <li><a href="cadastroCaixa.php"> Caixas </a></li>
                <li><a href="cadastroCategoria.php"> Categorias </a></li>
                <li><a href="cadastroFuncionario.php"> Funcionários </a></li>
                <li><a href="cadastroMesa.php"> Mesas </a></li>
                <li><a href="cadastroProduto.php"> Produtos </a></li>
            </ul>
        </li>
            
        

        <li><a href="#"> Vendas </a>
            <ul>
                <li><a href="PDV.php"> PDV </a></li>
            </ul>
        </li>
        <?php endif ?>
        <li><a href="#"> Relatórios </a>
            <ul><?php if ($_SESSION['dados_usuario']->funcao == 'Administrador') { ?>
                

                <li><a href="relatorioCaixa.php"> Caixas </a></li>
                <li><a href="relatorioCategoria.php"> Categorias </a></li>
                <li><a href="relatorioFuncionario.php"> Funcionários </a></li>
                <li><a href="relatorioMesa.php"> Mesas </a></li>
                <?php } ?>
                <li><a href="relatorioPedido.php"> Pedidos </a></li>
                <?php if ($_SESSION['dados_usuario']->funcao == 'Administrador') { ?>
                <li><a href="relatorioProduto.php"> Produtos </a></li>
                <li><a href="relatorioVenda.php"> Vendas </a></li>
                <li><a href="relatorioVendaPorRecebimento.php"> Vendas por Recebimento </a></li>
                <?php } ?>
            </ul>
        </li>
        <!-- MENU SIMPLES -->
        <li>
            <a href="../controller/logout.php"> Sair </a>
        </li>
    </ul>
</nav>


