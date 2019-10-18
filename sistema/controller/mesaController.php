<?php
require_once '../controller/DB.php';
require_once '../model/Mesa.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioMesa = array(
        'nome' =>$_POST['nome']
    );
    $mesa = new Mesa(DB::getInstance(), $dadosFormularioMesa);
    if($mesa->inserir()){
        header("Location: ../view/cadastroMesa.php");
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

if (isset($_POST['editar'])) {

    $dadosFormularioMesa = array(
        'idMesa' =>$_POST['idMesa'],
        'nome' =>$_POST['nome']
    );
    $mesa = new Mesa(DB::getInstance(), $dadosFormularioMesa);
    if($mesa->editar()){
        header("Location: ../view/cadastroMesa.php");
    }else{
        echo "ERRO AO EDITAR";
    }
}

if(isset($_POST['excluir'])){
    $mesa = new Mesa(DB::getInstance(), array("idMesa" => $_POST['idMesa']));
    if($mesa->deletar()){
        header("Location: ../view/cadastroMesa.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../view/cadastroMesa.php");
}

function listaMesas() {
    $mesa = new Mesa(DB::getInstance(), null);
    return $mesa->listar();
}

?>
