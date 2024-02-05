<?php
    class dataBase {
        // Atributos
        private $conexao;
        private $host = 'localhost';
        private $porta = '3306';
        private $db_nome = 'db_projeto_ge';
        private $usuario = 'root';
        private $senha = '';

        // Métodos
        public function __construct() {
            try {
                $str_connection = "mysql:host=$this->host;port=$this->porta;dbname=$this->db_nome";
                $this->conexao = new PDO($str_connection, $this->usuario, $this->senha);
            } catch (PDOException $erro) {
                throw new Exception($erro->getMessage());
            }
        }

        // insert, update e delete
        public function executeCommand($sql, $parametros = []) {
            try {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($parametros);
            } catch (PDOException $erro) {
                throw new Exception($erro->getMessage());
            }
        }

        // select de apenas um registro/linha
        public function selectRegister($sql, $parametros = []) {
            try {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($parametros);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                throw new Exception($erro->getMessage());
            }
        }

        // select de vários registros/linhas
        public function selectRegisters($sql, $parametros = []) {
            try {
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($parametros);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                throw new Exception($erro->getMessage());
            }
        }
    }
?>