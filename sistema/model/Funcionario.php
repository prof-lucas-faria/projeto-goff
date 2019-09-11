<?php 

require_once '../controller/conexao_bd.php';

class Funcionario{

  private $conexao;
  private $funcionario;

  private $status;
  private $senha;

  public function __get($atributo) {
      return $this->$atributo;
  }

  public function __set($atributo, $valor) {
      $this->$atributo = $valor;
  }

  public function __construct($conexao, $) {
    $this->conexao = $conexao;
    $this->coordenador = $coordenador;
}

    public function inserir() {

        try {

            $sql = 'INSERT INTO pessoas (nome, CPF, telefone, email, sexo, endereco, id_cidade) 
            VALUES (?,?,?,?,?,?,?)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $this->coordenador['nome']);
            $stmt->bindValue(2, $this->coordenador['CPF']);
            $stmt->bindValue(3, $this->coordenador['telefone']);
            $stmt->bindValue(4, $this->coordenador['email']);
            $stmt->bindValue(5, $this->coordenador['sexo']);
            $stmt->bindValue(6, $this->coordenador['endereco']);
            $stmt->bindValue(7, $this->coordenador['id_cidade']);
            $stmt->execute();

            $sql1 = 'INSERT INTO coordenadores (id_coordenador, id_pessoa, status, senha) VALUES (?,?,?,?)';  

            $status = 1; //como está sendo cadastrado, já será ativado

            $stmt = DB::prepare($sql);
            $stmt1->bindValue(1, $this->conexao->lastInsertId());
            $stmt1->bindValue(2, $this->conexao->lastInsertId());
            $stmt1->bindValue(3, $status);
            $stmt1->bindValue(4, $this->coordenador['senha']); //a criptografia será feita ao enviar pra classe

            return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

        public function listar() {

            try {

                $sql = 'SELECT p.id_pessoa, p.nome, p.CPF, p.telefone, p.email, p.sexo, p.endereco, ci.nome AS cidade,
                e.nome AS estado, status, senha
                FROM coordenadores co
                INNER JOIN pessoas p ON co.id_pessoa = p.id_pessoa
                INNER JOIN cidades ci ON p.id_cidade = ci.id_cidade
                INNER JOIN estados e ON ci.id_estado = e.id_estado
                WHERE status <> 0';
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function editar() {

            try {

                $sql = 'UPDATE pessoas 
                SET nome = ?, CPF = ?, telefone = ?, email = ?, sexo = ?, endereco = ?, id_cidade = ?
                WHERE id_pessoa = ?';
                $stmt = DB::prepare($sql);
                $stmt->bindValue(1, $this->coordenador['nome']);
                $stmt->bindValue(2, $this->coordenador['CPF']);
                $stmt->bindValue(3, $this->coordenador['telefone']);
                $stmt->bindValue(4, $this->coordenador['email']);
                $stmt->bindValue(5, $this->coordenador['sexo']);
                $stmt->bindValue(6, $this->coordenador['endereco']);
                $stmt->bindValue(7, $this->coordenador['id_cidade']);
                $stmt->bindValue(8, $this->coordenador['id_pessoa']);
                $stmt->execute();

                $sql1 = 'UPDATE coordenadores 
                SET status = ?, senha = ?
                WHERE id_coordenador = ?';
                $stmt = DB::prepare($sql);
                $stmt1->bindValue(1, $this->coordenador['status']);
                $stmt1->bindValue(2, $this->coordenador['senha']);
                $stmt1->bindValue(3, $this->coordenador['id_coordenador']);
                return $stmt1->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                echo $e->getLine();
            }
        }
        
        public function deletar() {

            try {

                /* como não vamos realmente excluir, mas somente mudar o status, ao mandar deletar
                realiza a alteração do status de 1 para 0 */
                $status = 0;

                $sql = 'UPDATE coordenadores SET status = ? WHERE id_coordenador = ?';
                $stmt = DB::prepare($sql);
                $stmt->bindValue(1, $status);
                $stmt->bindValue(2, $this->coordenador['id_coordenador']);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }        

    function login(){

        try {
            $sql = "select * from pessoas INNER JOIN coordenadores ON coordenadores.senha = :senha and pessoas.cpf = :cpf";
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':cpf',$this->coordenador['cpf']);
            $stmt->bindValue(':senha',md5($this->coordenador['senha']));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    public function listar_por_id() {

        try {

            $sql = 'SELECT p.id_pessoa, p.nome, p.CPF, p.telefone, p.email, p.sexo, p.endereco, ci.id_cidade AS cidade,
            e.nome AS estado, co.id_coordenador, status, senha
            FROM coordenadores co
            INNER JOIN pessoas p ON co.id_pessoa = p.id_pessoa
            INNER JOIN cidades ci ON p.id_cidade = ci.id_cidade
            INNER JOIN estados e ON ci.id_estado = e.id_estado
            WHERE id_coordenador = ?';
            $stmt = DB::prepare($sql);
            $stmt->bindValue(1, $this->coordenador['id_coordenador']);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>