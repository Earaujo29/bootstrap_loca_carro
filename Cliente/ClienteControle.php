<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//Cliente/Cliente.php';

$cliente = new Cliente();
$mensagem = "";
$tipo = "";

if (isset($_POST['insert'])) {
    $dataNascimento = new DateTime($_POST['dataNascimento']);
    $dataNascimento = $dataNascimento->format('Y-m-d');
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $sexo = $_POST["sexo"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $status = $_POST["status"];

    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setDatanascimento($dataNascimento);
    $cliente->setSexo($sexo);
    $cliente->setEmail($email);
    $cliente->setTelefone($telefone);
    $cliente->setStatus(1);

    if ($cliente->insert()) {
        $mensagem = "Cadastrado com sucesso";
        $tipo = "success";
    } else {
        $mensagem = "Erro não foi possível cadastrar";
        $tipo = "danger";
    }
}

if (isset($_POST['excluir'])) {

    $id = $_POST['idCliente'];

    if (
            $cliente->delete($id)) {
        $mesagem = "Excluido com sucesso";
        $tipo = "success";
    } else {
        $mensagem = "Não foi possível excluir";
        $tipo = "danger";
    }
}

if (isset($_POST['status'])) {
    $idCliente = $_POST['idClienteStatus'];
    $status = $_POST['tipoStatus'];
    echo $status;


    if ($cliente->status($idCliente, $status)) {
        $mensagem = "O status alterado com sucesso.";
        $tipo = "success";
    } else {
        $mensagem = "Não alterar o status.";
        $tipo = "danger";
    }
    if ($cliente->update($idCliente)) {

        $mensagem = "Os dados do cliente foram alterado com sucesso.";
        $tipo = "success";
    } else {
        $mensagem = "Nao foi possivel alterar dados do cliente.";
        $tipo = "warning";
    }
}


if (isset($_POST['editar'])) {
    $idCliente = $_POST['idCliente'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = new DateTime($_POST['dataNascimento']);
    $dataNascimento = $dataNascimento->format('Y-m-d');
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $cliente->setIdCliente($idCliente);
    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setDatanascimento($dataNascimento);
    $cliente->setSexo($sexo);
    $cliente->setEmail($email);
    $cliente->setTelefone($telefone);

    //insert 
    if ($cliente->update()) {
        $mensagem = "Alterado com sucesso!";
        $tipo = "success";
    } else {
        $mensagem = "Não foi possivel alterar";
        $tipo = "danger";
    }
}

if (isset($_GET['codigo'])) {
    $resultado = $cliente->find($_GET['codigo']);
}
