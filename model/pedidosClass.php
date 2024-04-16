<?php
require_once 'conexao.php';
class pedidosClass{
    private $pedido_id;
    private $cliente_id;
    private $data_pedido;
    private $status_pedido;
    private $preco_pedido;

    public function __construct() {
        
    }

    // Getters e Setters
    public function getPedidoId() {
        return $this->pedido_id;
    }

    public function setPedidoId($pedido_id) {
        $this->pedido_id = $pedido_id;
    }

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getDataPedido() {
        return $this->data_pedido;
    }

    public function setDataPedido($data_pedido) {
        $this->data_pedido = $data_pedido;
    }

    public function getStatusPedido() {
        return $this->status_pedido;
    }

    public function setStatusPedido($status_pedido) {
        $this->status_pedido = $status_pedido;
    }
    public function getPrecoPedido() {
        return $this->preco_pedido;
    }

    public function setPrecoPedido($preco_pedido) {
        $this->preco_pedido = $preco_pedido;
    }


    public function insert(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO pedidos (cliente_id, preco_pedido, status_pedido) values ("'.$this->cliente_id.'", "'.$this->preco_pedido.'", "Em processamento");';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }
    
}


