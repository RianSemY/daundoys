<?php

require_once 'conexao.php';

class clientesClass{
    protected $id;
    protected $nome;
    protected $endereco;
    protected $telefone;
    protected $email;
    protected $senha;
    protected $cpf;
    
    public function __construct() {
        
    } 
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getCpf() {
        return $this->cpf;
    }

    // Setters
    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setEndereco($endereco): void{
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone): void{
        $this->telefone = $telefone;
    }

    public function setEmail($email): void{
        $this->email = $email;
    }

    public function setSenha($senha): void{
        $this->senha = $senha;
    }

    public function setCpf($cpf): void{
        $this->cpf = $cpf;
    }

    public function autenticarCliente($email, $senha) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $email = $db->getConnection()->real_escape_string($email);
        $senha = $db->getConnection()->real_escape_string($senha);
        $sql = "SELECT cliente_id FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $resultado = $db->Consultar($sql);
        $db->Desconectar();
        return $resultado->num_rows == 1 ? $resultado->fetch_assoc()['cliente_id'] : false;
    }
    
    public function loadAll() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM clientes';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }
    public function loadNomeCliente($id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT nome FROM clientes where cliente_id = '$id'";
        $result = $db->Consultar($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
        } else {
            $nome = null;
        }
        $db->Desconectar();
        return $nome;
    }
    
    public function insert(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO clientes (nome, endereco, email, telefone, senha, cpf) VALUES ("'.$this->nome.'","'.$this->endereco.'","'.$this->email.'","'.$this->telefone.'","'.$this->senha.'","'.$this->cpf.'");';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }

    public function checkEmailExistence($email) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $email = $db->getConnection()->real_escape_string($email);
        $sql = "SELECT COUNT(*) AS count FROM clientes WHERE email = '$email'";
        $resultado = $db->Consultar($sql);
        $db->Desconectar();
        $row = $resultado->fetch_assoc();
        return $row['count'] > 0;
    }
}
