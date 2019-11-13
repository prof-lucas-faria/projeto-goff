<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEMA GERENTE - Controle Mesas</title>
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
				<?php require_once '../controller/mesaController.php';?>
			    <!-- FORMULÁRIO PARA EDITAR DADOS -->
			    <?php if(isset($_GET['editar_registro'])){
			        foreach (listaMesas() as $mesas){
			            if($mesas->idMesa == $_GET['editar_registro']){ ?>
			    <div class="titulo_form">
			    	<h2>Editar Cadastro Mesas</h2>	
			    </div>
			    <fieldset>
				    <div class="form_group">
				        <form name="editarMesa" method="POST" action="../controller/mesaController.php">
				            <div class="campo col_1">
				                <input type="hidden" id="idMesa" name="idMesa" value="<?php echo $mesas->idMesa ?>">
				                <label>Nome: </label>
				                <input class="col1" type="text" id="nome" name="nome" required="required" autofocus value="<?php echo $mesas->nome ?>">
				            </div>
				            <div class="botao">
				                <input class="botao_principal" type="submit" id="editar" name="editar" value="Editar">
				                <input class="botao_secundario" type="submit" id="cancelar" name="cancelar" value="Cancelar">
				            </div>
				        </form>
				    </div>
				</fieldset>
			    <?php
			            }
			        }
			    // EXIBIR A MENSAGEM DE CONFIRMAÇÃO DE EXCLUIR DADOS
			    } elseif (isset($_GET['excluir_registro'])) {
			        foreach (listaMesas() as $mesas){
			            if($mesas->idMesa == $_GET['excluir_registro']){ ?>
			    <div>
			        <form name="excluirMesa" method="POST" action="../controller/mesaController.php">
			        	<input type="hidden" id="idMesa" name="idMesa" value="<?php echo $mesas->idMesa ?>">
			            <div class="titulo_form">
			                <h2>Excluir Mesa</h2>
			            </div>
			            <div class="confirmacao_excluir">
			                <h3>Deseja mesmo excluir a mesa?</h3>
			            </div>
			            <div class="form_group">
				            <div class="campo col_1">		
				                <label>Nome: </label>
				                <input class="col1" readonly type="text" id="nome" name="nome" value="<?php echo $mesas->nome ?>">
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
			    		<h2>Mesas</h2>	
			    	</div>
			    	<fieldset>
				        <div class="form_group">
				        	<form name="cadastroMesa" method="POST" action="../controller/mesaController.php">
				        		<div class="campo col_1">
				        			<label>Nome: </label>
				                    <input class="col1" type="text" id="nome" name="nome" required="required" autofocus>
				                </div>
				                <div class="botao">
				                    <input class="botao_principal" type="submit" id="salvar" name="salvar" value="Salvar" >
				                    <input class="botao_secundario" type="reset" value="Limpar" />
				                </div>
				        	</form>
				        </div>
				    </fieldset>
				    <fieldset>
				        <div>
				            <?php if (listaMesas() != null) {?>
				            <div class="titulo_table">
				            	<h3>Mesas Cadastradas</h3>	
				            </div>
				            <div class="table">
					            <table>
				                    <tr>
				                        <th>#</th>
				                        <th>Nome</th>
				                        <th colspan="2" width="140">Ação</th>
				                    </tr>
					                <?php foreach (listaMesas() as $mesas){?>
				                    <tr data-id="<?= $mesas->idMesa;?>">
				                        <td><?= $mesas->idMesa;?></td>
				                        <td><?= $mesas->nome;?></td>
				                        <td class="botao_acao"><a href="cadastroMesa.php?editar_registro=<?php echo $mesas->idMesa; ?>"><button class="botao_acao_p">Editar</button></a>
				                        	<a href="cadastroMesa.php?excluir_registro=<?php echo $mesas->idMesa; ?>"><button class="botao_acao_s">Excluir</button></a></td>
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