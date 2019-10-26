<?php
require_once '../controller/DB.php';
require_once '../model/Caixa.php';
require_once '../model/Funcionario.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioCaixa = array(
        'nome' =>$_POST['nome'],
        'idFuncionario' =>$_POST['idFuncionario'],
        'saldoInicial' =>$_POST['saldoInicial']
    );
    $caixa = new Caixa(DB::getInstance(), $dadosFormularioCaixa);
    if($caixa->inserir()){
        header("Location: ../view/cadastroCaixa.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

//////////// CAIXA NÃO PODE SER EDITADO ////////////////

if(isset($_POST['excluir'])){
    $caixa = new Caixa(DB::getInstance(), array("idCaixa" => $_POST['idCaixa']));
    if($caixa->deletar()){
        header("Location: ../view/cadastroCaixa.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroCaixa.php");
}

function listaCaixas() {
    $caixa = new Caixa(DB::getInstance(), null);
    return $caixa->listar();
}

function listaFuncionarios() {
    $funcionario = new Funcionario(DB::getInstance(), null);
    return $funcionario->listar();
}

?>