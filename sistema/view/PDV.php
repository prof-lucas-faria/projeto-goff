<?php session_start(); ?>
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
        <div class="container_pdv">
            <div class="menu">
                <?php include "menu_lateral.php" ?>
            </div>
            <div class="form_pdv" id="mydiv">
                <?php include "pedido.php" ?>
            </div>
            <div class="itens">
                <?php include "itensPedido.php" ?>
            </div>
        </div>  
        <?php include "footer.php" ?>
    </div>
</body>
<script type="text/javascript" src="../assets/js/function.js"></script>
</html>