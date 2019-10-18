<?php 
require_once '../controller/DB.php';

class Funcionario{

  private $conexao;
  private $nome;
  private $CPF;
  private $endereco;
  private $funcao;
  private $telefone;
  private $whatsapp;
  private $senha;
  private $email;
  private $status;

  public function __get($atributo) {
      return $this->$atributo;
  }

  public function __set($atributo, $valor) {
      $this->$atributo = $valor;
  }

  public function __construct($conexao, $funcionario) {
    $this->conexao = $conexao;
    $this->funcionario = $funcionario;
}

    public function inserir() {

        try {

            $sql = 'INSERT INTO funcionarios (nome, CPF, endereco, funcao, telefone, whatsapp, senha, e-mail) 
            VALUES (?,?,?,?,?,?,?,?)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->coordenador['nome']);
            $stmt->bindValue(2, $this->coordenador['CPF']);
            $stmt->bindValue(3, $this->coordenador['endereco']);
            $stmt->bindValue(4, $this->coordenador['funcao']);
            $stmt->bindValue(5, $this->coordenador['telefone']);
            $stmt->bindValue(6, $this->coordenador['whatsapp']);
            $stmt->bindValue(7, $this->coordenador['senha']);
            $stmt->bindValue(8, $this->coordenador['e-mail']);
            return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

}
?>