<?php

require_once '../../CTRL/TagCTRL.php';
require_once '../../VO/TagVO.php';
require_once '../../CTRL/UtilCTRL.php';
UtilCTRL::CodigoUserLogado();

$cod = '';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new TagCTRL();
    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharTagCTRL($cod);

    if (count($dados) == 0) {
        header('location: adm_consultartags.php');
        exit;
    }
} else if (isset($_POST['btn_gravar'])) {

    $vo = new TagVO();
    $ctrl = new TagCTRL();

    $cod = $_POST['cod'];
    $vo->setidTag($cod);

    $vo->setNomeTag($_POST['nome_tag']);
    $vo->setIdUser(1);

    if ($cod == '') {
        $ret = $ctrl->InserirCadastroTagCTRL($vo);
    } else {
        $ret = $ctrl->AlterarCadastroTagCTRL($vo);
        header('location: adm_tag.php?cod=' . $cod . '&ret=' . $ret);
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
                    <?= $cod == '' ? 'Novo' : 'Alterar' ?> Tag
                    <small>Aqui você <?= $cod == '' ? 'cadastra um novo' : 'altere o' ?> Tag</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_tag.php">
                                <input type="hidden" name="cod" id="cod" value="<?= $cod ?>">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nome_tag" id="nome_tag" maxlength="60" value="<?= isset($dados) ? $dados[0]['nome_tag'] : '' ?>" required>
                                                <label class="form-label">Nome da Tag</label>
                                            </div>
                                            <div class="help-info">Digite o Nome da Tag</div>
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