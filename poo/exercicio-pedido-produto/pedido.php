<?php
include_once 'produto.php';
include_once 'pessoa.php';

class Pedido{
    private $data;
    private $total;
    private $pessoa;
    private $produtos;
    private $idCompra;
    private static $contador = 0;
    private $totalDeComprasEfetuadas;
    private static $contador2 = 0;
    
    function __construct($data, $total, $pessoa) {
        $this->data = $data;
        $this->total = $total;
        $this->pessoa = $pessoa;
        $this->idCompra = self::$contador;
        self::$contador = self::$contador + 1;
        $this->totalDeComprasEfetuadas = self::$contador2;
    }

    function getData() {
        return $this->data;
    }

    function getTotal() {
        return $this->total;
    }

    function getIdCompra() {
        return $this->idCompra;
    }

    function getTotalDeComprasEfetuadas() {
        return $this->totalDeComprasEfetuadas;
    }

    function getPessoa() {
        return $this->pessoa;
    }

    function getProdutos() {
        return $this->produtos;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setIdCompra($idCompra) {
        $this->idCompra = $idCompra;
    }

    function setTotalDeComprasEfetuadas($totalDeComprasEfetuadas) {
        $this->totalDeComprasEfetuadas = $totalDeComprasEfetuadas;
    }

    function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
    }

    function setProdutos($produtos) {
        $this->produtos = $produtos;
    }


    function inserirProduto($produto){
        $this->produtos[] = $produto;
		self::$contador2 = self::$contador2 + 1;
    }
    
    function listarProdutos(){
        foreach($this->produtos as $c){
        echo "preço: " .$c->getPreco() .'<br>';
        echo "codigo: " .$c->getCodigo() .'<br>';
            }
        }
    
    
    function retirarProdutos($produto){
        //foreach
    }
    
    function fecharCompra(){
        foreach($this->produtos as $c){
			$this->total += $c->getPreco();
		}
		echo "total : R$" . $this->total .'<br>';
        echo "compra finalizada." .'<br>';
    }
    
    function totalVendasEfetuadas(){
     //   $this->totalDeComprasEfetuadas = $this->idCompra;
        echo "total de compras: " .$this->totalDeComprasEfetuadas .'<br>';
    }
}
?>


