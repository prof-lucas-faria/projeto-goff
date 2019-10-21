<?php
require_once '../controller/DB.php';
require_once '../model/Produto.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioProduto = array(
        'nome' =>$_POST['nome']
    );
    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);
    if($produto->inserir()){
        header("Location: ../view/cadastroProduto.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioProduto = array(
        'idProduto' =>$_POST['idProduto'],
        'nome' =>$_POST['nome']
    );
    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);
    if($produto->editar()){
        header("Location: ../view/cadastroProduto.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

if(isset($_POST['excluir'])){
    $produto = new Produto(DB::getInstance(), array("idProduto" => $_POST['idProduto']));
    if($produto->deletar()){
        header("Location: ../view/cadastroProduto.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroProduto.php");
}

function listaProdutos() {
    $produto = new Produto(DB::getInstance(), null);
    return $produto->listar();
}

?>
