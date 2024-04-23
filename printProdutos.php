<?php
function printar($produto){
    echo '<div class="produtoContainer">';
        echo '<div class="sobreporProduto">';
            echo '<form method="post" action="carrinho.php" class="footerSobrepor">';
                echo '<input type="hidden" name="idProduto[]" value="'.$produto['produto_id'].'">';
                echo '<input type="hidden" name="nomeProduto[]" value="'.$produto['nome'].'">';
                echo '<input type="hidden" name="precoProduto[]" value="'.$produto['preco'].'">';
                echo '<input type="hidden" name="imagemProduto[]" value="'.$produto['imagem'].'">';
                echo '<input type="hidden" name="estoqueProduto[]" value="'.$produto['estoque_disponivel'].'">';
            
                echo '<input type="number" class="estoqueInput" name="qntRequerida[]" min="1" max="'.$produto['estoque_disponivel'].'" value="1"/>';
                if(isset($_SESSION['login']) or isset($_SESSION['admin'])){
                    echo '<button>Comprar agora</button></a>';
                } else {
                    echo '<a class="fakebtn" href="login.php?cod=173">Comprar agora</a>';                }
            echo'</form>';
        echo'</div>';
        echo '<div class="imgProduto">';
            echo '<img src="img/imgBanco/'.$produto['imagem'].'" alt="'.$produto['nome'].'"/>';
        echo '</div>';
        echo '<p class="nomeProduto">'.$produto['nome'].'</p>';
        echo '<p class="precoProduto">R$'.$produto['preco'].'</p>';
        echo '<p class="descProduto">'.$produto['descricao'].'</p>';
    echo '</div>';
}

