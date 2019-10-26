<?php
require_once '../controller/DB.php';
require_once '../model/Funcionario.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioFuncionario = array(
        'nome' =>$_POST['nome'],
        'CPF' =>$_POST['CPF'],
        'endereco' =>$_POST['endereco'],
        'sexo' =>$_POST['sexo'],
        'funcao' =>$_POST['funcao'],
        'telefone' =>$_POST['telefone'],
        'whatsapp' =>$_POST['whatsapp'],
        'senha' =>md5($_POST['senha']),
        'email' =>$_POST['email']
    );
    $funcionario = new Funcionario(DB::getInstance(), $dadosFormularioFuncionario);
    if($funcionario->inserir()){
        header("Location: ../view/cadastroFuncionario.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioFuncionario = array(
        'idFuncionario' =>$_POST['idFuncionario'],
        'nome' =>$_POST['nome'],
        'CPF' =>$_POST['CPF'],
        'endereco' =>$_POST['endereco'],
        'sexo' =>$_POST['sexo'],
        'funcao' =>$_POST['funcao'],
        'telefone' =>$_POST['telefone'],
        'whatsapp' =>$_POST['whatsapp'],
        'email' =>$_POST['email']
    );

    $funcionario = new Funcionario(DB::getInstance(), $dadosFormularioFuncionario);
    if($funcionario->editar()){
        header("Location: ../view/cadastroFuncionario.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

if(isset($_POST['excluir'])){
    $funcionario = new Funcionario(DB::getInstance(), array("idFuncionario" => $_POST['idFuncionario']));
    if($funcionario->deletar()){
        header("Location: ../view/cadastroFuncionario.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroFuncionario.php");
}

function listaFuncionarios() {
    $funcionario = new Funcionario(DB::getInstance(), null);
    return $funcionario->listar();
}

?>
