<?php
require_once '../controller/DB.php';
require_once '../model/Categoria.php';

if (isset($_POST['salvar'])) {
    $dadosFormularioCategoria = array(
        'nome' =>$_POST['nome']
    );
    $categoria = new Categoria(DB::getInstance(), $dadosFormularioCategoria);
    if($categoria->inserir()){
        header("Location: ../view/cadastroCategoria.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}
if (isset($_POST['editar'])) {
    $dadosFormularioCategoria = array(
        'idCategoria' =>$_POST['idCategoria'],
        'nome' =>$_POST['nome']
    );
    $categoria = new Categoria(DB::getInstance(), $dadosFormularioCategoria);
    if($categoria->editar()){
        header("Location: ../view/cadastroCategoria.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}
if(isset($_POST['excluir'])){
    $categoria = new Categoria(DB::getInstance(), array("idCategoria" => $_POST['idCategoria']));
    if($mesa->deletar()){
        header("Location: ../view/cadastroCategoria.php");
    }
}
if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroCategoria.php");
}

function listaCategorias() {
    $categoria = new Categoria(DB::getInstance(), null);
    return $categoria->listar();
}
?>