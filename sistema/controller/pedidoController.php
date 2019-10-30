<?php
require_once '../controller/DB.php';
require_once '../model/Pedido.php';
require_once '../model/Funcionario.php';
require_once '../model/Mesa.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioPedido = array(
        'idMesa' =>$_POST['idMesa'],
        'observacao' =>$_POST['observacao'],
        'qtdItens' =>$_POST['qtdItens'],
        'totalPedido' =>$_POST['totalPedido'],
        'desconto' =>$_POST['desconto'],
        'tipoRecebimento' =>$_POST['tipoRecebimento'],
        'valorRecebido' =>$_POST['valorRecebido']
    );
    $pedido = new Pedido(DB::getInstance(), $dadosFormularioPedido);
    if($pedido->inserir()){
        header("Location: ../view/cadastroFuncionario.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioPedido = array(
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

    $pedido = new Pedido(DB::getInstance(), $dadosFormularioPedido);
    if($pedido->editar()){
        header("Location: ../view/cadastroFuncionario.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

if(isset($_POST['excluir'])){
    $pedido = new Pedido(DB::getInstance(), array("idFuncionario" => $_POST['idFuncionario']));
    if($pedido->deletar()){
        header("Location: ../view/cadastroFuncionario.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroFuncionario.php");
}

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
