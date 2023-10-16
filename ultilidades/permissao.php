<?php

if (!isset($_SESSION['nivelAcesso'])) {
    $mensagem = "Você não está logado!";
    $tipo = "warning";
    header('Location: ../Usuario/login.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
}