<?php
require_once '../controller/DB.php';
require_once '../model/Caixa.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioCaixa = array(
        'nome' =>$_POST['nome']
    );
    $caixa = new Caixa(DB::getInstance(), $dadosFormularioCaixa);
    if($caixa->inserir()){
        header("Location: ../view/cadastroCaixa.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioCaixa = array(
        'idCaixa' =>$_POST['idCaixa'],
        'nome' =>$_POST['nome']
    );
    $caixa = new Caixa(DB::getInstance(), $dadosFormularioCaixa);
    if($caixa->editar()){
        header("Location: ../view/cadastroCaixa.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

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

?>