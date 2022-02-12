<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/DAO/ProdutoDAO.php';
require_once 'UtilCTRL.php';

class ProdutoCTRL
{

    public function InserirCadastroProdutoCTRL(ProdutoVO $vo)
    {
        if ($vo->getNomeProduto() == '') {
            return 0;
        }
        $dao = new ProdutoDAO();
        return $dao->InserirProdutoDAO($vo);
    }

    public function AlterarCadastroProdutoCTRL(ProdutoVO $vo)
    {
        if ($vo->getNomeProduto() == '') {
            return 0;
        }

        $dao = new ProdutoDAO();
        return $dao->AlterarProdutoDAO($vo);
    }

    public function ConsultarProdutoCTRL()
    {
        $dao = new ProdutoDAO();
        return $dao->ConsultarProdutoDAO();
    }

    public function ConsultarProdutoSeparadoCTRL()
    {
        $dao = new ProdutoDAO();
        return $dao->ConsultarProdutoSeparadoDAO();
    }

    public function ConsultarProdutoComTagsCTRL()
    {
        $dao = new ProdutoDAO();
        return $dao->ConsultarProdutoComTagsDAO();
    }

    public function DetalharProdutoCTRL($idProduto)
    {
        $dao = new ProdutoDAO();
        return $dao->DetalharProdutoDAO($idProduto);
    }

    public function ExcluirProdutoCTRL($idProduto)
    {
        $dao = new ProdutoDAO();
        return $dao->ExcluirProdutoDAO($idProduto);
    }

    public function AdicionarProdutoTagCTRL(ProdutoVO $vo)
    {
        $dao = new ProdutoDAO();
        return $dao->AdicionarProdutoTagDAO($vo);
    }

    public function RemoverItemTagCTRL(ProdutoVO $vo)
    {
        $dao = new ProdutoDAO();
        return $dao->RemoverItemTagDAO($vo);
    }

    public function ConsultarProdutoTagCTRL($idProduto)
    {
        $dao = new ProdutoDAO();
        return $dao->ConsultarProdutoTagDAO($idProduto);
    }

}
