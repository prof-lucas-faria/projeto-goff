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
			    <h2>Editar Cadastro Mesas</h2>
			    <div>
			        <form name="editarMesa" method="POST" action="../controller/mesaController.php">
			            <div>
			                <input type="hidden" id="idMesa" name="idMesa" value="<?php echo $mesas->idMesa ?>">
			                <label class="control-label">Nome: </label>
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
				                    <input type="submit" id="salvar" name="salvar" value="Salvar" class="botao_salvar">
				                    <input type="reset" value="Limpar" class="botao_limpar"/>
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
				                        <td width="140"><a href="cadastroMesa.php?editar_registro=<?php echo $mesas->idMesa; ?>"><button>Editar</button></a>
				                        	<a href="cadastroMesa.php?excluir_registro=<?php echo $mesas->idMesa; ?>"><button>Excluir</button></a></td>
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