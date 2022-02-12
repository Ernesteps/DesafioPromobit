function MensagemSucessoComFunctionRefreshPage() {
    swal({
        title: "Sucesso!",
        text: "Operação realizada.",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#4CAF50",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemSucessoSemFunction() {
    swal("Sucesso!", "Operação Realizada.", "success");
}

function MensagemAlertaComFunctionRefreshPage() {
    swal({
        title: "Alerta!",
        text: "Essa entidade está sendo usado.",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "#FF9800",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemAlertaSemFunction() {
    swal("Alerta!", "Essa entidade está sendo usado.", "warning");
}

function MensagemErroComFunctionRefreshPage() {
    swal({
        title: "Erro!",
        text: "Ops, algo deu de errado.",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#F44336",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemErroSemFunction() {
    swal("Erro!", "Ops, algo deu errado.", "error");
}

function ExcluirProduto(id, nome) {
    swal({
        title: "Tem Certeza?",
        text: "Você está prestes a deletar a entidade: " + nome,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        closeOnConfirm: false
    }, function () {
        $.post("Ajax/Produto_Ajax.php", {
            id_produto: id,
            acao: 'R'

        }, function (retorno_chamada) {

            if (retorno_chamada == -2) {
                MensagemAlertaSemFunction();
            }

            else if (retorno_chamada == -1) {
                MensagemErroComFunctionRefreshPage();
            }

            else {
                MensagemSucessoComFunctionRefreshPage();
            }

        });
    });
    return false;
}

function ExcluirTag(id, nome) {
    swal({
        title: "Tem Certeza?",
        text: "Você está prestes a deletar a entidade: " + nome,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        closeOnConfirm: false
    }, function () {
        $.post("Ajax/Tag_Ajax.php", {
            id_tag: id,
            acao: 'R'

        }, function (retorno_chamada) {

            if (retorno_chamada == -2) {
                MensagemAlertaSemFunction();
            }

            else if (retorno_chamada == -1) {
                MensagemErroComFunctionRefreshPage();
            }

            else {
                MensagemSucessoComFunctionRefreshPage();
            }

        });
    });
    return false;
}

function AtualizarUsuario() {

    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Usuario_Ajax.php",
        {
            email_adm: email,
            tel_adm: telefone,
            endereco_adm: endereco,
            acao: 'A'
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) { MensagemSucessoSemFunction(); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function ValidarSenhaAtual(senha_atual_digitado) {

    $.post("Ajax/Validar_Senha_Atual_Ajax.php",
        {
            senha_atual: senha_atual_digitado
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) {
                $("#val_senha_atual").hide();
                $("#Senha_atual").hide();
                $("#SenhaAtual").hide();
                $("#SenhaPreenchida").show();
                $("#Nova_senha").focus();
            } else {
                $("#val_senha_atual").html('A senha digitada não coincide com o do Usuário logado.');
                $("#val_senha_atual").show();
            }
        });
    return false;
}

function ValidarTela()
{
    if($("#produto").val().trim() == '' || $("#tag").val().trim() == '')
    {
        swal("Alerta!", "Há campo vazio.", "warning");
        return false;
    }
    return true;
}