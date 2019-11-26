<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
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
                <?php require_once '../controller/funcionarioController.php';?>
                <!-- FORMULÁRIO PARA EDITAR DADOS -->
                <?php if(isset($_GET['editar_registro'])){
                    foreach (listaFuncionarios() as $funcionarios){
                        if($funcionarios->idFuncionario == $_GET['editar_registro']){ ?>
                <div class="titulo_form">
                    <h2>Editar Cadastro Funcionários</h2>
                </div>
                <div class="form_group">
                    <form name="editarFuncionario" method="POST" action="../controller/funcionarioController.php">
                        <input type="hidden" id="idFuncionario" name="idFuncionario" value="<?php echo $funcionarios->idFuncionario ?>">
                        <div class="campo2col_fu">
                            <div class="campo col2">
                                <label>Nome: </label>
                                <input class="col2" type="text" id="nome" name="nome" required="required" autofocus value="<?php echo $funcionarios->nome ?>">
                            </div>
                            <div class="campo col2">
                                <label>CPF: </label>
                                <input class="col2" type="text" id="CPF" name="CPF" required="required" value="<?php echo $funcionarios->CPF ?>">
                            </div>
                        </div>
                        <div class="campo col1">
                            <label>Endereço: </label>
                            <input class="col1" type="text" id="endereco" name="endereco" required="required" value="<?php echo $funcionarios->endereco ?>">
                        </div>
                        <div class="campo4col">
                            <div class="campo col4">
                                <label>Sexo:</label>
                                <select class="col4" id="sexo" name="sexo">
                                    <option selected="selected" value="<?php echo $funcionarios->sexo ?>"><?php echo $funcionarios->sexo ?></option>
                                    <option value="">--Selecione--</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="campo col4">
                                <label>Função:</label>
                                <select class="col4" id="funcao" name="funcao">
                                    <option selected="selected" value="<?php echo $funcionarios->funcao ?>"><?php echo $funcionarios->funcao ?></option>
                                    <option value="">--Selecione--</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Atendende / Caixa">Atendende / Caixa</option>
                                    <option value="Garçom">Garçom</option>
                                    <option value="Cozinheiro">Cozinheiro</option>
                                </select>
                            </div>
                            <div class="campo col4">
                                <label>Telefone: </label>
                                <input class="col4" type="text" id="telefone" name="telefone" value="<?php echo $funcionarios->telefone ?>">
                            </div>
                            <div class="campo col4">
                                <label>Whatsapp: </label>
                                <input class="col4" type="text" id="whatsapp" name="whatsapp" value="<?php echo $funcionarios->whatsapp ?>">
                            </div>   
                        </div>         
                        <div class="campo col1">
                            <label>E-mail: </label>
                            <input class="col1" type="email" pattern="[^ @]*@[^ @]*" id="email" name="email" value="<?php echo $funcionarios->email ?>">
                        </div>
                        <div class="botao">
                            <input class="botao_principal" type="submit" id="editar" name="editar" value="Editar">
                            <input class="botao_secundario" type="submit" id="cancelar" name="cancelar" value="Cancelar">
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
                        <input type="hidden" id="idFuncionario" name="idFuncionario" value="<?php echo $funcionarios->idFuncionario ?>">
                        <div class="titulo_form">
                            <h2>Excluir Funcionário</h2>
                        </div>
                        <div class="confirmacao_excluir">
                            <h4>Deseja mesmo excluir o funcionário?</h4>
                        </div>
                        <div class="form_group">
                            <div class="campo2col_fu">
                                <div class="campo col2">
                                    <label>Nome: </label>
                                    <input class="col2" type="text" id="nome" name="nome" readonly value="<?php echo $funcionarios->nome ?>">
                                </div>
                                <div class="campo col2">
                                    <label>Função: </label>
                                    <input class="col2" type="text" id="CPF" name="CPF" readonly value="<?php echo $funcionarios->funcao ?>">
                                </div>
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
            	        <h2>Funcionários</h2>
                    </div>
                    <fieldset>
                        <div class="form_group">
                            <form name="cadastroFuncionario" method="POST" action="../controller/funcionarioController.php">
                                <div class="campo2col_fu">
                                    <div class="campo col2">
                                        <label>Nome: </label>
                                        <input class="col2" type="text" id="nome" name="nome" required="required" autofocus>
                                    </div>
                                    <div class="campo col2">
                                        <label>CPF: </label>
                                        <input class="col2" type="text" id="CPF" name="CPF" required="required">
                                    </div>
                                </div>
                                <div class="campo col1">
                                    <label>Endereço: </label>
                                    <input class="col1" type="text" id="endereco" name="endereco" required="required">
                                </div>
                                <div class="campo4col">
                                    <div class="campo col4">
                                        <label>Sexo:</label>
                                        <select class="col4" id="sexo" name="sexo">
                                            <option value="">--Selecione--</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="campo col4">
                                        <label>Função:</label>
                                        <select class="col4" id="funcao" name="funcao">
                                            <option value="">--Selecione--</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Atendende / Caixa">Atendende / Caixa</option>
                                            <option value="Garçom">Garçom</option>
                                            <option value="Cozinheiro">Cozinheiro</option>
                                        </select>
                                    </div>
                                    <div class="campo col4">
                                        <label>Telefone: </label>
                                        <input class="col4" type="text" id="telefone" name="telefone" required="required">
                                    </div>
                                    <div class="campo col4">
                                        <label>Whatsapp: </label>
                                        <input class="col4" type="text" id="whatsapp" name="whatsapp" required="required">
                                    </div>  
                                </div>
                                <div class="campo2col_fu2">
                                    <div class="campo col2">
                                        <label>Senha: </label>
                                        <input class="col2" type="password" id="senha" name="senha" required="required">
                                    </div>        
                                    <div class="campo col2">
                                        <label>E-mail: </label>
                                        <input class="col2" type="email" pattern="[^ @]*@[^ @]*" id="email" name="email" required="required">
                                    </div>
                                </div>
                                <div class="botao">
                                    <input class="botao_principal" type="submit" id="salvar" name="salvar" value="Salvar">
                                    <input class="botao_secundario" type="reset" value="Novo" />
                                </div>
                            </form>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div >
                            <?php if (listaFuncionarios() != null) {?>
                            <div class="titulo_table">
                                <h3>Funcionários Cadastrados</h3>
                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Função</th>
                                        <th>Telefone</th>
                                        <th>Whatsapp</th>
                                        <th colspan="2" width="140">Ação</th>
                                    </tr>
                                    <?php foreach (listaFuncionarios() as $funcionarios){?>
                                    <tr data-id="<?= $funcionarios->idFuncionario;?>">
                                        <td align="center"><?= $funcionarios->idFuncionario;?></td>
                                        <td><?= $funcionarios->nome;?></td>
                                        <td><?= $funcionarios->funcao;?></td>
                                        <td align="right"><?= $funcionarios->telefone;?></td>
                                        <td align="right"><?= $funcionarios->whatsapp;?></td>
                                        <td class="botao_acao"><a href="cadastroFuncionario.php?editar_registro=<?php echo $funcionarios->idFuncionario; ?>"><button class="botao_acao_p">Editar</button></a>
                                            <a href="cadastroFuncionario.php?excluir_registro=<?php echo $funcionarios->idFuncionario; ?>"><button class="botao_acao_s">Excluir</button></a>
                                        </td>
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