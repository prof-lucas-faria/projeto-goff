<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Controle Caixas </title>
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
                <?php require_once '../controller/caixaController.php';?>
                <!-- EXIBIR A MENSAGEM DE CONFIRMAÇÃO DE EXCLUIR DADOS -->
                <?php if (isset($_GET['excluir_registro'])) {
                    foreach (listacaixas() as $caixas){
                        if($caixas->idCaixa == $_GET['excluir_registro']){ ?>
                <div>
                    <form name="excluircaixa" method="POST" action="../controller/caixaController.php">
                        <input type="hidden" id="idcaixa" name="idcaixa" value="<?php echo $caixas->idcaixa ?>">
                        <div class="titulo_form">
                            <h2>Excluir Caixa</h2>
                        </div>
                        <div class="confirmacao_excluir">
                            <h3>Deseja mesmo excluir o caixa?</h3>
                        </div>
                        <div class="form_group">
                            <div class="campo col_1">
                                <label>Nome: </label>
                                <input class="col1" readonly type="text" id="nome" name="nome" value="<?php echo $caixas->nome ?>">
                            </div>
                            <div class="campo col_1">
                                <label>Funcionário: </label>
                                <input class="col1" readonly type="text" id="nome" name="nome" value="<?php echo $caixas->funcionario ?>">
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
                	   <h2>Caixas</h2>
                    </div>
                    <fieldset>
                        <div class="form_group">
                        	<form name="cadastrocaixa" method="POST" action="../controller/caixaController.php">
                        		<div class="campo col_1">
                        			<label>Nome: </label>
                                    <input class="col1" type="text" id="nome" name="nome" required="required" autofocus>
                                </div>
                                <div class="campo campo2col">
                                    <div class="campo col2">
                                        <label>Funcionário responsável:</label>
                                        <select class="col2" id="idFuncionario" name="idFuncionario">
                                            <option value="">--Selecione--</option>
                                            <?php foreach (listaFuncionarios() as $funcionarios){?>
                                            <option id="<?= $funcionarios->idFuncionario; ?>" value="<?= $funcionarios->idFuncionario; ?>"><?= $funcionarios->nome;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="campo col2">
                                        <label>Caixa Inicial: </label>
                                        <input class="col2" type="text" id="saldoInicial" name="saldoInicial" required="required">
                                    </div>
                                </div>
                                <div class="botao">
                                    <input class="botao_principal" type="submit" id="salvar" name="salvar" value="Salvar">
                                    <input class="botao_secundario" type="reset" value="Limpar" />
                                </div>
                        	</form>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div>
                            <?php if (listacaixas() != null) {?>
                            <div class="titulo_table">
                                <h3>Caixas Cadastrados</h3>
                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Funcionário Responsável</th>
                                        <th>Saldo Inicial</th>
                                        <th width="70">Ação</th>
                                    </tr>
                                    <?php foreach (listacaixas() as $caixas){?>
                                    <tr data-id="<?= $caixas->idCaixa;?>">
                                        <td><?= $caixas->idCaixa;?></td>
                                        <td><?= $caixas->nome;?></td>
                                        <td><?= $caixas->funcionario;?></td>
                                        <td><?= $caixas->saldoInicial;?></td>
                                        <td width="70"><a href="cadastroCaixa.php?excluir_registro=<?php echo $caixas->idCaixa; ?>"><button class="botao_acao_s">Excluir</button></a></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
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
</html>