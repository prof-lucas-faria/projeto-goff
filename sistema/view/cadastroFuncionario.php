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

<body>
    <div class="main-wrapper">
        <div class="app" id="app">
            <?php include 'header.php';?>

            <aside class="sidebar">
                <div class="sidebar-container">
                    <div class="sidebar-header">
                        <div class="brand">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> Inventário
                        </div>
                    </div>

                    <?php include 'menu_lateral.php'; ?>
                </div>

            </aside>
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <article class="content forms-page">
                <section class="section">

                    <div class="row">
                        <div class="col-md-12">

                            <?php if (isset($_GET['salvo'])) {?>
                            <div class='alert alert-success' id='alert-success' name='alert-success' role='alert'>
                                Salvo com Sucesso!!
                            </div>
                            <?php } else if(isset($_GET['excluir'])){?>
                            <div class='alert alert-success' role='alert'>
                                Registro Excluido !!
                            </div>
                            <?php } else if(isset($_GET['atualizar'])){?>
                            <div class='alert alert-success' role='alert'>
                                Registro Atualizado !!
                            </div>
                            <?php }?>
                            
                            <div class="row card card-block sameheight-item">
                                <div class="title-block">
                                    <h2 class="title"> Cadastro de Coordenador </h2>
                                    <hr>
                                </div>
                                <?php require_once '../controller/CoordenadorController.php';?>
                                <form role="form" class="row" id="formulario" name="formulario" method="POST"
                                    action="../controller/CoordenadorController.php">

                                    <div class="form-group col-6">
                                        <label class="control-label">Nome: </label>
                                        <input type="text" id="nome" name="nome" required="required"
                                            class="form-control boxed" autofocus>
                                    </div>

                                    <div class="form-group col-2">
                                        <label class="control-label">CPF: </label>
                                        <input type="text" id="cpf" name="cpf" required="required"
                                            class="form-control boxed" placeholder="">

                                    </div>

                                    <div class="form-group col-4">
                                        <label class="control-label">Telefone: </label>
                                        <input type="text" id="telefone" name="telefone" class="form-control boxed">
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="control-label">E-mail: </label>
                                        <input type="email" pattern="[^ @]*@[^ @]*" id="email" name="email"
                                            class="form-control boxed">
                                    </div>

                                    <div class="form-group col-2">
                                        <label class="control-label">Sexo:</label>
                                        <select class="form-control boxed" id="sexo" name="sexo">
                                            <option value="">Selecione</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="control-label">Endereço: </label>
                                        <input type="text" id="endereco" name="endereco" class="form-control boxed">
                                    </div>



                                    <div class="form-group col-4">
                                        <label class="control-label">Cidade: </label>
                                        <select class="form-control boxed" name="cidade" id="cidade">
                                            <option value="">Selecione</option>
                                            <?php foreach (listaCidades() as $cidades){?>
                                            <option id="<?= $cidades->id_cidade; ?>"
                                                value="<?= $cidades->id_cidade; ?>"><?= $cidades->nome;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="control-label">Senha: </label>
                                        <input type="password" id="senha" name="senha" class="form-control boxed">
                                    </div>
                                    </fieldset>


                                    <!---
                                 <div class="form-group col-4">
                                    <label class="control-label">Foto:</label>
                                    <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                                 </div>
                                 --->
                                    <div class="col-11" align="end">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-primary"
                                            value="Salvar">
                                        <input type="reset" class="btn btn-success" value="Novo" />
                                    </div>
                                    <?php if (listaCoordenadores() != null) {?>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="card-title-block">
                                                    <h3 class="title"> Coordenador Cadastrado</h3>
                                                </div>

                                                <section class="example">
                                                    <div class="table-responsive"
                                                        style="display: block;
                                                  max-height: 400px; overflow-y: auto; -ms-overflow-style: -ms-autohiding-scrollbar;">
                                                        <table
                                                            class="table table-striped table-bordered table-hover table-overflow">
                                                            <thead>
                                                                <tr>

                                                                    <th>Nome</th>
                                                                    <th>CPF</th>
                                                                    <th>Telefone</th>
                                                                    <th>Email</th>
                                                                    <th>Cidade</th>
                                                                    <th>Ação</th>
                                                                </tr>
                                                            </thead>

                                                            <?php foreach (listaCoordenadores() as $coordenadores){?>
                                                            <tbody>
                                                                <tr data-id="<?= $coordenadores->id_pessoa;?>">
                                                                    <td><?= $coordenadores->nome;?></td>
                                                                    <td><?= $coordenadores->CPF;?></td>
                                                                    <td><?= $coordenadores->telefone;?></td>
                                                                    <td><?= $coordenadores->email;?></td>
                                                                    <td><?= $coordenadores->cidade;?></td>
                                                                    <td><button type="button"
                                                                            class="editar_coor btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#modal_atualizar"
                                                                            id="editar_coor"
                                                                            name="editar_coor">Editar</button>
                                                                        <button type="button" name="btn_excluir"
                                                                            class="btn_excluir btn btn-danger"
                                                                            data-toggle="modal"
                                                                            data-target="#modal_excluir">Excluir</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <?php }?>
                                                        </table>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <!-- The Modal -->
    <div class="modal fade" id="modal_atualizar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Atualizar Coordenador</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-12">
                        <form role="form" class="formulario_modal row" id="formulario_modal" required="true" name="formulario_modal" method="POST"
                            action="../controller/CoordenadorController.php">

                            <div class="form-group col-6">
                                <label class="control-label">Nome: </label>
                                <input type="text" id="nome_modal" name="nome_modal" required="true" required="required"
                                    class="form-control boxed" autofocus>
                            </div>

                            <div class="form-group col-2">
                                <label class="control-label">CPF: </label>
                                <input type="text" id="cpf_modal" required="true" name="cpf_modal" required="required"
                                    class="form-control boxed" placeholder="">

                            </div>

                            <div class="form-group col-4">
                                <label class="control-label">Telefone: </label>
                                <input type="text" id="telefone_modal" required="true" name="telefone_modal" class="form-control boxed">
                            </div>

                            <div class="form-group col-4">
                                <label class="control-label">E-mail: </label>
                                <input type="email" pattern="[^ @]*@[^ @]*" required="true" id="email_modal" name="email_modal"
                                    class="form-control boxed">
                            </div>

                            <div class="form-group col-2">
                                <label class="control-label">Sexo:</label>
                                <select class="form-control boxed" id="sexo_modal" required="true" name="sexo_modal">
                                    <option value="">Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label class="control-label">Endereço: </label>
                                <input type="text" id="endereco_modal" name="endereco_modal" required="true" class="form-control boxed">
                            </div>



                            <div class="form-group col-4">
                                <label class="control-label">Cidade: </label>
                                <select class="form-control boxed" name="cidade_modal" required="true" id="cidade_modal">
                                    <option value="">Selecione</option>
                                    <?php foreach (listaCidades() as $cidades){?>
                                    <option id="<?= $cidades->id_cidade; ?>" value="<?= $cidades->id_cidade; ?>">
                                        <?= $cidades->nome;?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label class="control-label">Senha: </label>
                                <input type="password" id="senha_modal" name="senha_modal" required="true" class="form-control boxed">
                            </div>
                            </fieldset>

                            <input type="hidden" name="id_pessoa" id="id_pessoa">
                            <input type="hidden" name="id_coordenador" id="id_coordenador">

                            <!---
                            <div class="form-group col-4">
                            <label class="control-label">Foto:</label>
                            <img class="image-container" src="https://index.tnwcdn.com/images/9794fd32b7b694d7720d2e655049051b78604f09.jpg" ></img>
                            </div>
                            --->


                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="atualizar_modal btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" id="atualizar_modal" name="atualizar_modal" class="btn btn-primary"
                        value="Atualizar">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="modal_excluirLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_excluirLabel">ATENÇÃO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" onclick="excluir()">Excluir</button>
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
</body>
<script>

//remove o alerta de sucesso
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
//script para recuperar os dados do servidor e jogar os valores no modal
$(document).ready(function() {
    $('.editar_coor').on('click', function() {
        var user_id = $(this).parents('tr').data('id');

        $.ajax({
            type: 'POST',
            url: '../controller/CoordenadorController.php',
            dataType: "json",
            data: { //array associativo com os dados do post
                'exibir_registro': 'sim',
                'id_para_atualizar': user_id //
            },
            success: function(data) {
                console.log(data);
                $('#nome_modal').val(data.dados[0].nome);
                $('#cpf_modal').val(data.dados[0].CPF);
                $('#telefone_modal').val(data.dados[0].telefone);
                $('#email_modal').val(data.dados[0].email);
                $('#sexo_modal').val(data.dados[0].sexo);
                $('#endereco_modal').val(data.dados[0].endereco);
                $('#cidade_modal').val(data.dados[0].cidade);

                $('#id_coordenador').val(data.dados[0].id_coordenador);
                $('#id_pessoa').val(data.dados[0].id_pessoa);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});
//dsdfsdf
var id = 0; //variavel para receber o id selecionado;
$('.btn_excluir').click(function() { // acao para reconhecer o click no botao;
    id = $(this).parents('tr').data('id'); // pega o id do botao selecionado;
});

//funcao para excluir o regstro
function excluir() {

    $.ajax({ // chamo o ajax
        type: 'POST', // falo que a requisicao vai ser post
        url: '../controller/CoordenadorController.php', // passso a localizacao do arquivo
        data: { //array associativo com os dados do post
            'excluir_registro': 'sim',
            'id_exclusao': id //
        },
        success: function(
        msg) { //se deu certo, entra aqui passando o get para o true e recebendo o valor para exibir o alerta
            location.href = "../view/cadastro_coordenador.php?excluir=true";
            //dispensa o alerta de sucesso

        }
    });
}
</script>

</html>
