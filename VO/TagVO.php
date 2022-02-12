<?php

class TagVO{
    private $idTag;
    private $nome;
    private $idUser;

    public function setidTag($idTag){
        $this->idTag = $idTag;
    }
    public function getidTag(){
        return $this->idTag;
    }

    public function setNomeTag($nome){
        $this->nome = trim($nome);
    }

    public function getNomeTag(){
        return $this->nome;
    }

    public function setIdUser($idUser){
        $this->idUser = trim($idUser);
    }
    public function getIdUser(){
        return $this->idUser;
    }

}