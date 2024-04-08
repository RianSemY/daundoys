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

    public function loginConfirm(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM clientes where email="'.$this->email.'" and senha="'.$this->senha.'";';
        $db->Executar($sql);
        $db->Desconectar();

        return $db->total;
    }
    public function takeId(){
        $db = new ConexaoMysql();
        $db->Conectar();
        
        $sql = 'SELECT * FROM clientes where email="'.$this->email.'" and senha="'.$this->senha.'";';
        $result = $db->Consultar($sql);
        
        $db->Desconectar();
        return $result;
    }
    
    public function loadAll() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM clientes';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }
    public function insert(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO clientes (nome, endereco, email, telefone, senha, cpf) VALUES ("'.$this->nome.'","'.$this->endereco.'","'.$this->email.'","'.$this->telefone.'","'.$this->senha.'","'.$this->cpf.'");';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }
}
