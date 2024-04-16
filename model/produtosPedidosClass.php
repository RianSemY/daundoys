<?php
require_once 'conexao.php';

class produtosPedidosClass{
    private $item_id;
    private $pedido_id;
    private $produto_id;
    private $quantidade;

    public function __construct() {
        
    }
    // Getters
    public function getItemId() {
        return $this->item_id;
    }

    public function getPedidoId() {
        return $this->pedido_id;
    }

    public function getProdutoId() {
        return $this->produto_id;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }


    // Setters
    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    public function setPedidoId($pedido_id) {
        $this->pedido_id = $pedido_id;
    }

    public function setProdutoId($produto_id) {
        $this->produto_id = $produto_id;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    
    public function inserirCadaProduto($produtoIDlist, $produtoQTDlist){
        $db = new ConexaoMysql();
        $db->Conectar();
    
        // Iterar sobre as listas de produtos e quantidades
        for ($i = 0; $i < count($produtoIDlist); $i++) {
            // Inserir cada par de produto e quantidade no banco de dados
            $sql = 'INSERT INTO itensPedido (pedido_id, produto_id, quantidade) values (404, "'.$produtoIDlist[$i].'", "'.$produtoQTDlist[$i].'")';
            $db->Executar($sql);
        }
    
        $db->Desconectar();
        return $db->total;
    }
    
}