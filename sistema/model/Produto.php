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
            $stmt->bindValue(1, $this->produtos['nome']);
            $stmt->bindValue(2, $this->produtos['idCategoria']);
            $stmt->bindValue(3, $this->produtos['foto']);
            $stmt->bindValue(4, $this->produtos['precoCusto']);
            $stmt->bindValue(5, $this->produtos['precoVenda']);
            $stmt->bindValue(6, $status);

            return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    public function listar() {
        try {
            $sql = 'SELECT p.idProduto, p.nome, p.foto, p.precoCusto, p.precoVenda, c.nome as categoria
                    FROM produtos p
                    INNER JOIN categorias c ON p.idCategoria = c.idCategoria
                    WHERE p.status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editar() {
        try {

            $sql = "UPDATE produtos SET nome = ?, idCategoria = ?, foto = ?, precoCusto = ?, precoVenda = ? WHERE idProduto = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->produtos['nome']);
            $stmt->bindValue(2, $this->produtos['idCategoria']);
            $stmt->bindValue(3, $this->produtos['foto']);
            $stmt->bindValue(4, $this->produtos['precoCusto']);
            $stmt->bindValue(5, $this->produtos['precoVenda']);
            $stmt->bindValue(6, $this->produtos['idProduto']);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deletar() {

        try {
            
            $sql = "UPDATE produtos SET status = ? WHERE idProduto = ?";
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->produtos['idProduto']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function listarPorId() {
        try {
            $sql = 'SELECT * FROM produtos WHERE idProduto = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->produtos['idProduto']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
?>