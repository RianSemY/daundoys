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
    isset($confirmarSenha)) {

        if($confirmarSenha !== $senha){
            header('location:../registro.php?cod=wrong_pass');
            exit();
        }
        require_once '../model/clientesClass.php';
        $cliente = new clientesClass();
        $clienteExiste = $cliente->checkEmailExistence($email);

        require_once '../model/funcionariosClass.php';
        $funcionario = new funcionariosClass();
        $funcionarioExiste = $funcionario->checkEmailExistence($email);

        $cpfChar = strlen($cpf);
        $telefoneChar = strlen($telefone);
        if ($telefoneChar < 16){
            header('location:../registrarFuncionario.php?cod=invalid_telefone');
            exit();
        }
        if ($cpfChar < 14){
            header('location:../registrarFuncionario.php?cod=invalid_cpf');
            exit();
        }
        if($cargo == ''){
            header('location:../registrarFuncionario.php?cod=invalid_cargo');
            exit();
        }
        if ($funcionarioExiste || $clienteExiste) {
            header('location:../registrarFuncionario.php?cod=email_exists');
            exit();
        }

        $funcionario->setEmail($email);
        $funcionario->setTelefone($telefone);
        $funcionario->setSenha($senha);
        $funcionario->setNome($nome);
        $funcionario->setCargo($cargo);
        $funcionario->setCpf($cpf);
        
        $funcionario->insert();
        header('location:../registrarFuncionario.php?cod=sucess');
    } 
    else{
        header('location:../registrarFuncionario.php?cod=172');
        exit();
    }
} else {
    header('location:../registrarFuncionario.php?cod=error');
}