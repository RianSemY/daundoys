<?php
function loadAll(){
    require_once './model/produtosClass.php';
    $produtos = new produtosClass();
    $produtosList = $produtos->loadAll();
    return $produtosList;
}

if ($_POST) {
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
            // Tipo de arquivo não permitido
            header('location: registrarProduto.php?cod=error');
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
    echo $imagem;
    echo $nome;
    echo $desc;
    
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
}
else if ($_REQUEST) {
    if (isset($_REQUEST['cod']) && $_REQUEST['cod'] == 'del') {
        require_once '../model/model/produtosClass.php.php';
        $produto = new produtosClass(); 
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
            $produto->setId($_REQUEST['id']);
            $total = $produto->delete();
            if ($total == 1) {
                header('location:../index.php?cod=success');
            }
        }
    }
} else {
    loadAll();
}
