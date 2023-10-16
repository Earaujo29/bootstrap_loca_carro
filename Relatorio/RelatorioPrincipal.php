<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Locacao/Locacao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Cliente/Cliente.php';

$locacao = new Locacao();
$cliente = new Cliente();

$qtdLocacao = $locacao->findQtdLocados();
$montante = $locacao->findMontante();
$listTop4 = $locacao->listTop3();


$listMontante = $locacao->listMontate();
$listQtdCategoria = $locacao->listCategoriaLocada();

$qtdCliente = $cliente->findQtdCliente();

