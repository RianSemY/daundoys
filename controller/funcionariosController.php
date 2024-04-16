<?php

function loadFunction($id){
    require_once './model/funcionariosClass.php';
    $funcionario = new funcionariosClass();
    $cargo = $funcionario->loadFunction($id);
    return $cargo;
}
function loadNomeFuncionario($id){
    require_once './model/funcionariosClass.php';
    $funcionario = new funcionariosClass();
    $nome = $funcionario->loadNomeFuncionario($id);
    return $nome;
}
function loadAllFuncionarios(){
    require_once './model/funcionariosClass.php';
    $funcionario = new funcionariosClass();
    $funcionarioList = $funcionario->loadAllFuncionarios();
    return $funcionarioList;
}

