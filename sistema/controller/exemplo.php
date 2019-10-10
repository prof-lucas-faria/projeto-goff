<?php

require_once '../controller/conexao_bd.php';

// if o login
if(isset($_POST['entrar'])){ //verifica se o botao de logar foi submetido
    $formulario_login =  array(
        'cpf' => $_POST['cpf'], //adiciono no array o cpf
        'senha'=> $_POST['senha']//seguido pela senha
    );

    $oLoginService = new Coordenador(DB::getInstance(),$formulario_login);
    $dados = $oLoginService->login();// chama o metodo do login
    if ($dados != null){ //verifica se não está nulo
        session_start();//inicia a sessão
        $_SESSION['dados_usuario'] = $dados; //joga os dados do usuario na sessão
        header('Location: ../view/index.php');//redireciona para a pagina principal
       //exit();
    } else{ //se for nulo
        header('Location: ../index.php'); // redireciona para ele mesmo
        //exit();
    }
}

//if para cadastro de coordenador
if (isset($_POST['salvar'])) {
    $dadosFormularioCoordenador = array(
        'nome' =>$_POST['nome'],
        'CPF' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'sexo' => $_POST['sexo'],
        'endereco' => $_POST['endereco'],
        'id_cidade' => $_POST['cidade'],
        'senha' => md5($_POST['senha'])
    );
    $oCoordenador = new Coordenador(DB::getInstance(), $dadosFormularioCoordenador);
    if($oCoordenador->inserir()){
        header("Location: ../view/cadastro_coordenador.php?salvo=true");
    }else{
        //eita
    }
}


//if para cadastro de coordenador
if (isset($_POST['atualizar_modal'])) {
    $dadosFormularioCoordenador = array(
        'nome' =>$_POST['nome_modal'],
        'CPF' => $_POST['cpf_modal'],
        'telefone' => $_POST['telefone_modal'],
        'email' => $_POST['email_modal'],
        'sexo' => $_POST['sexo_modal'],
        'endereco' => $_POST['endereco_modal'],
        'id_cidade' => $_POST['cidade_modal'],
        'senha' => md5($_POST['senha_modal']),
        'id_pessoa'=> $_POST['id_pessoa'],
        'id_coordenador' => $_POST['id_coordenador'],
        'status' => 1);
    $oCoordenador = new Coordenador(DB::getInstance(), $dadosFormularioCoordenador);
    if($oCoordenador->editar()){
        header("Location: ../view/cadastro_coordenador.php?atualizar=true");
    }else{
        //eita
    }
}

if(isset($_POST['excluir_registro'])){
    $oCoordenador = new Coordenador(DB::getInstance(), array("id_coordenador" => $_POST['id_exclusao']));
   if($oCoordenador->deletar()){
    header("Location: ../view/cadastro_coordenador.php?excluir=true");
}


}
if(isset($_POST['exibir_registro'])){
    $oCoordenador = new Coordenador(DB::getInstance(),array('id_coordenador' =>$_POST['id_para_atualizar']));
    $dados['dados'] = $oCoordenador->listar_por_id();
    echo json_encode($dados);

}

function listaCidades(){
    $oCidade = new Cidade(DB::getInstance(), null);
    return $oCidade->listar();
}

function listaCoordenadores() {
    $oCoordenador = new Coordenador(DB::getInstance(), null);
    return $oCoordenador->listar();
}

?>
