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

    $diretorio = '../assets/img/produtos/';
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nomeFoto);

    $produto = new Produto(DB::getInstance(), $dadosFormularioProduto);
    if($produto->inserir()){
        header("Location: ../view/cadastroProduto.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if(isset($_POST['excluir'])){

    $produto = new Produto(DB::getInstance(), array("idProduto" => $_POST['idProduto']));
    $dados['dados'] = $produto->listarPorId();

    $diretorioAtual = '../assets/img/produtos/';

    $novoDiretorio = '../assets/img/produtos/excluidos/';

    $atual = $diretorioAtual.$dados['dados'][0]->foto;

    $novo = $novoDiretorio.$dados['dados'][0]->foto;
    
    rename($atual, $novo);

    if($produto->deletar()){
        header("Location: ../view/cadastroProduto.php");
    } else{
        echo "ERRO AO EXCLUIR";
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
