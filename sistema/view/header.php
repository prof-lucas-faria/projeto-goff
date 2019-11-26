<?php  
	if (!isset($_SESSION)) {
  		session_start();
	}
    if ((!isset($_SESSION['dados_usuario']))) {
        header('Location: ../view/login.php');
    }
?>
<header class="header">
    <div class="titulo">
        <h2>SISTEMA GERENTE - LANCHONETES</h2>
    </div>
    <div class="usuario">
    	<h4><?= $_SESSION['dados_usuario']->nome; ?></h4>
    </div>
</header>