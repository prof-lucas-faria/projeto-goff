<?php 

require_once '../controller/DB.php';

class Mesa{
	private $conexao;
	private $mesa;
	private $nome;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __construct($conexao, $mesa) {
        $this->conexao = $conexao;
        $this->mesa = $mesa;
    }

    public function inserir() {
        try {
            $sql = 'INSERT INTO mesas (nome) VALUES (?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->mesa['nome']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = 'SELECT * FROM mesas';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editar() {
        try {
            $sql = "UPDATE mesas SET nome = ? WHERE idMesa = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->mesa['nome']);
            $stmt->bindValue(2, $this->mesa['idMesa']);            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function deletar() {
        try {
            $sql = 'DELETE FROM mesas WHERE idMesa = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->mesa['idMesa']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>