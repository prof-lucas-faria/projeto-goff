<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Controle Caixas </title>
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
                <?php require_once '../controller/caixaController.php';?>
                <div class="titulo_form">
            	   <h2>Relatório de Caixas</h2>
                </div>
                <fieldset>
                    <div>
                        <?php if (listacaixas() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>Cód</th>
                                    <th>Nome</th>
                                    <th>Funcionário Responsável</th>
                                    <th>Saldo Inicial</th>
                                </tr>
                                <?php foreach (listacaixas() as $caixas){?>
                                <tr data-id="<?= $caixas->idCaixa;?>">
                                    <td align="center"><?= $caixas->idCaixa;?></td>
                                    <td><?= $caixas->nome;?></td>
                                    <td><?= $caixas->funcionario;?></td>
                                    <td align="right"><?= $caixas->saldoInicial;?></td>
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