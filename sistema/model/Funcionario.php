<?php 
require_once '../controller/DB.php';

class Funcionario{

  private $conexao;
  private $nome;
  private $CPF;
  private $endereco;
  private $sexo;
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

            $sql = 'INSERT INTO funcionarios (nome, CPF, endereco, sexo, funcao, telefone, whatsapp, senha, email, status) 
            VALUES (?,?,?,?,?,?,?,?,?,?)';
            $status = 1;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->funcionario['nome']);
            $stmt->bindValue(2, $this->funcionario['CPF']);
            $stmt->bindValue(3, $this->funcionario['endereco']);
            $stmt->bindValue(4, $this->funcionario['sexo']);
            $stmt->bindValue(5, $this->funcionario['funcao']);
            $stmt->bindValue(6, $this->funcionario['telefone']);
            $stmt->bindValue(7, $this->funcionario['whatsapp']);
            $stmt->bindValue(8, $this->funcionario['senha']);
            $stmt->bindValue(9, $this->funcionario['email']);
            $stmt->bindValue(10, $status);
            return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    public function listar() {
        try {
            $sql = 'SELECT * FROM funcionarios WHERE status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editar() {
        try {
            $sql = "UPDATE funcionarios SET nome = ?, CPF = ?, endereco = ?, sexo = ?, funcao = ?, telefone = ?,
                    whatsapp = ?, email = ? WHERE idFuncionario = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->funcionario['nome']);
            $stmt->bindValue(2, $this->funcionario['CPF']);
            $stmt->bindValue(3, $this->funcionario['endereco']);
            $stmt->bindValue(4, $this->funcionario['sexo']);
            $stmt->bindValue(5, $this->funcionario['funcao']);
            $stmt->bindValue(6, $this->funcionario['telefone']);
            $stmt->bindValue(7, $this->funcionario['whatsapp']);
            $stmt->bindValue(8, $this->funcionario['email']);
            $stmt->bindValue(9, $this->funcionario['idFuncionario']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

        public function deletar() {
        try {
            $sql = "UPDATE funcionarios SET status = ? WHERE idFuncionario = ?";
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->funcionario['idFuncionario']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function login(){
        try {
            $sql = "SELECT * FROM funcionarios WHERE CPF = ? AND senha = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->funcionario['CPF']);
            $stmt->bindValue(2, md5($this->funcionario['senha']));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }
}
?>