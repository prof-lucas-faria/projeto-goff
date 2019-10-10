<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>

</head>
<body>
	<h2>Cadastro Mesas</h2>
	<form name="cadastroMesa" method="POST" action="../controller/mesaController.php">
		<div>
			<label>Nome: </label>
            <input type="text" id="nome" name="nome" required="required" autofocus>
        </div>
        <hr>

        <div>
            <input type="submit" id="salvar" name="salvar" value="Salvar">
            <input type="reset" value="Novo" />
        </div>
	</form>
</body>
</html>