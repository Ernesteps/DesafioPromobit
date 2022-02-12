<?php

require_once 'produtoTagVO.php';

class ProdutoVO extends ProdutoTagVO{
    private $idProduto;
    private $nome;
    private $idUser;

    public function setidProduto($idProduto){
        $this->idProduto = $idProduto;
    }
    public function getidProduto(){
        return $this->idProduto;
    }

    public function setNomeProduto($nome){
        $this->nome = trim($nome);
    }

    public function getNomeProduto(){
        return $this->nome;
    }

    public function setIdUser($idUser){
        $this->idUser = trim($idUser);
    }
    public function getIdUser(){
        return $this->idUser;
    }

}