<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
</head>
<body>
    <?php require_once '../controller/mesaController.php';?>
    <!-- FORMULÁRIO PARA EDITAR DADOS -->
    <?php if(isset($_GET['editar_registro'])){
        foreach (listaMesas() as $mesas){
            if($mesas->idMesa == $_GET['editar_registro']){ ?>
    <h2>Editar Cadastro Mesas</h2>
    <div>
        <form name="editarMesa" method="POST" action="../controller/mesaController.php">
            <div>
                <input type="hidden" id="idMesa" name="idMesa" value="<?php echo $mesas->idMesa ?>">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" required="required" autofocus value="<?php echo $mesas->nome ?>">
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
        foreach (listaMesas() as $mesas){
            if($mesas->idMesa == $_GET['excluir_registro']){ ?>
    <div>
        <form name="excluirMesa" method="POST" action="../controller/mesaController.php">
            <div>
                <input type="hidden" id="idMesa" name="idMesa" value="<?php echo $mesas->idMesa ?>">
                <h2>Excluir Mesa</h2>
                <h4>Deseja mesmo excluir a mesa?</h4>
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
    	<h2>Cadastrar Mesas</h2>
        <div>
        	<form name="cadastroMesa" method="POST" action="../controller/mesaController.php">
        		<div>
        			<label>Nome: </label>
                    <input type="text" id="nome" name="nome" required="required" autofocus>
                    <input type="hidden" id="idMesa" name="idMesa">
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
            <?php if (listaMesas() != null) {?>
            <h3>MESAS CADASTRADAS</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <?php foreach (listaMesas() as $mesas){?>
                <tbody>
                    <tr data-id="<?= $mesas->idMesa;?>">
                        <td><?= $mesas->idMesa;?></td>
                        <td><?= $mesas->nome;?></td>
                        <td><a href="cadastroMesa.php?editar_registro=<?php echo $mesas->idMesa; ?>"><button>Editar</button></a></td>
                        <td><a href="cadastroMesa.php?excluir_registro=<?php echo $mesas->idMesa; ?>"><button>Excluir</button></a></td>
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