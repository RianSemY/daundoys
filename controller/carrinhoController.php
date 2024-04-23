<?php
function atualizarEstoque($produto_id, $estoque_atualizado){
    require_once '../model/produtosClass.php';
    $produtos = new produtosClass();
    $produtos->atualizarEstoque($produto_id, $estoque_atualizado);
}
function getEstoqueById($produto_id){
    require_once '../model/produtosClass.php';
    $produtos = new produtosClass();
    $estoque = $produtos->getEstoqueById($produto_id);
    return $estoque;
}


if($_POST){
    $precoTotalPedido = $_POST["precoTotalCarrinho"];
    $usuarioIDpedido = $_POST["usuarioID"];

    $produtoIDlist = $_POST["produtos"];
    $produtoQTDlist = $_POST["quantidades"];

    if(isset($precoTotalPedido, $usuarioIDpedido, $produtoIDlist, $produtoIDlist)){
        // if(!isset($endereco_de_destino, $forma_de_pagamento)){
        //     session_start();
        //     $_SESSION['payInfo'] = [];
        //     session_abort();
        //     header('location:../carrinho.php?cod=infoRequired');
        //     exit();
        // }
        require_once '../model/produtosClass.php';
        $podutos = new produtosClass();
        foreach($produtoIDlist as $index => $produto_id){
            $estoque_atual = getEstoqueById($produto_id);
            $estoque_atualizado = $estoque_atual - $produtoQTDlist[$index];
            atualizarEstoque($produto_id, $estoque_atualizado);
        }

        require_once '../model/pedidosClass.php';
        $pedido = new pedidosClass();
        $pedido->setClienteId($usuarioIDpedido);
        $pedido->setPrecoPedido($precoTotalPedido);
        $lastID = $pedido->insert();

        require_once '../model/produtosPedidosClass.php';
        $pedidoProduto = new produtosPedidosClass();
        $pedidoProduto->inserirCadaProduto($produtoIDlist, $produtoQTDlist, $lastID);
        $_SESSION['carrinho'] = null;
        header('location:../carrinho.php?cod=sucess');
    } else{
        header('location:../carrinho.php?cod=error');
    }
} else{
    header('location: ../carrinho.php?cod=gg');
}