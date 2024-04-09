<?php
require_once 'conexao.php';

class funcionariosClass {
    protected $id;
    protected $nome;
    protected $cargo;
    protected $email;
    protected $cpf;
    protected $telefone;
    protected $senha;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function autenticarFuncionario($email, $senha) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $email = $db->getConnection()->real_escape_string($email);
        $senha = $db->getConnection()->real_escape_string($senha);
        $sql = "SELECT funcionario_id FROM funcionarios WHERE email = '$email' AND senha = '$senha'";
        $resultado = $db->Consultar($sql);
        $db->Desconectar();
        return $resultado->num_rows == 1 ? $resultado->fetch_assoc()['funcionario_id'] : false;
    }
    public function loadFunction($id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT cargo FROM funcionarios where funcionario_id = '$id'";
        $result = $db->Consultar($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cargo = $row['cargo'];
        } else {
            $cargo = null;
        }
        $db->Desconectar();
        return $cargo;
    }

    public function loadAll() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT * FROM funcionarios";
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }

    public function insert(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO funcionarios (nome, cargo, email, telefone, senha, cpf) VALUES ("'.$this->nome.'","'.$this->cargo.'","'.$this->email.'","'.$this->telefone.'","'.$this->senha.'","'.$this->cpf.'");';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }

    public function checkEmailExistence($email) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $email = $db->getConnection()->real_escape_string($email);
        $sql = "SELECT COUNT(*) AS count FROM funcionarios WHERE email = '$email'";
        $resultado = $db->Consultar($sql);
        $db->Desconectar();
        $row = $resultado->fetch_assoc();
        return $row['count'] > 0;
    }
}

