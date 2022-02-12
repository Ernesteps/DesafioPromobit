<?php

class ProdutoTagVO{
    private $idProduto;
    private $idTag;

    public function setIdProduto($idProduto){
        $this->idProduto = trim($idProduto);
    }
    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setIdTag($idTag){
        $this->idTag = trim($idTag);
    }
    public function getIdTag(){
        return $this->idTag;
    }

}