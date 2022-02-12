<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/DAO/TagDAO.php';
require_once 'UtilCTRL.php';

class TagCTRL
{

    public function InserirCadastroTagCTRL(TagVO $vo)
    {
        if ($vo->getNomeTag() == '') {
            return 0;
        }
        $dao = new TagDAO();
        return $dao->InserirTagDAO($vo);
    }

    public function AlterarCadastroTagCTRL(TagVO $vo)
    {
        if ($vo->getNomeTag() == '') {
            return 0;
        }

        $dao = new TagDAO();
        return $dao->AlterarTagDAO($vo);
    }

    public function ConsultarTagCTRL()
    {
        $dao = new TagDAO();
        return $dao->ConsultarTagDAO();
    }

    public function DetalharTagCTRL($idTag)
    {
        $dao = new TagDAO();
        return $dao->DetalharTagDAO($idTag);
    }

    public function ExcluirTagCTRL($idTag)
    {
        $dao = new TagDAO();
        return $dao->ExcluirTagDAO($idTag);
    }

    public function ConsultarTagFiltradoCTRL($idProduto)
    {
        $dao = new TagDAO();
        return $dao->ConsultarTagFiltradoDAO($idProduto);
    }

    public function ConsultarDetalheTagProdutoCTRL($idTag)
    {
        $dao = new TagDAO();
        return $dao->ConsultarDetalheTagProdutoDAO($idTag);
    }
}
