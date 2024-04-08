<?php
if($_POST){
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];
    
    if(isset($email) and isset($senha)){
        require_once'../model/clientesClass.php';
        
        $conta = new clientesClass;
        $conta->setEmail($email);
        $conta->setSenha($senha);
        
        $total = $conta->loginConfirm();
        
        if($total == 1){
            $cont = $conta->takeId();
            foreach ($cont as $con){
                $id = $con['cliente_id'];
            }
            session_start();
            $_SESSION['login'] = $id;

            header('location:../index.php');
        }else{
            header ('location:../login.php?cod=171');
        }    
    }else{
        header ('location:../login.php?cod=171');
    }  
    
}else{
    header ('location:../login.php?cod=172');
}