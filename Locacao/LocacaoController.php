<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Locacao/Locacao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Carro/Carro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Cliente/Cliente.php';

date_default_timezone_set('America/Sao_Paulo');
$dateAtual = date('Y-m-d');
$dataCadastro = date('d/m/Y');


$locacao = new Locacao();
$carro = new Carro();
$cliente = new Cliente();
$mensagem = "";
$tipo = "";
$resultado;
$carroLocado;

if (isset($_POST['insert'])) {
    $idCliente = $_POST['idCliente'];

    $dataEntrega = new DateTime($_POST['dataEntrega']);
    $dataEntrega = $dataEntrega->format('Y-m-d');

    $locacao->setIdCliente($idCliente);

    $locacao->setDataEntrega($dataEntrega);
    $locacao->setStatus(1);

    $locacao->setValor($_POST['valor']);

    $locacao->setIdLocacao($locacao->insert());
    if ($locacao->getIdLocacao() != 0) {
        $locacao->setIdCarro($_POST['id_carro']);

        if ($locacao->insertTA($locacao)) {
            $mensagem = "A locação foi cadastrado com sucesso.";
            $tipo = "success";
        } else {
            $mensagem = "Não foi possivel cadastrar a locação dos carros dessa locação.";
            $tipo = "danger";
        }
    } else {
        $mensagem = "Não foi possivel cadastrar a locação.";
        $tipo = "danger";
    }
}



if (isset($_POST['update'])) {
    $idLocacao = $_POST['idLocacao'];
    $idCliente = $_POST['idCliente'];

    $dataEntrega = new DateTime($_POST['dataEntrega']);
    $dataEntrega = $dataEntrega->format('Y-m-d');

    $dataCadastro = new DateTime($_POST['dataCadastro']);
    $dataCadastro = $dataCadastro->format('Y-m-d');

    if (isset($_POST['dataDevolucao']) && $_POST['dataDevolucao'] != "") {
        $dataDevolucao = new DateTime($_POST['dataDevolucao']);
        $dataDevolucao = $dataDevolucao->format('Y-m-d');
    } else {
        $dataDevolucao = 'null';
    }

    $status = $_POST['status'];

    $locacao->setIdLocacao($idLocacao);
    $locacao->setIdCliente($idCliente);

    $locacao->setDataEntrega($dataEntrega);
    $locacao->setDataDevolucao($dataDevolucao);
    $locacao->setStatus($status);

    $locacao->setValor($_POST['valor']);
    //valida se altero
    if ($locacao->update()) {

        $locacao->deleteAll($locacao->getIdLocacao());

        $locacao->setIdCarro($_POST['id_carro']);

        if ($locacao->insertTA($locacao)) {
            $mensagem = "A locação foi cadastrado com sucesso.";
            $tipo = "success";
        } else {
            $mensagem = "Não foi possivel cadastrar a locação dos carros dessa locação.";
            $tipo = "danger";
        }
    } else {
        $mensagem = "Não foi possivel cadastrar a locação.";
        $tipo = "danger";
    }
}

if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $resultado = $locacao->find($id);
    $carroLocado = current($carro->findLocadosSelect($id));
}

if (isset($_POST['excluir'])) {
    $idLocacao = $_POST['idLocacao'];

    if ($locacao->delete($idLocacao)) {

        if ($locacao->deleteAll($idLocacao)) {
            $mensagem = "O locação foi excluida com sucesso.";
            $tipo = "success";
        } else {
            $mensagem = "Não foi possível excluir esse Locacao, só será possível inativalo.";
            $tipo = "danger";
        }
    } else {
        $mensagem = "Não foi possível excluir esse Locacao, só será possível inativalo.";
        $tipo = "danger";
    }
}

if (isset($_POST['devolucao'])) {
    $idLocacao = $_POST['idlocacaoStatus'];
    $status = $_POST['tipoStatus'];

    if ($locacao->status($idLocacao, $status)) {
        $mensagem = "O status do locacao foi alterado com sucesso.";
        $tipo = "success";
    } else {
        $mensagem = "Não foi possível alterado o status do locacao.";
        $tipo = "danger";
    }
}