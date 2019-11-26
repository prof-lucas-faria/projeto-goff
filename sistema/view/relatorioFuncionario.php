<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Relatório Funcionários </title>
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
                <div class="titulo_form">
            	   <h2>Relatório de Funcionários</h2>
                </div>
                <fieldset>
                    <div>
                        <?php if (listafuncionarios() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>Cód</th>
                                    <th>Nome</th>
                                    <th>Função</th>
                                    <th>Telefone</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                </tr>
                                <?php foreach (listafuncionarios() as $funcionarios){?>
                                <tr data-id="<?= $funcionarios->idFuncionario;?>">
                                    <td align="center"><?= $funcionarios->idFuncionario;?></td>
                                    <td><?= $funcionarios->nome;?></td>
                                    <td><?= $funcionarios->funcao;?></td>
                                    <td><?= $funcionarios->telefone;?></td>
                                    <td><?= $funcionarios->whatsapp;?></td>
                                    <td><?= $funcionarios->email;?></td>                                    
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <?php }?>
                    </div>
                </fieldset>
            </div>
        </div>  
        <?php include "footer.php" ?>
    </div>
</body>
</html>