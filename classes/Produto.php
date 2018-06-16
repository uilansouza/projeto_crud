<?php

class Produto
{   //Propriedade
    public $id;
    private $nome;
    public $preco;
    public $quant;
    public $categoria;
    public $minEstoque = 50;

    //Metodos

    private function formataMoeda($valor){
    return "R$".number_format($valor,2,",",".");

    

    }

    public function setNome($nome){
        $this->nome = $nome;
    }


    public function getNome(){
        return $this->nome;
    }

    public function getPreco(){
        return $this->formataMoeda($this->preco);
    }
    
    public function  total(){
        return  $this->formataMoeda($this->preco * $this->quant);

        
    }

    public function estoque(){

        return ($this->quant < $this->minEstoque)?'<center> <spam  class= "badge badge-danger" role="alert" >BAIXO</spam></center>':'<center><spam class= "badge badge-info"" >NORMAL</spam><center>';

        
    }
}


?>