<?php
require_once 'conexao.php';
class produtosClass{
    protected $id;
    protected $nome;
    protected $imagem;
    protected $desc;
    protected $tipo;
    protected $preco;
    protected $estoque;


    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getImagem() {
        return $this->imagem;
    }
    public function getDesc() {
        return $this->desc;
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function getPreco() {
        return $this->preco;
    }
    public function getEstoque() {
        return $this->estoque;
    }
    
    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setImagem($imagem): void {
        $this->imagem = $imagem;
    }

    public function setDesc($desc): void {
        $this->desc = $desc;
    }
    public function setTipo($tipo):void{
        $this->tipo = $tipo;
    }
    public function setPreco($preco):void{
        $this->preco = $preco;
    }
    public function setEstoque($estoque):void{
        $this->estoque = $estoque;
    }

    public function loadAllCatalogo() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM produtos where estoque_disponivel>0';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }
    public function searchCatalogo($search) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM produtos where estoque_disponivel>0 and nome like "%'.$search.'%"';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }
    public function loadAllGerenciamento() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT * FROM produtos';
        $resultList = $db->Consultar($sql);
        $db->Desconectar();
        return $resultList;
    }
    public function atualizarEstoque($produto_id, $estoque_atualizado){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'UPDATE produtos SET estoque_disponivel="'.$estoque_atualizado.'" where produto_id="'.$produto_id.'"';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }
    public function updateProduto($produto_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        echo 'a';
        $sql = 'UPDATE produtos SET nome="'.$this->nome.'", descricao="'.$this->desc.'", preco="'.$this->preco.'", estoque_disponivel="'.$this->estoque.'", imagem="'.$this->imagem.'", tipo="'.$this->tipo.'" where produto_id="'.$produto_id.'"';
        $db->Executar($sql);
        $db->Desconectar();
        return $db->total;
    }

    public function getEstoqueById($produto_id) {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'SELECT estoque_disponivel FROM produtos where produto_id="'.$produto_id.'"';
        $result = $db->Consultar($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $estoque = $row['estoque_disponivel'];
        } else {
            $estoque = null;
        }
        $db->Desconectar();
        return $estoque;
    }

    public function produtoDelete($produto_id){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'DELETE FROM produtos WHERE produto_id="'.$produto_id.'"';
        $db->Executar($sql);
        $db->Desconectar();
        echo $sql;
        return $db->total;
    }
    
    public function insert() {
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO produtos (nome, descricao, preco, estoque_disponivel, imagem, tipo) VALUES ("'.$this->nome.'","'.$this->desc.'","'.$this->preco.'","'.$this->estoque.'","'.$this->imagem.'","'.$this->tipo.'");';
        $db->Executar($sql);
        $db->Desconectar();

        return $db->total;
    }
}
