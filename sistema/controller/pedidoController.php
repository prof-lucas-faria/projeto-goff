<?php
require_once '../controller/DB.php';
require_once '../model/Pedido.php';
require_once '../model/Funcionario.php';
require_once '../model/Mesa.php';
require_once '../model/Produto.php';



function listaFuncionarios() {
    $pedido = new Funcionario(DB::getInstance(), null);
    return $pedido->listar();
}

function listaMesas() {
    $mesa = new Mesa(DB::getInstance(), null);
    return $mesa->listar();
}

function listaProdutos() {
    $produto = new Produto(DB::getInstance(), null);
    return $produto->listar();
}

?>
