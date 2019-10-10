<?php

require_once '../controller/conexao_bd.php';
require_once '../controller/DB.php';
require_once '../model/Mesa.php';

if (isset($_POST['salvar'])) {

    $dadosFormularioMesa = array(
        'nome' =>$_POST['nome']
    );
    print_r($dadosFormularioMesa);

    $oMesa = new Mesa(DB::getInstance(), $dadosFormularioMesa);

    

    if($oMesa->inserir()){
        echo "inserido";
    }else{
        echo "ERRO AO CADASTRAR";
    }
}

//if para cadastro de coordenador
if (isset($_POST['atualizar_modal'])) {
    $dadosFormularioCoordenador = array(
        'nome' =>$_POST['nome_modal'],
        'CPF' => $_POST['cpf_modal'],
        'telefone' => $_POST['telefone_modal'],
        'email' => $_POST['email_modal'],
        'sexo' => $_POST['sexo_modal'],
        'endereco' => $_POST['endereco_modal'],
        'id_cidade' => $_POST['cidade_modal'],
        'senha' => md5($_POST['senha_modal']),
        'id_pessoa'=> $_POST['id_pessoa'],
        'id_coordenador' => $_POST['id_coordenador'],
        'status' => 1);
    $oCoordenador = new Coordenador(DB::getInstance(), $dadosFormularioCoordenador);
    if($oCoordenador->editar()){
        header("Location: ../view/cadastro_coordenador.php?atualizar=true");
    }else{
        //eita
    }
}

if(isset($_POST['excluir_registro'])){
    $oCoordenador = new Coordenador(DB::getInstance(), array("id_coordenador" => $_POST['id_exclusao']));
   if($oCoordenador->deletar()){
    header("Location: ../view/cadastro_coordenador.php?excluir=true");
}


}
if(isset($_POST['exibir_registro'])){
    $oCoordenador = new Coordenador(DB::getInstance(),array('id_coordenador' =>$_POST['id_para_atualizar']));
    $dados['dados'] = $oCoordenador->listar_por_id();
    echo json_encode($dados);

}

function listaCidades(){
    $oCidade = new Cidade(DB::getInstance(), null);
    return $oCidade->listar();
}

function listaCoordenadores() {
    $oCoordenador = new Coordenador(DB::getInstance(), null);
    return $oCoordenador->listar();
}

?>
