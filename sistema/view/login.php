<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>
<body>
    <div class="login">
        <div class="box">
            <div class="titulo_form">
                <h2 align="center">Sistema Gerente</h2>
            </div>
            <div class="form_group">
                <form name="login" method="POST" action="../controller/funcionarioController.php">
                    <h5 align="center">Entre com os dados para login</h5><br>
                    <div class="campo col1">
                        <label>CPF: </label>
                        <input class="col1" type="text" id="CPF" name="CPF" required="required">
                    </div>
                    <div class="campo col1">
                        <label>Senha: </label>
                        <input class="col1" type="password" id="senha" name="senha" required="required">
                    </div>        
                    <div class="botao">
                        <input class="botao_login" type="submit" id="login" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>