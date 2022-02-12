<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/CTRL/UsuarioCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Promobit/CTRL/UtilCTRL.php';

$ctrl = new UsuarioCTRL();
$dadosWelcome = $ctrl->DetalharUsuarioCTRL('');

if (isset($_GET['close']) && $_GET['close'] == 1) {
    UtilCTRL::Deslogar();
}

?>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">

        <ul class="list">
            <li class="header">Menu</li>

            <li class="active">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">storage</i>
                    <span>Cadastros</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="adm_produto.php">
                            <span>Cadastrar Produto</span>
                        </a>
                    </li>
                    <li>
                        <a href="adm_tag.php">
                            <span>Cadastrar Tags</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">find_in_page</i>
                    <span>Consultas</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="adm_consultarprodutos.php">
                            <span>Consultar Produtos</span>
                        </a>
                    </li>
                    <li>
                        <a href="adm_consultartags.php">
                            <span>Consultar Tags</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="adm_meusdados.php">
                    <i class="material-icons">account_circle</i>
                    <span>Meus Dados</span>
                </a>
            </li>

            <li class="active">
                <a href="adm_mudarsenha.php">
                    <i class="material-icons">account_circle</i>
                    <span>Mudar Senha</span>
                </a>
            </li>

            <li class="active">
                <a href="../../Base/_menu.php?close=1">
                    <i class="material-icons">exit_to_app</i>
                    <span>Sair</span>
                </a>
            </li>

        </ul>
    </div>