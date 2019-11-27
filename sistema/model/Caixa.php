<?php 
require_once '../controller/DB.php';
class Caixa{
	private $conexao;
    private $nome;
    private $funcionario;
    private $saldoInicial;
    private $status;

    public function __get($atributo) {
        return $this->$atributo;
    }
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    public function __construct($conexao, $caixa) {
        $this->conexao = $conexao;
        $this->caixa = $caixa;
    }
    public function inserir() {
        try {
            $sql = 'INSERT INTO caixas (nome, idFuncionario, saldoInicial, status ) VALUES (?,?,?,?)';    
            $stmt = $this->conexao->prepare($sql);
            $status = 1;
            $stmt->bindValue(1, $this->caixa['nome']);
            $stmt->bindValue(2, $this->caixa['idFuncionario']);
            $stmt->bindValue(3, $this->caixa['saldoInicial']);
            $stmt->bindValue(4, $status);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listar() {
        try {
            $sql = 'SELECT idCaixa, c.nome, f.nome as funcionario, saldoInicial
                    FROM caixas c
                    INNER JOIN funcionarios f ON c.idFuncionario = f.idFuncionario
                    WHERE c.status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

////////////////////// CAIXA NÃO PODE SER EDITADO /////////////////////////
    
    // CAIXA NÃO PODE SER DELETADO - SOMENTE INATIVADO
    public function deletar() {
        try {
            $sql = "UPDATE caixas SET status = ? WHERE idCaixa = ?";
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->caixa['idcaixa']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>