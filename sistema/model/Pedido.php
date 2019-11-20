<?php 
require_once '../controller/DB.php';

class Pedido{

  private $conexao;

  private $data;
  private $idFuncionario;
  private $idMesa;
  private $observacao;
  private $qtdItens;
  private $totalPedido;
  private $desconto;
  private $tipoRecebimento;
  private $valorRecebido;
  private $situacao;
  private $status;

  private $idProduto;
 
  public function __get($atributo) {
      return $this->$atributo;
  }

  public function __set($atributo, $valor) {
      $this->$atributo = $valor;
  }

  public function __construct($conexao, $pedidos) {
    $this->conexao = $conexao;
    $this->pedidos = $pedidos;
}

    public function inserir() {

        try {

            $sql = 'INSERT INTO pedidos (data, idFuncionario, idMesa, observacao, qtdItens, totalPedido, desconto, tipoRecebimento, valorRecebido, situacao, status) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)';

            $status = 1;
            $situacao = 1;

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['data']);
            $stmt->bindValue(2, $this->pedidos['idFuncionario']);
            $stmt->bindValue(3, $this->pedidos['idMesa']);
            $stmt->bindValue(4, $this->pedidos['observacao']);
            $stmt->bindValue(5, $this->pedidos['qtdItens']);
            $stmt->bindValue(6, $this->pedidos['totalPedido']);
            $stmt->bindValue(7, $this->pedidos['desconto']);
            $stmt->bindValue(8, $this->pedidos['tipoRecebimento']);
            $stmt->bindValue(9, $this->pedidos['valorRecebido']);
            $stmt->bindValue(10, $situacao);
            $stmt->bindValue(11, $status);

            return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    public function listar() {
        try {
            $sql = 'SELECT * FROM pedidos WHERE status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editar() {
        try {

            $sql = "UPDATE pedidos SET nome = ?, idCategoria = ?, foto = ?, precoCusto = ?, precoVenda = ? WHERE idProduto = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['nome']);
            $stmt->bindValue(2, $this->pedidos['idCategoria']);
            $stmt->bindValue(3, $this->pedidos['foto']);
            $stmt->bindValue(4, $this->pedidos['precoCusto']);
            $stmt->bindValue(5, $this->pedidos['precoVenda']);
            $stmt->bindValue(6, $this->pedidos['idProduto']);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deletar() {

        try {
            
            $sql = "UPDATE pedidos SET status = ? WHERE idProduto = ?";
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->pedidos['idProduto']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function listarPorId() {
        try {
            $sql = 'SELECT * FROM pedidos WHERE idProduto = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['idProduto']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>