<?php
require_once 'conexao.php';

class produtosPedidosClass{
    private $itemInPedido_id;
    private $pedido_id;
    private $produto_id;
    private $quantidade;

    public function __construct() {
        
    }
    // Getters
    public function getItemInPedidoId() {
        return $this->itemInPedido_id;
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
    public function setItemInPedidoId($itemInPedido_id) {
        $this->itemInPedido_id = $itemInPedido_id;
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

    
    public function inserirCadaProduto($produtoIDlist, $produtoQTDlist, $produto_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        for ($i = 0; $i < count($produtoIDlist); $i++) {
            
            $sql = 'INSERT INTO itensPedido (pedido_id, produto_id, quantidade) values ("'.$produto_id.'", "'.$produtoIDlist[$i].'", "'.$produtoQTDlist[$i].'");';
            $db->Executar($sql);
        }
        $db->Desconectar();
        return $db->total;
    }

    public function printByPedidoId($pedido_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * from itensPedido where pedido_id="'.$pedido_id.'"';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }

    public function getNameByProdutoId($pedido_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT nome FROM produtos where produto_id = '$pedido_id'";
        $result = $db->Consultar($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
        } else {
            $nome = null;
        }
        $db->Desconectar();
        return $nome;
    }
    public function getPrecoByProdutoId($pedido_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT preco FROM produtos where produto_id = '$pedido_id'";
        $result = $db->Consultar($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $preco = $row['preco'];
        } else {
            $preco = null;
        }
        $db->Desconectar();
        return $preco;
    }
    
}