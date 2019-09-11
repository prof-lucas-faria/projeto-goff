
<nav class="menu">
    <ul class="sidebar-menu metismenu" id="sidebar-menu">
        <li class="active">
            <a href="index.php">
                <i class="fa fa-home"></i> Painel </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-th-large"></i> Cadastros <i class="fa arrow"></i>
            </a>
            <ul class="sidebar-nav">
            	<?php if ($_SESSION['dados_usuario']->status =='2') {?>
                <li>
                    <a href="cadastro_coordenador.php"> Coordenador </a>
                </li>
                <?php }?>
                <li>
                    <a href="cadastro_funcionario.php"> Funcionário </a>
                </li>
                <li>
                    <a href="cadastro_setor.php"> Setor </a>
                </li>
                <li>
                    <a href="cadastro_item.php"> Item </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="">
                <i class="fa fa-table"></i> Relatórios <i class="fa arrow"></i>
            </a>
            <ul class="sidebar-nav">
            <li>
                    <a href="relatorio_emprestimos.php"> Relatório de Empréstimos </a>
                </li>
                <li>
                    <a href="relatorio_devolucoes.php"> Relatório de Devoluções </a>
                </li>
                <li>
                    <a href="relatorio_estoque.php"> Relatório de Estoque </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="">
                <i class="fa fa-desktop"></i> Empréstimos <i class="fa arrow"></i>
            </a>
            <ul class="sidebar-nav">
            <li>
                    <a href="cadastro_emprestimo.php"> Realizar Empréstimo </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="">
                <i class="fa fa-file-text-o"></i> Devoluções <i class="fa arrow"></i>
            </a>
            <ul class="sidebar-nav">
            <li>
                  <a href="realizar_devolucao.php"> Realizar Devolução </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="sobre.php">
            <i class="fa fa-file-text-o"></i> Sobre </a>
        </li>
        <li>
            <a href="../controller/logout.php">
            <i class="fa fa-power-off icon"></i> Sair </a>
        </li>


    </ul>
</nav>
