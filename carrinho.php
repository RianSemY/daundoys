<?php
session_start();

// Verificar se a sessão do carrinho existe e, se não, criá-la
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Processar a solicitação de remoção de um item do carrinho
if ($_POST && isset($_POST['action']) && $_POST['action'] === 'removeItem') {
    // Verificar se o produto a ser removido está presente no carrinho
    if (isset($_POST['produto_id'])) {
        $produtoId = $_POST['produto_id'];
        
        // Percorrer o carrinho e remover o item com o ID especificado
        foreach ($_SESSION['carrinho'] as $indice => $produto) {
            if ($produto['id'] == $produtoId) {
                unset($_SESSION['carrinho'][$indice]);
                break;
            }
        }
    }
}

if ($_POST && isset($_POST['action']) && $_POST['action'] === 'updateQuantity') {
    // Verificar se todos os parâmetros necessários estão presentes na solicitação
    if (isset($_POST['produto_id'], $_POST['nova_quantidade'])) {
        $produtoId = $_POST['produto_id'];
        $novaQuantidade = $_POST['nova_quantidade'];

        // Verificar se a nova quantidade é maior que 0
        if ($novaQuantidade > 0) {
            // Atualizar a quantidade do produto no carrinho
            foreach ($_SESSION['carrinho'] as &$produto) {
                if ($produto['id'] == $produtoId) {
                    $produto['qntRequerida'] = $novaQuantidade;
                    
                }
            }
        } else {
            // Remover o item do carrinho se a nova quantidade for menor ou igual a 0
            foreach ($_SESSION['carrinho'] as $chave => $produto) {
                if ($produto['id'] == $produtoId) {
                    unset($_SESSION['carrinho'][$chave]);
                    
                }
            }
        }
        // Redirecionar de volta para a página do carrinho
        header("Location: carrinho.php");
        exit;
    }
}

// Calcular o preço total do carrinho
$precoTotalCarrinho = 0;
foreach ($_SESSION['carrinho'] as $produto) {
    $precoTotalCarrinho += $produto['qntRequerida'] * $produto['preco'];
}


// Processar a solicitação de adicionar produtos ao carrinho
if ($_POST && isset($_SESSION['login']) && isset($_POST['idProduto']) && isset($_POST['nomeProduto']) && isset($_POST['precoProduto']) && isset($_POST['qntRequerida'])) {
    $carrinhoIdProdutos = $_POST["idProduto"];
    $carrinhoNomeProdutos = $_POST["nomeProduto"];
    $carrinhoPrecoProdutos = $_POST["precoProduto"];
    $carrinhoImagemProdutos = $_POST["imagemProduto"];
    $carrinhoQntRequerida = $_POST["qntRequerida"];
    for ($i = 0; $i < count($carrinhoIdProdutos); $i++) {
        $produto = [
            'id' => $carrinhoIdProdutos[$i],
            'nome' => $carrinhoNomeProdutos[$i],
            'preco' => $carrinhoPrecoProdutos[$i],
            'imagem' => $carrinhoImagemProdutos[$i],
            'qntRequerida' => $carrinhoQntRequerida[$i]
        ];

        $produtoNoCarrinho = false;
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $produto['id']) {
                $item['qntRequerida'] += $produto['qntRequerida'];
                $produtoNoCarrinho = true;
                break;
            }
        }
        if (!$produtoNoCarrinho) {
            $_SESSION['carrinho'][] = $produto;
        }
    }
    header("Location: carrinho.php");
    exit;
}

// Calcular o preço total do carrinho
$precoTotalCarrinho = 0;
foreach ($_SESSION['carrinho'] as $produto) {
    $precoTotalCarrinho += $produto['qntRequerida'] * $produto['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Daundoys</title>
    <link rel="stylesheet" href="css/style-carrinho.css">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <main>
        <a href="index.php" class="backToThePage"><span class="material-symbols-outlined"> arrow_back </span></a>
        <div class="carrinhoContainer">
            <?php
            if(empty($_SESSION['carrinho'])){
                echo '<div class="carroVazio">';
                    echo '<div>';
                        echo '<img src="img/carrinhoVazio.png" alt="carrinhoVazio"/>';
                        echo '<p>Seu carrinho está vazio!</p>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
            <div class="carrinhoContainerList">
                <?php 
                if(!empty($_SESSION['carrinho'])){
                    foreach ($_SESSION['carrinho'] as $produto) {
                        echo '<div class="produtoCarrinho">';
                            echo '<div class="imgContainer"><img src="img/imgBanco/' . $produto['imagem'] . '" alt="' . $produto['nome'] . '"/></div>';
                            echo '<div class="infoProdutoCarrinho">';
                                echo '<div class="textprodutoCarrinho">';
                                    echo '<p class="nomeCarrinho">' . $produto['nome'] . '</p>';
                                    echo '<form class="qntEditor" action="carrinho.php" method="post">';
                                        echo '<input type="hidden" name="action" value="updateQuantity">';
                                        echo '<input type="hidden" name="produto_id" value="'.$produto['id'].'">';
                                        //echo '<p class="qntLabel">Quantidade:</p>';
                                        echo '<button class="qntBtn quantDown" type="submit" name="nova_quantidade" value="'.$produto['qntRequerida'] - 1 .'">-</button>';
                                        echo '<p class="qntBtn viewQnt">'. $produto['qntRequerida'] .'</p>';
                                        echo '<button class="qntBtn quantUp" type="submit" name="nova_quantidade" value="'.$produto['qntRequerida'] + 1 .'">+</button>';
                                    echo '</form>';
                                    echo '<p class="precoCarrinho">Preço (unidade): R$'.number_format($produto['preco'], 2, ',', '.').'</p>';

                                $precoTotalProduto = $produto['qntRequerida'] * $produto['preco'];
                                echo '<p class="precoTotalProduto">Preço a ser pago: R$'.number_format($precoTotalProduto, 2, ',', '.').'</p>';
                                echo '<form class="containerRemove" action="carrinho.php" method="post">';
                                        echo '<input type="hidden" name="action" value="removeItem">';
                                        echo '<input type="hidden" name="produto_id" value="'.$produto['id'].'">';
                                        echo '<button type="submit"><span class="material-symbols-outlined">delete</span></button>';
                                    echo '</form>'; 
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="inFooter">
            <?php
            echo '<p class="precoTotalProdutos">Preço total do carrinho:'; 
            echo '<strong>R$'.number_format($precoTotalCarrinho, 2, ',', '.').'</strong>';
            echo '</p>';
            ?>
            <button type="submit">Comprar</button>
        </div>
    </footer>
</body>
</html>
