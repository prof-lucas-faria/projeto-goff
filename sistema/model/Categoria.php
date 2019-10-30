<?php 
require_once '../controller/DB.php';
class Categoria{
	private $conexao;
	private $categoria;
	private $nome;
    public function __get($atributo) {
        return $this->$atributo;
    }
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    public function __construct($conexao, $categoria) {
        $this->conexao = $conexao;
        $this->categoria = $categoria;
    }
    public function inserir() {
        try {
            $sql = 'INSERT INTO categorias (nome, status) VALUES (?,?)';    
            $status = 1;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->categoria['nome']);
            $stmt->bindValue(2, $status);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listar() {
        try {
            $sql = 'SELECT * FROM categorias WHERE status > 0';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function editar() {
        try {
            $sql = "UPDATE categorias SET nome = ? WHERE idCategoria = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->categoria['nome']);
            $stmt->bindValue(2, $this->categoria['idCategoria']);            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function deletar() {
        try {
            $sql = 'UPDATE categorias SET status = ? WHERE idCategoria = ?';
            $status = 0;
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $this->categoria['idCategoria']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>