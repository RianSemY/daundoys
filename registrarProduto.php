<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/registroADM.css">
    <title>Daundoys - Registrar produto</title>
</head>
<body>
    <div class="containerReg">
        <?php
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
        <main class="registrarProduto">
            <a href="index.php" class="backToThePage"><span class="material-symbols-outlined"> arrow_back </span></a>
            <form method="post" action="controller/produtosController.php" enctype="multipart/form-data">
                <div class="formControl">
                    <span class="material-symbols-outlined">badge</span>
                    <labeL for="nome">Nome da produto: </label>
                    <input type="text" name="nome" id="nome" value="" value="" required placeholder="Insira o nome da produto">
                </div>

                <div class="formControl">
                    <span class="material-symbols-outlined">format_list_bulleted</span>
                    <labeL for="tipo">Tipo da produto: </label>
                    <input type="text" name="tipo" id="tipo" value="" required placeholder="Insira o tipo da produto">
                </div>

                <div class="formControl">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <labeL for="estoque">Número de estoque da produto: </label>
                    <input type="number" name="estoque"  id="estoque" value="" required placeholder="Insira o número de estoque da produto">
                </div>

                <div class="formControl">
                    <span class="material-symbols-outlined">credit_card</span>
                    <labeL for="preco">Preco da produto: </label>
                    <input type="text" name="preco" id="preco" value=""  required placeholder="Insira o preco da produto">
                </div>
                <div class="formControl">
                    <labeL id="Ldesc" for="descricao">Descrição da produto: </label>
                    <textarea spellcheck="false" name="descricao" id="desc" value="" required placeholder="Insira a descrição da produto"></textarea>
                </div>
                <input type="file" id="upload" name="upload" value="" required accept=".jpg, .jpeg, .png">
                <input type="submit" value="Enviar">
            </form>
            <div class="produtosManager">
                <div class="ProdutosList"></div>
            </div>
        </main>
    </div>
</body>
</html>