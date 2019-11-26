<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> SISTEMA GERENTE - Controle Categorias </title>
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
                <?php require_once '../controller/categoriaController.php';?>
                <div class="titulo_form">
            	   <h2>Relatório de Categorias</h2>
                </div>
                <fieldset>
                    <div>
                        <?php if (listaCategorias() != null) {?>
                        <div class="table">
                            <table>
                                <tr>
                                    <th>Cód</th>
                                    <th>Nome</th>
                                </tr>
                                <?php foreach (listaCategorias() as $Categorias){?>
                                <tr data-id="<?= $Categorias->idCategoria;?>">
                                    <td align="center"><?= $Categorias->idCategoria;?></td>
                                    <td><?= $Categorias->nome;?></td>
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