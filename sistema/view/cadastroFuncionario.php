<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISTEMA GERENTE</title>

</head>
<body>
	<h2>Cadastro Funcionários</h2>
	<form name="cadastroFuncionario" method="POST" action="../controller/mesaController.php">
		<fieldset>
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
        </fieldset>
        <div>
            <input type="submit" id="salvar" name="salvar" value="Salvar">
            <input type="reset" value="Novo" />
        </div>
	</form>
</body>
</html>