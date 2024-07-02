<?php
if($_POST){
    echo 'a';
    $status_pedido = $_POST['status_do_pedido'];
    if ($status_pedido == 'Em processamento'){
        $status_pedido = 'Enviado';
        echo 'b';
    } else if($status_pedido == 'Enviado'){
        $status_pedido = 'Entregue';
        echo 'c';
    }
    header('Location: gerenciarPedidos.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/registroADM.css">
    <title>Daundoys - Gerenciar produto</title>
</head>
<body>
    <h1 class="pgTitle">Gerir produtos</h1>
    <a href="index.php" class="backToThePage"><span class="material-symbols-outlined"> arrow_back </span></a>
    <div class="containerReg">
        <main class="gerenciarProduto">
            <form method="post" action="controller/produtosController.php" enctype="multipart/form-data">
                <?php
                session_start();
                if(!isset($_SESSION['admin'])){
                    header('location: index.php');
                    exit();
                }
                @$idProduto = $_REQUEST['id'];
                @$cod = $_REQUEST['cod'];
                if (isset($cod)){
                    if($cod == 'error'){
                        echo '<p class="error">Erro ao enviar produto</p>';
                    } else if($cod == 'sucess'){
                        echo '<p class="sucess">Peça enviada com sucesso</p>';
                    } else if($cod == 'edit'){
                        require_once 'controller/produtosController.php';
                    }
                }
                ?>
                
                <?php
                require_once 'controller/produtosController.php';
                if (!isset($idProduto)){
                    echo '<input type="hidden" name="action" value="insertProdutos">';
                } else{
                    echo '<input type="hidden" name="action" value="editProdutos">';
                    echo '<input type="hidden" name="idProduto" value="'.$idProduto.'">';
                    $produtoManager = loadAllById($idProduto);
                }
                
                
                
                ?>
                <div class="inputGroup">
                    <labeL for="nome">Nome da produto: </label>
                    <input type="text" name="nome" id="nome" value="<?php if(isset($idProduto)){ echo $produtoManager['nome'];} ?>" required placeholder="Insira o nome da produto">
                </div>

                <div class="inputGroup">
                    <labeL for="tipo">Tipo da produto: </label>
                    <input type="text" name="tipo" id="tipo" value="<?php if(isset($idProduto)){ echo $produtoManager['tipo'];} ?>" required placeholder="Insira o tipo da produto">
                </div>

                <div class="inputGroup">
                    <labeL for="estoque">Número em estoque da produto: </label>
                    <input type="number" name="estoque"  id="estoque" value="<?php if(isset($idProduto)){ echo $produtoManager['estoque_disponivel'];} ?>" required placeholder="Insira o número de estoque da produto">
                </div>

                <div class="inputGroup">
                    <labeL for="preco">Preco da produto: </label>
                    <input type="text" name="preco" id="preco" value="<?php if(isset($idProduto)){ echo $produtoManager['preco'];} ?>"  required placeholder="Insira o preco da produto">
                </div>
                <div class="inputGroup">
                    <labeL id="Ldesc" for="descricao">Descrição da produto: </label>
                    <textarea spellcheck="false" name="descricao" id="desc" required placeholder="Insira a descrição da produto"><?php if(isset($idProduto)){ echo $produtoManager['descricao'];} ?></textarea>
                </div>
                <input type="file" id="upload" name="upload" value="" required accept=".jpg, .jpeg, .png">
                <input type="submit" value="Enviar">
            </form>
            <div class="produtosManager">
                <table class="tableProdutos">
                    <thead>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Nº em estoque</th>
                        <th>Preço unitário</th>
                        <th>Editar produto</th>
                        <th>Deletar produto</th>
                    </thead>
                    <tbody>
                        <?php
                        $produtosList = loadAllGerenciamento();
                        foreach($produtosList as $produto){
                            echo '<tr>';
                            echo '<td id="idTable">';
                                echo $produto['produto_id'];
                            echo '</td>';
                            echo '<td id="imagemTable">';
                                echo '<img src="img/imgBanco/'.$produto['imagem'].'" alt="'.$produto['nome'].'"/>';
                            echo '</td>';
                            echo '<td id="nomeTable">';
                                echo $produto['nome'];
                            echo '</td>';
                            echo '<td id="tipoTable">';
                                echo $produto['tipo'];
                            echo '</td>';
                            
                            if ($produto['estoque_disponivel'] < 1){
                                echo '<td style="color: black" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            } else if ($produto['estoque_disponivel'] >= 1 and $produto['estoque_disponivel'] <= 15){
                                echo '<td style="color: red" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            } else if ($produto['estoque_disponivel'] > 15 and $produto['estoque_disponivel'] <= 30){
                                echo '<td style="color: orange" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            } else if ($produto['estoque_disponivel'] > 30 and $produto['estoque_disponivel'] <= 45){
                                echo '<td style="color: yellow" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            } else if ($produto['estoque_disponivel'] > 45 and $produto['estoque_disponivel'] <= 60){
                                echo '<td style="color: lime" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            } else if ($produto['estoque_disponivel'] > 60){
                                echo '<td style="color: green" id="estoque_disponivelTable">';
                                    echo $produto['estoque_disponivel'];
                                echo '</td>';
                            }

                            echo '<td id="precoTable">';
                                echo 'R$'.number_format($produto['preco'], 2, ',', '.').'';
                            echo '</td>';
                            echo '<td id="editProduto">';
                                echo '<a href="registrarProduto.php?id='.$produto['produto_id'].'">Editar produto</a>';
                            echo '</td>';
                            echo '<td id="deleteProduto">';
                                echo '<form action="controller/produtosController.php" method="post">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="produto_id" value="'.$produto['produto_id'].'">
                                    <button type="submit">Deletar produto</button>
                                </form>';
                            echo '</td>';
                        echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>