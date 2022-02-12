<?php

require_once '../../CTRL/ProdutoCTRL.php';
require_once '../../VO/ProdutoVO.php';
require_once '../../CTRL/UtilCTRL.php';
UtilCTRL::CodigoUserLogado();

$cod = '';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new ProdutoCTRL();
    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharProdutoCTRL($cod);

    if (count($dados) == 0) {
        header('location: adm_consultarprodutos.php');
        exit;
    }
} else if (isset($_POST['btn_gravar'])) {

    $vo = new ProdutoVO();
    $ctrl = new ProdutoCTRL();

    $cod = $_POST['cod'];
    $vo->setidProduto($cod);

    $vo->setNomeProduto($_POST['nome_produto']);
    $vo->setIdUser(1);

    if ($cod == '') {
        $ret = $ctrl->InserirCadastroProdutoCTRL($vo);
    } else {
        $ret = $ctrl->AlterarCadastroProdutoCTRL($vo);
        header('location: adm_produto.php?cod=' . $cod . '&ret=' . $ret);
    }
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
                    <?= $cod == '' ? 'Novo' : 'Alterar' ?> Produto
                    <small>Aqui você <?= $cod == '' ? 'cadastra um novo' : 'altere o' ?> Produto</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_produto.php">
                                <input type="hidden" name="cod" id="cod" value="<?= $cod ?>">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nome_produto" id="nome_produto" maxlength="60" value="<?= isset($dados) ? $dados[0]['nome_produto'] : '' ?>" required>
                                                <label class="form-label">Nome do Produto</label>
                                            </div>
                                            <div class="help-info">Digite o Nome do Produto</div>
                                        </div>

                                <button class="btn btn-primary waves-effect" name="btn_gravar"><?= $cod == '' ? 'Cadastrar' : 'Alterar' ?></button>

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