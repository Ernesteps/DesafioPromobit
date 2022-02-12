<?php

require_once '../../CTRL/TagCTRL.php';
require_once '../../VO/TagVO.php';
require_once '../../CTRL/UtilCTRL.php';
UtilCTRL::CodigoUserLogado();

$ctrl_tag = new TagCTRL();
$tags = $ctrl_tag->ConsultarTagCTRL();

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
                    Consultar tags
                    <small>Aqui consulta tags cadastrados</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tags Cadastrados
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nome da Tag</th>
                                            <th>Total de Tags inseridos nos Produtos</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome da Tag</th>
                                            <th>Total de Tags inseridos nos Produtos</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($tags); $i++) { ?>
                                            <tr>
                                                <td><?= $tags[$i]['nome_tag'] ?></td>
                                                <td><?= $tags[$i]['total_de_produtos'] ?></td>

                                                <td>
                                                    <div class="row js-modal-buttons demo-button-sizes">
                                                        <div class="align-center">
                                                            <a href="adm_tag.php?cod=<?= $tags[$i]['id_tag'] ?>" data-color="orange" class="btn bg-orange waves-effect">Alterar</a>
                                                            <button type="button" class="btn bg-red waves-effect" onclick="ExcluirTag('<?= $tags[$i]['id_tag'] ?>','<?= $tags[$i]['nome_tag'] ?>')">Excluir</button>
                                                            <a href="adm_detalhestagproduto.php?cod=<?= $tags[$i]['id_tag'] ?>" data-color="cyan" class="btn bg-cyan waves-effect">Detalhes</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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