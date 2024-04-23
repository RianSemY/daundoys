<?php
// function loadAllCatalogo(){
//     require_once './model/produtosClass.php';
//     $produtos = new produtosClass();
//     $produtosList = $produtos->loadAllCatalogo();
//     return $produtosList;
// }

function loadAllGerenciamento(){
    require_once './model/produtosClass.php';
    $produtos = new produtosClass();
    $produtosList = $produtos->loadAllGerenciamento();
    return $produtosList;
}
function loadAllCatalogo(){
    require_once './model/produtosClass.php';
    $produtos = new produtosClass();
    $produtosList = $produtos->loadAllCatalogo();
    return $produtosList;
}

function produtoDelete($produto_id){
    require_once '../model/produtosClass.php';
    $produtos = new produtosClass();
    $produtos->produtoDelete($produto_id);
}

if ($_POST and $_POST['action'] == 'delete'){
    $produto_id = $_POST['produto_id'];
    produtoDelete($produto_id);
    header('location: ../registrarProduto.php?cod=sucess');
}

if ($_POST and $_POST['action'] == 'insertProdutos') {
    if(isset($_FILES['upload'])){
        $arquivo = $_FILES['upload'];
        if($arquivo['error']){
            header('location: registrarProduto.php?cod=error');
            exit;
        }
        $pasta = "../img/imgBanco/";
        $nomeArquivo = $arquivo['name'];
    
        $tipo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    
        $tipos_permitidos = array("jpg", "png", "jpeg");
        if (!in_array($tipo, $tipos_permitidos)) {
            header('location: ../registrarProduto.php?cod=error');
            exit;
        }

        $caminhoImagem = $pasta . $nomeArquivo . "." . $tipo;
        move_uploaded_file($arquivo['tmp_name'], $caminhoImagem);
    }


    @$imagem = $_FILES["upload"]["name"];
    @$nome = $_POST['nome'];
    @$desc = $_POST['descricao'];
    @$tipo = $_POST['tipo'];
    @$preco = $_POST['preco'];
    @$estoque = $_POST['estoque'];
    
    if (isset($nome) and isset($desc) and isset($imagem)) {
        require_once '../model/produtosClass.php';
        $produto = new produtosClass();
        $produto->setImagem($imagem);
        $produto->setNome($nome);
        $produto->setDesc($desc);
        $produto->setPreco($preco);
        $produto->setTipo($tipo);
        $produto->setEstoque($estoque);
        
        $produto->insert();
        header('location:../registrarProduto.php?cod=sucess');
    } else{
        header('location:../registrarProduto.php?cod=error');
    }
} else {
    // loadAllCatalogo();
}
