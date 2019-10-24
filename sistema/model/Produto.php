<?php 
require_once '../controller/DB.php';

class Produto{

  private $conexao;

  private $nome;
  private $idCategoria;
  private $foto;
  private $precoCusto;
  private $precoVenda;
  private $status;

  private $idProduto;


  public function __get($atributo) {
      return $this->$atributo;
  }

  public function __set($atributo, $valor) {
      $this->$atributo = $valor;
  }

  public function __construct($conexao, $produtos) {
    $this->conexao = $conexao;
    $this->produtos = $produtos;
}

    public function inserir() {

        try {

            $sql = 'INSERT INTO produtos (nome, idCategoria, foto, precoCusto, precoVenda, status) 
            VALUES (?,?,?,?,?,?)';

            $status = 1;

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->funcionario['nome']);
            $stmt->bindValue(2, $this->funcionario['idCategoria']);
            $stmt->bindValue(3, $this->funcionario['foto']);
            $stmt->bindValue(4, $this->funcionario['precoCusto']);
            $stmt->bindValue(5, $this->funcionario['precoVenda']);
            $stmt->bindValue(6, $status);

            return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    public function listar() {
        try {
            $sql = 'SELECT * FROM produtos WHERE status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function editar() {
        try {

            $sql = "UPDATE produtos SET nome = ?, idCategoria = ?, foto = ?, precoCusto = ?, precoVenda = ?, status = ? where idProduto = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->funcionario['nome']);
            $stmt->bindValue(2, $this->funcionario['idCategoria']);
            $stmt->bindValue(3, $this->funcionario['foto']);
            $stmt->bindValue(4, $this->funcionario['precoCusto']);
            $stmt->bindValue(5, $this->funcionario['precoVenda']);
            $stmt->bindValue(6, $this->funcionario['status']);
            $stmt->bindValue(7, $this->funcionario['idProduto']);


            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

        public function deletar() {

        try {
            $sql = "UPDATE produtos SET status = ? WHERE idProtudo = ?";
            $status = 0;

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->funcionario['idProtudo']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
?>