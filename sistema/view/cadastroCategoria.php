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
        foreach (listaCategorias() as $categorias){
            if($categorias->idCategoria == $_GET['editar_registro']){ ?>
    <h2>Editar Cadastro Categorias</h2>
    <div>
        <form name="editarCategoria" method="POST" action="../controller/categoriaController.php">
            <div>
                <input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $categorias->idCategoria ?>">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" required="required" autofocus value="<?php echo $categorias->nome ?>">
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
        foreach (listaCategorias() as $categorias){
            if($categorias->idCategoria == $_GET['excluir_registro']){ ?>
    <div>
        <form name="excluirCategoria" method="POST" action="../controller/categoriaController.php">
            <div>
                <input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $categorias->idCategoria ?>">
                <h2>Excluir Categoria</h2>
                <h4>Deseja mesmo excluir a categoria?</h4>
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
    	<h2>Cadastrar Categorias</h2>
        <div>
        	<form name="cadastroCategoria" method="POST" action="../controller/categoriaController.php">
        		<div>
        			<label>Nome: </label>
                    <input type="text" id="nome" name="nome" required="required" autofocus>
                    <input type="hidden" id="idCategoria" name="idCategoria">
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
            <?php if (listaCategorias() != null) {?>
            <h3>CATEGORIAS CADASTRADAS</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <?php foreach (listaCategorias() as $categorias){?>
                <tbody>
                    <tr data-id="<?= $categorias->idCategoria;?>">
                        <td><?= $categorias->idCategoria;?></td>
                        <td><?= $categorias->nome;?></td>
                        <td><a href="cadastroCategoria.php?editar_registro=<?php echo $categorias->idCategoria; ?>"><button>Editar</button></a></td>
                        <td><a href="cadastroCategoria.php?excluir_registro=<?php echo $mesas->idCategoria; ?>"><button>Excluir</button></a></td>
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
?>
