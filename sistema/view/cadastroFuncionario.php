<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
</head>
<body>
    <?php require_once '../controller/funcionarioController.php';?>
    <!-- FORMULÁRIO PARA EDITAR DADOS -->
    <?php if(isset($_GET['editar_registro'])){
        foreach (listaFuncionarios() as $funcionarios){
            if($funcionarios->idFuncionario == $_GET['editar_registro']){ ?>
    <h2>Editar Cadastro Funcionários</h2>
    <div>
        <form name="editarFuncionario" method="POST" action="../controller/funcionarioController.php">
            <div>
                <input type="hidden" id="idFuncionario" name="idFuncionario" value="<?php echo $funcionarios->idFuncionario ?>">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" autofocus value="<?php echo $funcionarios->nome ?>">
            </div>
            <div>
                <label>CPF: </label>
                <input type="text" id="CPF" name="CPF"  value="<?php echo $funcionarios->CPF ?>">
            </div>
            <div>
                <label>Endereço: </label>
                <input type="text" id="endereco" name="endereco"  value="<?php echo $funcionarios->endereco ?>">
            </div>
            <div>
                <label>Sexo:</label>
                <select id="sexo" name="sexo">
                    <option selected="selected" value="<?php echo $funcionarios->sexo ?>"><?php echo $funcionarios->sexo ?></option>
                    <option value="">--Selecione--</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
            <div>
                <label>Função:</label>
                <select id="funcao" name="funcao">
                    <option selected="selected" value="<?php echo $funcionarios->funcao ?>"><?php echo $funcionarios->funcao ?></option>
                    <option value="">--Selecione--</option>
                    <option value="1">Administrador</option>
                    <option value="2">Atendende / Caixa</option>
                    <option value="3">Garçom</option>
                    <option value="4">Cozinheiro</option>
                </select>
            </div>
            <div>
                <label>Telefone: </label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $funcionarios->telefone ?>">
            </div>
            <div>
                <label>Whatsapp: </label>
                <input type="text" id="whatsapp" name="whatsapp" value="<?php echo $funcionarios->whatsapp ?>">
            </div>          
            <div>
                <label>E-mail: </label>
                <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email" value="<?php echo $funcionarios->email ?>">
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
        foreach (listaFuncionarios() as $funcionarios){
            if($funcionarios->idFuncionario == $_GET['excluir_registro']){ ?>
    <div>
        <form name="excluirFuncionario" method="POST" action="../controller/funcionarioController.php">
            <div>
                <input type="hidden" id="idFuncionario" name="idFuncionario" value="<?php echo $funcionarios->idFuncionario ?>">
                <h2>Excluir Funcionário</h2>
                <h4>Deseja mesmo excluir o funcionário?</h4>
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
    	<h2>Cadastro Funcionários</h2>
        <div>
            <form name="cadastroFuncionario" method="POST" action="../controller/funcionarioController.php">
                <div>
                    <label>Nome: </label>
                    <input type="text" id="nome" name="nome" required="required" autofocus>
                </div>
                <div>
                    <label>CPF: </label>
                    <input type="text" id="CPF" name="CPF" required="required">
                </div>
                <div>
                    <label>Endereço: </label>
                    <input type="text" id="endereco" name="endereco" required="required">
                </div>
                <div>
                    <label>Sexo:</label>
                    <select id="sexo" name="sexo">
                        <option value="">--Selecione--</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
                <div>
                    <label>Função:</label>
                    <select id="funcao" name="funcao">
                        <option value="">--Selecione--</option>
                        <option value="1">Administrador</option>
                        <option value="2">Atendende / Caixa</option>
                        <option value="3">Garçom</option>
                        <option value="4">Cozinheiro</option>
                    </select>
                </div>
                <div>
                    <label>Telefone: </label>
                    <input type="text" id="telefone" name="telefone" required="required">
                </div>
                <div>
                    <label>Whatsapp: </label>
                    <input type="text" id="whatsapp" name="whatsapp" required="required">
                </div>          
                <div>
                    <label>E-mail: </label>
                    <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email" required="required">
                </div>

                <div>
                    <label>Senha: </label>
                    <input type="password" id="senha" name="senha" required="required">
                </div>
                <hr>
                <div>
                    <input type="submit" id="salvar" name="salvar" value="Salvar">
                    <input type="reset" value="Novo" />
                </div>
            </form>
        </div>
        <hr>
        <div>
            <?php if (listaFuncionarios() != null) {?>
            <h3>FUNCIONARIOS CADASTRADOS</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Função</th>
                        <th>Telefone</th>
                        <th>Whatsapp</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <?php foreach (listaFuncionarios() as $funcionarios){?>
                <tbody>
                    <tr data-id="<?= $funcionarios->idFuncionario;?>">
                        <td><?= $funcionarios->idFuncionario;?></td>
                        <td><?= $funcionarios->nome;?></td>
                        <td><?= $funcionarios->funcao;?></td>
                        <td><?= $funcionarios->telefone;?></td>
                        <td><?= $funcionarios->whatsapp;?></td>
                        <td><a href="cadastroFuncionario.php?editar_registro=<?php echo $funcionarios->idFuncionario; ?>"><button>Editar</button></a></td>
                        <td><a href="cadastroFuncionario.php?excluir_registro=<?php echo $funcionarios->idFuncionario; ?>"><button>Excluir</button></a></td>
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