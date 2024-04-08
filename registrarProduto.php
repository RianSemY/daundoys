<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="containerReg">
        <?php
        @$cod = $_REQUEST['cod'];
        if (isset($cod)){
            if($cod == 'error'){
                echo '<p class="error">Erro ao enviar peça</p>';
            } else if($cod == 'sucess'){
                echo '<p class="sucess">Peça enviada com sucesso</p>';
            } else if($cod == 'edit'){
                require_once 'controller/produtosController.php';       
            }
        }
        
        ?>
        <a href="index.php">🠔</a>
        <p>Inserir  peça: </p>
        <form method="post" action="controller/produtosController.php" enctype="multipart/form-data">
            <div class="formControl">
                <span class="material-symbols-outlined">badge</span>
                <labeL for="nome">Nome da peça: </label>
                <input type="text" name="nome" id="nome" value="" value="" required placeholder="Insira o nome da peça">
            </div>

            <div class="formControl">
                <span class="material-symbols-outlined">format_list_bulleted</span>
                <labeL for="tipo">Tipo da peça: </label>
                <input type="text" name="tipo" id="tipo" value="" required placeholder="Insira o tipo da peça">
            </div>

            <div class="formControl">
                <span class="material-symbols-outlined">inventory_2</span>
                <labeL for="estoque">Número de estoque da peça: </label>
                <input type="number" name="estoque" id="estoque" value="" required placeholder="Insira o número de estoque da peça">
            </div>

            <div class="formControl">
                <span class="material-symbols-outlined">credit_card</span>
                <labeL for="preco">Preco da peça: </label>
                <input type="text" name="preco" id="preco" value="" required placeholder="Insira o preco da peça">
            </div>
            
            <labeL id="Ldesc" for="descricao">Descrição da peça: </label>
            <textarea spellcheck="false" name="descricao" id="desc" value="" required placeholder="Insira a descrição da peça"></textarea>
            
            <input type="file" id="upload" name="upload" value="" required accept=".jpg, .jpeg, .png">
            
        <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>