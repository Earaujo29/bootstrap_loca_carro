<?php

session_start();
$mensagem;
$tipo;

if (!isset($_SESSION['idUsuario'])) {
    $mensagem = "Você não está logado!";
    $tipo = "warning";
    header('Location: ../Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
}