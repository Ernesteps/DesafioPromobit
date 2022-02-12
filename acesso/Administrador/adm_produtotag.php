<?php

require_once '../../VO/ProdutoVO.php';
require_once '../../VO/TagVO.php';

require_once '../../CTRL/ProdutoCTRL.php';
require_once '../../CTRL/TagCTRL.php';
require_once '../../CTRL/UtilCTRL.php';

UtilCTRL::CodigoUserLogado();

$ctrl_produto = new ProdutoCTRL();
$ctrl_tag = new TagCTRL();

$vo = new ProdutoVO();

if (!isset($_POST['produto']))
    $codproduto = $_GET['cod'];
else
    $codproduto = $_POST['produto'];

$detalharProduto = $ctrl_produto->DetalharProdutoCTRL($codproduto);

//Caso alguém mexa no código
if (count($detalharProduto) == 0){
    header('location: adm_consultarprodutos.php');
    exit;
} else {
    $itens = $ctrl_produto->ConsultarProdutoTagCTRL($codproduto);
    $tags = $ctrl_tag->ConsultarTagFiltradoCTRL($codproduto);
}

if (isset($_POST['btn_adicionar'])) {

    $vo->setIdProduto($_POST['produto']);
    $vo->setIdTag($_POST['tag']);

    $ret = $ctrl_produto->AdicionarProdutoTagCTRL($vo);
    header('location: adm_produtotag.php?cod=' . $codproduto . '&ret=' . $ret);

} else if (isset($_POST['btn_excluir'])) {

    $vo->setIdProduto($codproduto);
    $vo->setIdTag($_POST['btn_excluir']);

    $ret = $ctrl_produto->RemoverItemTagCTRL($vo);
    header('location: adm_produtotag.php?cod=' . $codproduto . '&ret=' . $ret);
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once '../../Base/_head.php'; ?>
</head>

<body class="theme-black">
    <?php

    include_once '../../Base/_pageloader.php';
    include_once '../../Base/_topo.php';
    include_once '../../Base/_menu.php';
    include_once '../../Base/_footer.php';

    ?>

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <h2>
                    Detalhes do Cadastro de Tags no produto
                    <small>Aqui você efetua o cadastro das tags no produto selecionado</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" method="post" action="adm_produtotag.php">
                                <input type="hidden" name="codproduto" id="codproduto" value="<?= $codproduto ?>">

                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <div class="form-group form-float ">
                                            <select class="form-control show-tick" name="produto" id="produto" readonly required>
                                                <option value="<?= $detalharProduto[0]['id_produto'] ?>"><?= $detalharProduto[0]['nome_produto'] ?></option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-8">
                                        <div class="form-group form-float ">
                                            <select class="form-control show-tick" name="tag" id="tag">
                                                <option value="">Por favor, selecione as tags cadastradas.</option>
                                                <?php for ($i = 0; $i < count($tags); $i++) { ?>
                                                    <option value="<?= $tags[$i]['id_tag'] ?>"><?= $tags[$i]['nome_tag'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn bg-green btn-small waves-effect" name="btn_adicionar" id="btn_adicionar" onclick="return ValidarTela()">Adicionar Tag</button>
                                </div>

                                <div class="header">
                                    <h2>Itens dos Tags</h2>
                                </div>

                                <div class="body table-responsive">
                                    <div class="col-xs-12">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th class="align-center">ID</th>
                                                    <th class="align-center">Nome da Tag</th>
                                                    <th class="align-center">Ação</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if ($codproduto != '') {  ?>
                                                    <?php for ($i = 0; $i < count($itens); $i++) { ?>
                                                        <tr>
                                                            <td class="align-center"><?= $itens[$i]['tb_tag_id_tag'] ?></td>
                                                            <td class="align-center"><?= $itens[$i]['nome_tag'] ?></td>
                                                            <td class="align-center"><button name="btn_excluir" name="btn_excluir" id="btn_excluir" class="btn bg-red waves-effect" value="<?= $itens[$i]['tb_tag_id_tag'] ?>">Excluir</button></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>

                                    <?php if ($codproduto != null) { ?>
                                        <a href="adm_consultarprodutos.php" class="btn btn-primary waves-effect">Finalizar</a>
                                    <?php } ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once '../../Base/_JQuery.php';
    include_once '../../Base/_msg.php';
    ?>

</body>

</html>