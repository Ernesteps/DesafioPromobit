<?php

require_once '../../CTRL/ProdutoCTRL.php';
require_once '../../VO/ProdutoVO.php';
require_once '../../CTRL/UtilCTRL.php';
UtilCTRL::CodigoUserLogado();

$ctrl_produto = new ProdutoCTRL();
$produtos = $ctrl_produto->ConsultarProdutoCTRL();


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
                    Consultar produtos
                    <small>Aqui consulta produtos cadastrados. Obs.: Ao clicar em detalhes, poderá efetuar os cadastros das tags no respectivo produto selecionado.</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Produtos Cadastrados
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nome do Produto</th>
                                            <th>Total de Tags Inseridos</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome do Produto</th>
                                            <th>Total de Tags Inseridos</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($produtos); $i++) { ?>
                                            <tr>
                                                <td><?= $produtos[$i]['nome_produto'] ?></td>
                                                <td><?= $produtos[$i]['total_de_tags'] ?></td>

                                                <td>
                                                    <div class="row js-modal-buttons demo-button-sizes">
                                                        <div class="align-center">
                                                            <a href="adm_produto.php?cod=<?= $produtos[$i]['id_produto'] ?>" data-color="orange" class="btn bg-orange waves-effect">Alterar</a>
                                                            <button type="button" class="btn bg-red waves-effect" onclick="ExcluirProduto('<?= $produtos[$i]['id_produto'] ?>','<?= $produtos[$i]['nome_produto'] ?>')">Excluir</button>
                                                            <a href="adm_produtotag.php?cod=<?= $produtos[$i]['id_produto'] ?>" data-color="cyan" class="btn bg-cyan waves-effect">Detalhes</a>
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