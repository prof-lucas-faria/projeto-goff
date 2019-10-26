<?php
require_once '../controller/DB.php';
require_once '../model/Produto.php';

if (isset($_POST['salvar'])) {


    $dadosFormularioProduto = array(
        'nome' => $_POST['nome'],
        'idCategoria' => $_POST['idCategoria'],
        'foto' => $_POST['foto'],
        'precoCusto' => $_POST['precoCusto'],
        'precoVenda' => $_POST['precoVenda'],
    );

    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);

    if($produto->inserir()){
        header("Location: ../view/cadastroProdutos.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioProduto = array(
        'idProduto' =>$_POST['idProduto'],
        'nome' => $_POST['nome'],
        'idCategoria' => $_POST['idCategoria'],
        'foto' => $_POST['foto'],
        'precoCusto' => $_POST['precoCusto'],
        'precoVenda' => $_POST['precoVenda'],
        'status' => $_POST['status'],
    );

    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);
    if($produto->editar()){
       header("Location: ../view/cadastroProdutos.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

if(isset($_POST['excluir'])){

    $produto = new Produto(DB::getInstance(), array("idProduto" => $_POST['idProduto']));
    if($produto->deletar()){
        header("Location: ../view/cadastroProdutos.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroProdutos.php");
}

function listaProdutos() {
    $produto = new Produto(DB::getInstance(), null);
    return $produto->listar();
}

?>
