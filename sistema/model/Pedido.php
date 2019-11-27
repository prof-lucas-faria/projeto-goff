<?php 
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
  session_start();
}
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

            $sql = 'INSERT INTO pedidos (data, idFuncionario, idMesa, observacao, qtdItens, totalPedido, situacao, status) 
            VALUES (?,?,?,?,?,?,?,?)';

            $status = 1;
            $situacao = 1;

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['data']);
            $stmt->bindValue(2, $this->pedidos['idFuncionario']);
            $stmt->bindValue(3, $this->pedidos['idMesa']);
            $stmt->bindValue(4, $this->pedidos['observacao']);
            $stmt->bindValue(5, $this->pedidos['qtdItens']);
            $stmt->bindValue(6, $this->pedidos['totalPedido']);
            $stmt->bindValue(7, $situacao);
            $stmt->bindValue(8, $status);
            $stmt->execute();

            $idPedido = $this->conexao->lastInsertId();

            foreach ($_SESSION['itensPedido'] as $produtos) {

                $sql1 = 'INSERT INTO itenspedidos (idPedido, idProduto, quantidade) VALUES (?,?,?)';

                $stmt1 = $this->conexao->prepare($sql1);
                $stmt1->bindValue(1, $idPedido);
                $stmt1->bindValue(2, $produtos['idProduto']);
                $stmt1->bindValue(3, $produtos['quantidade']);

                $stmt1->execute();
            }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    public function listar() {
        try {
            $sql = 'SELECT idPedido, data, p.idFuncionario, f.nome as funcionario, p.idMesa, m.nome as mesa,
                    observacao, qtdItens, totalPedido, desconto, tipoRecebimento, valorRecebido, situacao, 
                    IF(situacao=1,"Aberto","Finalizado") as n_situacao
                    FROM pedidos p
                    INNER JOIN funcionarios f ON p.idFuncionario = f.idFuncionario
                    INNER JOIN mesas m ON p.idMesa = m.idMesa
                    WHERE p.status > 0 AND p.situacao = 1';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function relatorio() {
        try {
            $sql = 'SELECT idPedido, data, p.idFuncionario, f.nome as funcionario, p.idMesa, m.nome as mesa,
                    observacao, qtdItens, totalPedido, desconto, IF(tipoRecebimento=1,"Dinheiro",IF(tipoRecebimento=2,"Cartão Débito",IF(tipoRecebimento=3,"Cartão Crédito",""))) as tipoRecebimento, valorRecebido
                    FROM pedidos p
                    INNER JOIN funcionarios f ON p.idFuncionario = f.idFuncionario
                    INNER JOIN mesas m ON p.idMesa = m.idMesa
                    WHERE p.status > 0 AND p.situacao = 2
                    ORDER BY idPedido DESC';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function impressao() {
        try {
            $sql = 'SELECT i.idPedido, m.nome as mesa, p.data, pr.nome as produto, quantidade, pr.precoVenda
                    FROM itenspedidos i
                    INNER JOIN pedidos p ON i.idPedido = p.idPedido
                    INNER JOIN produtos pr ON i.idProduto = pr.idProduto
                    INNER JOIN mesas m ON p.idMesa = m.idMesa
                    WHERE p.situacao = 1;';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function vendasportipo() {
        try {
            $sql = 'SELECT idPedido, data, p.idFuncionario, f.nome as funcionario, p.idMesa, m.nome as mesa,
observacao, qtdItens, totalPedido, desconto, IF(tipoRecebimento=1,"Dinheiro",IF(tipoRecebimento=2,"Cartão Débito",IF(tipoRecebimento=3,"Cartão Crédito",""))) as tipoRecebimento, valorRecebido
FROM pedidos p
INNER JOIN funcionarios f ON p.idFuncionario = f.idFuncionario
INNER JOIN mesas m ON p.idMesa = m.idMesa
WHERE p.status > 0 AND p.situacao = 2 AND tipoRecebimento = ?
ORDER BY idPedido DESC';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['tipoRecebimento']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deletar() {

        try {
            $sql = "UPDATE pedidos SET status = ? WHERE idPedido = ?";
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->pedidos['idPedido']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function finalizar() {

        try {
            $sql = "UPDATE pedidos SET desconto = ?, tipoRecebimento = ?, valorRecebido = ?, situacao = ? 
            WHERE idPedido = ?";
            $situacao = 2;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->pedidos['desconto']);
            $stmt->bindValue(2, $this->pedidos['tipoRecebimento']);
            $stmt->bindValue(3, $this->pedidos['valorRecebido']);
            $stmt->bindValue(4, $situacao);
            $stmt->bindValue(5, $this->pedidos['idPedido']);
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