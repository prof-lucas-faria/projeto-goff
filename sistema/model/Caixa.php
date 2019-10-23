<?php 
require_once '../controller/DB.php';
class Caixa{
	private $conexao;
	private $caixa;
    private $nome;
    private $saldoInicial

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
            $sql = 'INSERT INTO caixas (nome) VALUES (?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->caixa['nome']);
            $stmt->bindValue(1, $this->caixa['saldoInicial']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listar() {
        try {
            $sql = 'SELECT * FROM caixas';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function editar() {
        try {
            $sql = "UPDATE caixas SET nome = ? WHERE idcaixa = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->mesa['nome']);
            $stmt->bindValue(1, $this->caixa['saldoInicial']);
            $stmt->bindValue(2, $this->mesa['idcaixa']);            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function deletar() {
        try {
            $sql = 'DELETE FROM caixas WHERE idcaixa = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->caixa['idcaixa']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>