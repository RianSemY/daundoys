<?php
function loadAll(){
    require_once './model/pedidosClass.php';
    $pedido = new pedidosClass();
    $pedidoList = $pedido->loadAll();
    return $pedidoList;
}

function printByPedidoId($id_pedido){
    require_once './model/produtosPedidosClass.php';
    $produtos = new produtosPedidosClass();
    $produtosList = $produtos->printByPedidoId($id_pedido);
    return $produtosList;
}

function getNameByProdutoId($id_pedido){
    require_once './model/produtosPedidosClass.php';
    $produtos = new produtosPedidosClass();
    $nome = $produtos->getNameByProdutoId($id_pedido);
    return $nome;
}
function getPrecoByProdutoId($id_pedido){
    require_once './model/produtosPedidosClass.php';
    $produtos = new produtosPedidosClass();
    $preco = $produtos->getPrecoByProdutoId($id_pedido);
    return $preco;
}


function updateStatus($id_pedido, $novo_status){
    require_once '../model/pedidosClass.php';
    $pedido = new pedidosClass();
    if ($novo_status == 'Em processamento'){
        $novo_status = 'Enviado';
        echo $novo_status;
    } else if ($novo_status == 'Enviado'){
        $novo_status = 'Entregue';
        echo $novo_status;
    }
    $pedido->updateStatus($id_pedido, $novo_status);
}


if($_POST && $_POST['action'] == 'updateStatus'){
    $idPedido = $_POST['ID_do_pedido'];
    $statusPedido = $_POST['status_do_pedido'];
    updateStatus($idPedido, $statusPedido);
    // echo $statusPedido;
    // echo ' ';
    // echo $idPedido;
    header('location: ../gerenciarPedidos.php');
}