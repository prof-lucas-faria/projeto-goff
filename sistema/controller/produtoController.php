<?php
require_once '../controller/DB.php';
require_once '../model/Produto.php';
require_once '../model/Categoria.php';

if (isset($_POST['salvar'])) {

    $nomeFoto = $_FILES['foto']['name'];

    $dadosFormularioProduto = array(
        'nome' => $_POST['nome'],
        'idCategoria' => $_POST['idCategoria'],
        'foto' => $nomeFoto,
        'precoCusto' => $_POST['precoCusto'],
        'precoVenda' => $_POST['precoVenda'],
    );

    print_r($dadosFormularioProduto['foto']);

    $diretorio = '../assets/img/produtos/';
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nomeFoto);

    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);

    if($produto->inserir()){
        header("Location: ../view/cadastroProduto.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    if($_POST['novaFoto'] != ""){
        $dadosFormularioProduto = array(
            'idProduto' =>$_POST['idProduto'],
            'nome' => $_POST['nome'],
            'idCategoria' => $_POST['idCategoria'],
            'foto' => $_POST['novaFoto'],
            'precoCusto' => $_POST['precoCusto'],
            'precoVenda' => $_POST['precoVenda'],
        );
    } else {
        $dadosFormularioProduto = array(
            'idProduto' =>$_POST['idProduto'],
            'nome' => $_POST['nome'],
            'idCategoria' => $_POST['idCategoria'],
            'foto' => $_POST['foto'],
            'precoCusto' => $_POST['precoCusto'],
            'precoVenda' => $_POST['precoVenda'],
        );
    }

    print_r($dadosFormularioProduto);


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

function listaCategorias() {
    $categoria = new Categoria(DB::getInstance(), null);
    return $categoria->listar();
}

?>
