<?php

function loadFunction($id){
    require_once './model/funcionariosClass.php';
    $funcionario = new funcionariosClass();
    $cargo = $funcionario->loadFunction($id);
    return $cargo;
}

