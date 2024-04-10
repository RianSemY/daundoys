<?php

if ($_POST) {
    @$nome = $_POST['nome'];
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];
    @$endereco = $_POST['endereco'];
    @$telefone = $_POST['telefone'];
    @$cpf = $_POST['cpf'];

    @$confirmarSenha = $_POST['confirmarSenha'];
    if (isset($nome) and isset($email) and isset($senha) and
    isset($endereco) and isset($telefone) and isset($cpf) and
    isset($confirmarSenha) and $confirmarSenha === $senha) {

        require_once '../model/clientesClass.php';
        $cliente = new clientesClass();
        $clienteExiste = $cliente->checkEmailExistence($email);

        require_once '../model/funcionariosClass.php';
        $funcionario = new funcionariosClass();
        $funcionarioExiste = $funcionario->checkEmailExistence($email);
        if ($funcionarioExiste || $clienteExiste) {
            header('location:../registro.php?cod=email_exists');
            exit();
        }

        $cpfChar = strlen($cpf);
        $telefoneChar = strlen($telefone);
        if ($telefoneChar < 16){
            header('location:../registro.php?cod=invalid_telefone');
            exit();
        }
        if ($cpfChar < 14){
            header('location:../registro.php?cod=invalid_cpf');
            exit();
        }

        
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);
        $cliente->setSenha($senha);
        $cliente->setNome($nome);
        $cliente->setEndereco($endereco);
        $cliente->setCpf($cpf);
        
        $cliente->insert();
        header('location:../login.php?cod=sucess');
    } else{
        header('location:../registro.php?cod=172');
        exit();
    }
} else {
    header('location:../registro.php');
}