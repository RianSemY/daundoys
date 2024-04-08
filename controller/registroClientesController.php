<?php

if ($_POST) {
    @$nome = $_POST['nome'];
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];
    @$endereco = $_POST['endereco'];
    @$telefone = $_POST['telefone'];
    @$cpf = $_POST['cpf'];

    
    if (isset($nome) and isset($email) and isset($senha) and isset($endereco) and isset($telefone) and isset($cpf)) {
        require_once '../model/clientesClass.php';
        
        $clientes = new clientesClass();
        $clientes->setEmail($email);
        $clientes->setTelefone($telefone);
        $clientes->setSenha($senha);
        $clientes->setNome($nome);
        $clientes->setEndereco($endereco);
        $clientes->setCpf($cpf);
        
        $clientes->insert();
        header('location:../login.php');
    }else{
        header('location:../index.php?cod=172');
    }
} else {
        
}