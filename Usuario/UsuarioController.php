<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Usuario/Usuario.php';

$usuario = new Usuario();
$mensagem = "";
$tipo = "";

if (isset($_POST['insert'])) {

    $nome = $_POST['nomeM'];
    $login = $_POST['loginM'];
    $senha = $_POST['senhaM'];
    $status = 1;
    $nivelAcesso = 1;

    $usuario->setNome($nome);
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $usuario->setStatus(1);
    $usuario->setNivelAcesso(2);

    if ($usuario->validaLogin($login)) {
        $mensagem = "Esse usuário ja foi cadastrado no sistema, por favor escolha outro.";
        $tipo = "warning";
        header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    } else {

        if ($usuario->insert()) {
            $mensagem = "O usuário foi cadastrado no sistema.";
            $tipo = "success";
            header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
        } else {
            $mensagem = "Erro não foi possível cadastrar.";
            $tipo = "danger";
            header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
        }
    }
}


if (isset($_POST['logar'])) {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuario->setLogin($login);
    $usuario->setSenha($senha);

    # Insert
    if ($usuario->autenticar()) {
        header('Location: ../View/Principal/');
    } else {
        $mensagem = "Erro login ou senha inválidos.";
        $tipo = "danger";
        header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    }
}


if (isset($_POST['editar'])) {

    $id = $_POST['nome'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $status = $_POST['stgatus'];
    $nivelAcesso = $_POST['nivelAcesso'];

    $usuario->setNome($nome);
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $usuario->setStatus($status);
    $usuario->setNivelAcesso($nivelAcesso);


    # Insert
    if ($usuario->edit()) {
        echo "Inserido com sucesso!";
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../View/Usuario/login.php');
}

if (isset($_POST['recoveryPassword'])) {
    $login = $_POST['email'];
    $usuario->setLogin($login);

    $retorno = $usuario->findLogin($login);
    if ($retorno != 0) {
        $mensagem = "Um e-mail para recupera a senha foi enviado para o seu e-mail.";
        $tipo = "success";

        // codigo para enviar e-mail
        // codifica o id para enviar via get
        base64_encode($retorno);

        header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    } else {
        $mensagem = "Esse e-mail não foi cadastrado em nosso sistema.";
        $tipo = "warning";
        header('Location: ../View/Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    }
}


if (isset($_POST['newPassword'])) {
    $idUsuario = base64_decode($_GET['id']);
    $senha = geraSenha(8, true, true, true);
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
}

function geraSenha($tamanho, $maiusculas, $numeros, $simbolos) {
    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    $retorno = '';
    $caracteres = '';
    $caracteres .= $lmin;
    if ($maiusculas)
        $caracteres .= $lmai;
    if ($numeros)
        $caracteres .= $num;
    if ($simbolos)
        $caracteres .= $simb;
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
        $rand = mt_rand(1, $len);
        $retorno .= $caracteres[$rand - 1];
    }
    return $retorno;
}

?>