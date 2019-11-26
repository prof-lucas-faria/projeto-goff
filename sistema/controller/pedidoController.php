<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../controller/DB.php';
require_once '../model/Pedido.php';
require_once '../model/Funcionario.php';
require_once '../model/Mesa.php';
require_once '../model/Produto.php';

if (isset($_POST['opcao']) && ($_POST['opcao']) == 'sessao') {

    $idMesa = $_POST['idMesa'];
    $observacao = $_POST['observacao'];

    $_SESSION['dados'] = array();
    $_SESSION['dados']['idMesa'] = $idMesa;
    $_SESSION['dados']['observacao'] = $observacao;

    header("Location: ../view/PDV.php");

}

if (isset($_POST['salvar'])){

    date_default_timezone_set('America/Fortaleza');
    $data = date('Y/m/d H:i:s');

    echo $data;

    $dadosFormularioPedido = array(
        'data' => $data,
        'idFuncionario' => $_SESSION['dados_usuario']->idFuncionario,
        'idMesa' => $_POST['idMesa'],
        'observacao' => $_POST['observacao'],
        'qtdItens' => $_POST['qtd_itens'],
        'totalPedido' => $_POST['total']
    );
    $pedido = new Pedido(DB::getInstance(), $dadosFormularioPedido);
    $pedido->inserir();
    unset($_SESSION['itens']);
    unset($_SESSION['dados']);
    unset($_SESSION['itenspedidos']);
    header("Location: ../view/PDV.php");
}

if(isset($_POST['cancelar'])){
    unset($_SESSION['itens']);
    unset($_SESSION['dados']);
    unset($_SESSION['itenspedidos']);
    header("Location: ../view/PDV.php");
}

if(isset($_GET['excluir'])){
    $pedido = new Pedido(DB::getInstance(), array("idPedido" => $_GET['excluir']));
    if($pedido->deletar()){
        header("Location: ../view/PDV.php");
    }
}

if(isset($_GET['finalizar'])){
    $pedido = new Pedido(DB::getInstance(), array("idPedido" => $_GET['finalizar']));
    if($pedido->finalizar()){
        header("Location: ../view/PDV.php");
    }
}

function listaPedidos() {
    $pedido = new Pedido(DB::getInstance(), null);
    return $pedido->listar();
}

function listaVendas() {
    $pedido = new Pedido(DB::getInstance(), null);
    return $pedido->relatorio();
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
