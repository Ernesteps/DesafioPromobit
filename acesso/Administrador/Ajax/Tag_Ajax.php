<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/CTRL/TagCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/VO/TagVO.php';

$ctrl = new TagCTRL();

// if (
//     isset($_POST['nome_produto']) && isset($_POST['qtde_total_produto']) && isset($_POST['preco_venda_unit']) 
//     && isset($_POST['preco_compra_unit']) && $_POST['acao'] == 'I'
// ) {

//     $vo = new ProdutoVO();

//     $vo->setNomeProduto($_POST['desc_produto']);
//     $vo->setIdUser($_POST['qtde_total_produto']);

//     $ret = $ctrl->InserirCadastroProdutoCTRL($vo);
//     echo $ret;
//} else 
if (isset($_POST['id_tag']) && $_POST['acao'] == 'R') {

    $ID = $_POST['id_tag'];
    $ret = $ctrl->ExcluirTagCTRL($ID);
    echo $ret;
} 
// else if (
//     isset($_POST['cod_Produto']) && isset($_POST['desc_produto']) && isset($_POST['qtde_total_produto']) 
//     && isset($_POST['preco_venda_unit']) && isset($_POST['preco_compra_unit']) && $_POST['acao'] == 'A'
// ) {
//     $vo = new ProdutoVO();

//     $vo->setidProduto($_POST['cod_Produto']);
//     $vo->setNomeProduto($_POST['desc_produto']);

//     $ret = $ctrl->AlterarCadastroProdutoCTRL($vo);
//     echo $ret;
// }
