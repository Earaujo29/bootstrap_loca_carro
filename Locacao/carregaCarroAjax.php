<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Carro/Carro.php');
$carro = new Carro();

$return = $carro->find($_POST['id_carro']);

if ($return) {
    echo json_encode(array('status' => 'sucess', 'data' => $return));
} else {
    echo json_encode(array('status' => 'error', 'mensagem' => 'Não foi possivel achar o registro'));
}