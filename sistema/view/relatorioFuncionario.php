<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Controle Funcionarios </title>
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
            	   <h2>Relatório de Funcionarios</h2>
                </div>
                <fieldset>
                    <div>
                        <?php if (listafuncionarios() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Endereço</th>
                                    <th>Sexo</th>
                                    <th>Função</th>
                                    <th>Telefone</th>
                                    <th>Whatsapp</th>
                                    <th>Email</th>
                                </tr>
                                <?php foreach (listafuncionarios() as $funcionarios){?>
                                <tr data-id="<?= $funcionarios->idfuncionario;?>">
                                    <td align="center"><?= $funcionarios->idfuncionario;?></td>
                                    <td><?= $funcionarios->nome;?></td>
                                    <td><?= $cpf->CPF;?></td>
                                    <td><?= $endereco->Endereço;?></td>
                                    <td><?= $sexo->Sexo;?></td>
                                    <td><?= $funcao->Função;?></td>
                                    <td><?= $telefone->Telefone?></td>
                                    <td><?= $whatsapp->Whatsapp;?></td>
                                    <td><?= $email->Email;?></td>                                    
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