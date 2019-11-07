<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>
<body>

        <?php require_once '../controller/caixaController.php';?>
        <!-- EXIBIR A MENSAGEM DE CONFIRMAÇÃO DE EXCLUIR DADOS -->
        <?php if (isset($_GET['excluir_registro'])) {
            foreach (listacaixas() as $caixas){
                if($caixas->idCaixa == $_GET['excluir_registro']){ ?>
        <div>
            <form name="excluircaixa" method="POST" action="../controller/caixaController.php">
                <div>
                    <input type="hidden" id="idcaixa" name="idcaixa" value="<?php echo $caixas->idcaixa ?>">
                    <h2>Excluir caixa</h2>
                    <h4>Deseja mesmo excluir o caixa?</h4>
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
        	<h2>Cadastrar caixas</h2>
            <div>
            	<form name="cadastrocaixa" method="POST" action="../controller/caixaController.php">
            		<div>
            			<label>Nome: </label>
                        <input type="text" id="nome" name="nome" required="required" autofocus>
                        <input type="hidden" id="idcaixa" name="idcaixa">
                    </div>
                    <div>
                        <label>Funcionário responsável:</label>
                        <select id="idFuncionario" name="idFuncionario">
                            <?php foreach (listaFuncionarios() as $funcionarios){?>
                            <option value="">--Selecione--</option>
                            <option id="<?= $funcionarios->idFuncionario; ?>" value="<?= $funcionarios->idFuncionario; ?>"><?= $funcionarios->nome;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div>
                        <label>Caixa Inicial: </label>
                        <input type="text" id="saldoInicial" name="saldoInicial" required="required">
                    </div>
                    <hr>
                    <div>
                        <input type="submit" id="salvar" name="salvar" value="Salvar">
                        <input type="reset" value="Limpar" />
                    </div>
            	</form>
            </div>
            <hr>
            <div>
                <?php if (listacaixas() != null) {?>
                <h3>caixaS CADASTRADAS</h3>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Funcionário Responsável</th>
                            <th>Saldo Inicial</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php foreach (listacaixas() as $caixas){?>
                    <tbody>
                        <tr data-id="<?= $caixas->idCaixa;?>">
                            <td><?= $caixas->idCaixa;?></td>
                            <td><?= $caixas->nome;?></td>
                            <td><?= $caixas->idFuncionario;?></td>
                            <td><?= $caixas->saldoInicial;?></td>
                            <td><a href="cadastroCaixa.php?excluir_registro=<?php echo $caixas->idCaixa; ?>"><button>Excluir</button></a></td>
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