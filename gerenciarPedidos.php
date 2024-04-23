<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/registroADM.css">
    <title>Daundoys - Gerenciar pedidos</title>
</head>
<body style="overflow-x: hidden; overflow-y: auto;">
    <a href="index.php" class="backToThePage"><span class="material-symbols-outlined"> arrow_back </span></a>
    <main class="gerenciarPedidos">
        <h1 class="pgTitle">Gerir pedidos efetuados</h1>
        <div class="pedidosContainer">
            <table class="pedidosTable">
                <thead>
                    <th>ID</th>
                    <th>Email do comprador</th>
                    <th>Preço total</th>
                    <th>Data e hora efetuda</th>
                    <th>Status</th>
                    <th>Produtos</th>
                </thead>
                <tbody>
                    <?php
                    require_once 'controller/clientesController.php';
                    
                    require_once 'controller/pedidosController.php';
                    $pedidosList = loadAll();
                    
                    foreach ($pedidosList as $pedidos) {
                        echo '<tr>';
                            echo '<td id="idTable">';
                                echo $pedidos['pedido_id'];
                            echo '</td>';
                            echo '<td id="emailTable">';
                                echo getEmailByID($pedidos['cliente_id']);
                            echo '</td>';
                            echo '<td style="min-width: 130px" id="precoTotalTable">';
                                echo 'R$'.number_format($pedidos['preco_pedido'], 2, ',', '.').'';
                            echo '</td>';
                            echo '<td style="min-width: 150px" id="dataTable">';
                                $data = new DateTime($pedidos['data_pedido']);
                                echo $data->format('d/m/Y H:i:s');
                            echo '</td>';
                            echo '<td style="width: 100px" id="statusTable">';
                                echo '<form action="controller/pedidosController.php" method="post">';
                                    echo '<input type="hidden" name="status_do_pedido" value="'.$pedidos['status_pedido'].'">';
                                    echo '<input type="hidden" name="ID_do_pedido" value="'.$pedidos['pedido_id'].'">';
                                    echo '<input type="hidden" name="action" value="updateStatus">';
                                    echo '<button class="'.$pedidos['status_pedido'].'" type="submit">'.$pedidos['status_pedido'].'</button>';
                                echo '</form>';
                            echo '</td>';
                            echo '<td style="width: 140px" id="produtosTable">';
                                echo '<button onclick="verProdutos('.$pedidos['pedido_id'].', this);">Ver produtos</button>';
                                echo '<div class="produtosDoPedido" id="'.$pedidos['pedido_id'].'">';
                                    echo '<table class="produtosInPedidoTable">';
                                        echo '<thead>';
                                            echo '<th>ID do pedido</th>';
                                            echo '<th>ID do produto</th>';
                                            echo '<th>Nome do produto</th>';
                                            echo '<th>Quantidade pedida</th>';
                                            echo '<th>Preço do produto</th>';
                                            echo '<th>Preco * Quantidade</th>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                            $produtos_pedidosList = printByPedidoId($pedidos['pedido_id']);
                                            foreach($produtos_pedidosList as $produtoUni){
                                                echo '<tr>';
                                                    echo '<td style="width: 50px" id="pedidoIdTble">';
                                                        echo $produtoUni['pedido_id'];
                                                    echo '</td>';
                                                    echo '<td style="width: 50px" id="produtoIdTable">';
                                                        echo $produtoUni['produto_id'];
                                                    echo '</td>';
                                                    echo '<td style="width: 70px" id="nomeProdTable">';
                                                        echo getNameByProdutoId($produtoUni['produto_id']);
                                                    echo '</td>';
                                                    echo '<td style="width: 40px" id="quantidadeTable">';
                                                        echo $produtoUni['quantidade'];
                                                    echo '</td>';
                                                    echo '<td style="width: 70px" id="precoUniTable">';
                                                        echo 'R$'.number_format(getPrecoByProdutoId($produtoUni['produto_id']), 2, ',', '.').'';
                                                    echo '</td>';
                                                    echo '<td style="width: 70px" id="precoGeralTable">';
                                                    echo 'R$'.number_format((getPrecoByProdutoId($produtoUni['produto_id'])*$produtoUni['quantidade']), 2, ',', '.').'';
                                                    echo '</td>';
                                                echo '</tr>';
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                echo '</div>';
                            echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer></footer>
    <script>


function verProdutos(idSelecionado, button) {
    var elemento = document.getElementById(idSelecionado);
    var estiloDisplay = window.getComputedStyle(elemento).getPropertyValue('display');
    
    if (estiloDisplay === 'none') {
        elemento.style.display = 'flex';
        button.style.backgroundColor = 'green';
        button.style.color = 'white';
        
    } else if (estiloDisplay === 'flex') {
        elemento.style.display = 'none';
        button.style.backgroundColor = 'white';
        button.style.color = 'green';
    }
}

    </script>
</body>
</html>