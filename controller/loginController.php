<?php
session_start();

if ($_POST) {
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];

    if (isset($email) && isset($senha)) {
        require_once '../model/clientesClass.php';
        require_once '../model/funcionariosClass.php';

        $clientesModel = new clientesClass();
        $clienteId = $clientesModel->autenticarCliente($email, $senha);

        if ($clienteId) {
            $_SESSION['login'] = $clienteId;
            header('location:../index.php');
        } else {
            $funcionario = new funcionariosClass();
            $funcionarioId = $funcionario->autenticarFuncionario($email, $senha);
            if ($funcionarioId) {
                $_SESSION['admin'] = $funcionarioId;
                echo $funcionarioId;
                header('location:../index.php');
            } else {
                header('location:../login.php?cod=171');
            }
        }
    } else {
        header('location:../login.php?cod=171');
    }
} else {
    header('location:../login.php?cod=172');
}
