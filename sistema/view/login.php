<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Sistema de Inventário </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="../assets/css/vendor.css">
    <link rel="stylesheet" id="theme-style" href="../assets/css/app-green.css">
    <link rel="stylesheet" id="theme-style" href="../assets/css/app.css">

</head>

<body class="loaded">
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div> Sistema de Inventário
                    </h1>
                </header>
                <div class="auth-content">
                    <p class="text-center">ENTRE PARA CONTINUAR</p>
                    <form id="login" action="../controller/CoordenadorController.php" method="POST" novalidate="novalidate">
                        <div class="form-group">
                            <label for="username">CPF</label>
                            <input type="text" class="form-control underlined" name="cpf" id="cpf"
                                placeholder="cpf" required=""> </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control underlined" name="senha" id="senha"
                                placeholder="Digite sua senha" required=""> </div>
                        <div class="form-group">
                            <a href="reset.html" class="forgot-btn pull-right">Esqueceu a senha?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="entrar" name="entrar" class="btn btn-block btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>

    <script src="../assets/js/vendor.js"></script>
    <script src="../assets/js/app.js"></script>

    <div class="responsive-bootstrap-toolkit">
        <div class="device-xs 				  hidden-sm-up"></div>
        <div class="device-sm hidden-xs-down hidden-md-up"></div>
        <div class="device-md hidden-sm-down hidden-lg-up"></div>
        <div class="device-lg hidden-md-down hidden-xl-up"></div>
        <div class="device-xl hidden-lg-down			  "></div>
    </div>
</body>

</html>