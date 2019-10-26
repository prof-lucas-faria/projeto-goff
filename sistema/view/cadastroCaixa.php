<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
</head>
<body>
    <?php require_once '../controller/caixaController.php';?>
    <!-- FORMULÁRIO PARA EDITAR DADOS -->
    <?php if(isset($_GET['editar_registro'])){
        foreach (listacaixas() as $caixas){
            if($caixas->idcaixa == $_GET['editar_registro']){ ?>
    <h2>Editar Cadastro caixas</h2>
    <div>
        <form name="editarcaixa" method="POST" action="../controller/caixaController.php">
            <div>
                <input type="hidden" id="idcaixa" name="idcaixa" value="<?php echo $caixas->idcaixa ?>">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" required="required" autofocus value="<?php echo $caixas->nome ?>">
            </div>
            <div>
                    <label>Caixa Inicial: </label>
                    <input type="text" id="caixaInicial" name="caixaInicial" required="required">
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
        foreach (listacaixas() as $caixas){
            if($caixas->idcaixa == $_GET['excluir_registro']){ ?>
    <div>
        <form name="excluircaixa" method="POST" action="../controller/caixaController.php">
            <div>
                <input type="hidden" id="idcaixa" name="idcaixa" value="<?php echo $caixas->idcaixa ?>">
                <h2>Excluir caixa</h2>
                <h4>Deseja mesmo excluir a caixa?</h4>
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
                    <label>Caixa Inicial: </label>
                    <input type="text" id="caixaInicial" name="caixaInicial" required="required">
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
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <?php foreach (listacaixas() as $caixas){?>
                <tbody>
                    <tr data-id="<?= $caixas->idcaixa;?>">
                        <td><?= $caixas->idcaixa;?></td>
                        <td><?= $caixas->nome;?></td>
                        <td><a href="cadastrocaixa.php?editar_registro=<?php echo $caixas->idcaixa; ?>"><button>Editar</button></a></td>
                        <td><a href="cadastrocaixa.php?excluir_registro=<?php echo $caixas->idcaixa; ?>"><button>Excluir</button></a></td>
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