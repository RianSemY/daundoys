<?php
if ($_POST) {
    @$nome = $_POST['nome'];
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];
    @$cargo = $_POST['cargo'];
    @$telefone = $_POST['telefone'];
    @$cpf = $_POST['cpf'];
    
    
    @$confirmarSenha = $_POST['confirmarSenha'];
    if (isset($nome) and isset($email) and isset($senha) and
    isset($cargo) and isset($telefone) and isset($cpf) and
    isset($confirmarSenha) and $confirmarSenha === $senha and $cargo!='') {

        require_once '../model/clientesClass.php';
        $cliente = new clientesClass();
        $clienteExiste = $cliente->checkEmailExistence($email);

        require_once '../model/funcionariosClass.php';
        $funcionario = new funcionariosClass();
        $funcionarioExiste = $funcionario->checkEmailExistence($email);

        if ($funcionarioExiste || $clienteExiste) {
            header('location:../registrarFuncionário.php?cod=email_exists');
            exit();
        }

        $funcionario->setEmail($email);
        $funcionario->setTelefone($telefone);
        $funcionario->setSenha($senha);
        $funcionario->setNome($nome);
        $funcionario->setCargo($cargo);
        $funcionario->setCpf($cpf);
        
        $funcionario->insert();
        header('location:../registrarFuncionário.php?cod=sucess');
    } else{
        header('location:../registrarFuncionário.php?cod=172');
        exit();
    }
} else {
    header('location:../registrarFuncionário.php?cod=error');
}