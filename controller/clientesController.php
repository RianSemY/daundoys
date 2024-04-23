<?php
function loadNomeCliente($id){
    require_once './model/clientesClass.php';
    $clientes = new clientesClass();
    $nome = $clientes->loadNomeCliente($id);
    return $nome;
}
function loadNomeClienteInCarrinhoController($id){
    require_once '../model/clientesClass.php';
    $clientes = new clientesClass();
    $nome = $clientes->loadNomeCliente($id);
    return $nome;
}

function getEmailByID($id){
    require_once './model/clientesClass.php';
    $clientes = new clientesClass();
    $email = $clientes->getEmailByID($id);
    return $email;
}
// function loadAllClientes(){
//     require_once './model/clientessClass.php';
//     $clientes = new clientesClass();
//     $clientesList = $clientes->loadAllClientes();
//     return $clientesList;
// }