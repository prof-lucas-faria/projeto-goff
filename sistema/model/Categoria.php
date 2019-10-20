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
            $sql = 'INSERT INTO categorias (nome) VALUES (?)';    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->categoria['nome']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listar() {
        try {
            $sql = 'SELECT * FROM categorias';
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
            $stmt->bindValue(1, $this->mesa['nome']);
            $stmt->bindValue(2, $this->mesa['idCategoria']);            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function deletar() {
        try {
            $sql = 'DELETE FROM categorias WHERE idCategoria = ?';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->categoria['idCategoria']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>