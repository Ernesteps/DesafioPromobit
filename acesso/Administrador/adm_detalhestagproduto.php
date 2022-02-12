<?php

require_once '../../VO/ProdutoVO.php';
require_once '../../VO/TagVO.php';

require_once '../../CTRL/ProdutoCTRL.php';
require_once '../../CTRL/TagCTRL.php';
require_once '../../CTRL/UtilCTRL.php';

UtilCTRL::CodigoUserLogado();

$ctrl_tag = new TagCTRL();
$codtag = $_GET['cod'];
$detalharTag = $ctrl_tag->DetalharTagCTRL($codtag);

//Caso alguém mexa no código na URL
if (count($detalharTag) == 0){
    header('location: adm_consultartags.php');
    exit;
} else {
    $itens = $ctrl_tag->ConsultarDetalheTagProdutoCTRL($codtag);
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
                    Detalhes da Tag cadastrados nos Produtos
                    <small>Aqui você vê os detalhes da tag cadastrado nos produtos</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" method="post" action="adm_produtotag.php">
                                <input type="hidden" name="codtag" id="codtag" value="<?= $codtag ?>">

                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <div class="form-group form-float ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tag" id="tag" value="<?=$detalharTag[0]['nome_tag'] ?>" readonly required>
                                                <label class="form-label">Nome da Tag</label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="header">
                                    <h2>Itens dos Produtos</h2>
                                </div>

                                <div class="body table-responsive">
                                    <div class="col-xs-12">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th class="align-center">ID do Produto</th>
                                                    <th class="align-center">Nome do Produto</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if ($codtag != '') {  ?>
                                                    <?php for ($i = 0; $i < count($itens); $i++) { ?>
                                                        <tr>
                                                            <td class="align-center"><?= $itens[$i]['tb_produto_id_produto'] ?></td>
                                                            <td class="align-center"><?= $itens[$i]['nome_produto'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="adm_consultartags.php" class="btn btn-primary waves-effect">Finalizar</a>
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