<?php
if($_POST){
    $precoTotalPedido = $_POST["precoTotalCarrinho"];
    $usuarioIDpedido = $_POST["usuarioID"];

    $produtoIDlist = $_POST["produtos"];
    $produtoQTDlist = $_POST["quantidades"];

    echo ('Preço total do pedido: R$'.$precoTotalPedido.'');
    echo '<br><br>';
    session_start();
    require_once 'clientesController.php';
    $nomeUsuario = loadNomeClienteInCarrinhoController($usuarioIDpedido);
    echo ('ID da sessão:'.$nomeUsuario.'');
    echo '<br><br>';
    

    echo 'Id list:';
    foreach($produtoIDlist as $produtoID){
        echo (' '.$produtoID.' ');
    }


    if(isset($precoTotalPedido, $usuarioIDpedido, $produtoIDlist, $produtoIDlist)){
        require_once '../model/pedidosClass.php';
        $pedido = new pedidosClass();
        $pedido->setClienteId($usuarioIDpedido);
        $pedido->setPrecoPedido($precoTotalPedido);
        $pedido->insert();

        echo '<br><br><br><br>';

        require_once '../model/produtosPedidosClass.php';
        $pedidoProduto = new produtosPedidosClass();
        // $pedidoProduto->setPedidoId();
        $pedidoProduto->inserirCadaProduto($produtoIDlist, $produtoQTDlist);

        $_SESSION['carrinho'] = [];
        //header('location:../carrinho.php?cod=sucess');
    } else{
        header('location:../carrinho.php?cod=error');
    }
} else{
    header('location: ../carrinho.php?cod=gg');
}