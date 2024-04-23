<?php
    @$type = $_REQUEST['type'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="https://images.vexels.com/media/users/3/286649/isolated/preview/31bd1b279101d861b2be48dc66d46d52-a-cone-de-chapa-u-de-duende-de-sa-o-patra-cio.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <?php 

if($type == ''){
    echo ("<title>Daundoys - Catálogo</title>");
    echo ("<style>.navItem:nth-child(1) a{background-color: darkgreen; color: white;}</style>");
    } else if($type == 'piteiras_e_filtros'){
        echo ("<title>Daundoys - Piteiras e filtros</title>");
        echo ("<style>.navItem:nth-child(2) a{background-color: darkgreen; color: white;}</style>");
    } else if($type == 'sedas_e_blunts'){
        echo ("<title>Daundoys - Sedas e blunts</title>");
        echo ("<style>.navItem:nth-child(3) a{background-color: darkgreen; color: white;}</style>");
    } else if($type == 'to_smoke'){
        echo ("<title>Daundoys - To smoke</title>");
        echo ("<style>.navItem:nth-child(4) a{background-color: darkgreen; color: white;}</style>");
    } else if($type == 'acessorios'){
        echo ("<title>Daundoys - Acessórios</title>");
        echo ("<style>.navItem:nth-child(5) a{background-color: darkgreen; color: white;}</style>");
    } else if($type == 'outros'){
        echo ("<title>Daundoys - Outros</title>");
        echo ("<style>.navItem:nth-child(6) a{background-color: darkgreen; color: white;}</style>");
    } else{
        header('location: index.php');
    }
    ?>
</head>
<body>
    <?php
    require_once 'shared/header.php';
    ?>
    
    <main class="catalogoBody">
        <div class="produtosList">
            <?php
            require_once 'controller/produtosController.php';
            $produtosList = loadAllCatalogo();

            foreach ($produtosList as $produto){
                if($type == 'sedas_e_blunts'){
                    if($produto['tipo'] == 'seda' || $produto['tipo'] == 'blunt'){
                        require_once 'printProdutos.php';
                        printar($produto);
                    }
                } else if($type == 'piteiras_e_filtros'){
                    if($produto['tipo'] == 'piteira' || $produto['tipo'] == 'piteira de vidro' || $produto['tipo'] == 'limpador de piteira'){
                        require_once 'printProdutos.php';
                        printar($produto);
                    }
                } else if($type == 'to_smoke'){
                    if($produto['tipo'] == 'charuto' || $produto['tipo'] == 'kambaya'){
                        require_once 'printProdutos.php';
                        printar($produto);
                    }
                } else if($type == 'acessorios'){
                    if($produto['tipo'] == 'dichavador' || $produto['tipo'] == 'isqueiro'){
                        require_once 'printProdutos.php';
                        printar($produto);
                    }
                } else if(!isset($type)){
                    require_once 'printProdutos.php';
                    printar($produto);
                } else if ($type == 'outros'){
                    if (!in_array($produto['tipo'], ['seda', 'blunt', 'piteira', 'piteira de vidro', 'limpador de piteira', 'charuto', 'kambaya', 'dichavador', 'isqueiro'])){
                        require_once 'printProdutos.php';
                        printar($produto);
                    }
                }
            }
            @$cod = $_REQUEST['cod'];
            if(isset($_SESSION['admin'])){
                if(loadFunction($_SESSION['admin']) === 'Dono' or loadFunction($_SESSION['admin']) === 'Repositor de produtos'){
                    echo '<a href="registrarProduto.php" class="produtoContainer addProduto">';
                        echo '<div class="plusContainer">';
                            echo '<span class="material-symbols-outlined">add_circle</span>';
                            echo '<p>Adicionar novo produto</p>';
                        echo '</div>';
                    echo '</a>';
                }
            }
            ?>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>