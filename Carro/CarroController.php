<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//Carro/Carro.php';

$carro = new Carro();
$mensagem = "";
$tipo = "";
$resultado;

if (isset($_POST['insert'])) {
    $imagem = $_FILES['imagem'];
    $nome = $_POST['nomeCarro'];
    $idCategoria = $_POST['idCategoria'];
    $sinopse = $_POST['sinopse'];
    $diretor = $_POST['diretor'];
    $ano = $_POST['ano'];
    $produtora = $_POST['produtora'];
    $quantidade = $_POST['quantidade'];
    $trailer = $_POST['trailer'];
    $valor_locacao = $_POST['valor_locacao'];



    $posicao = strpos($trailer, "watch?v=");
    if ($posicao == 0) {
        $mensagem = "O trailler do carro precisa ser do youtube EX: www.youtube.com/watch?v=Xithigfg7dA.";
        $tipo = "warning";
        header('Location: ../View/Carro/carroListar.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    } else {

        $trailer = substr($trailer, $posicao + 8);
        $carro->setNome($nome);
        $carro->setIdCategoria($idCategoria);
        $carro->setSinopse($sinopse);
        $carro->setDiretor($diretor);
        $carro->setAno($ano);
        $carro->setProdutora($produtora);
        $carro->setQuantidade($quantidade);
        $carro->setTrailer($trailer);
        $carro->setStatus(1);
        $carro->setValorLocacao($valor_locacao);

        $imagem = $carro->upload_imagem($imagem);
        if ($imagem != null) {
            $carro->setImagem($imagem);

            if ($carro->insert()) {
                $mensagem = "O carro foi cadastrado com sucesso.";
                $tipo = "success";
            } else {
                echo "erro";
            }
        }
    }
}



if (isset($_POST['update'])) {
    $idCarro = $_POST['idCarro'];
    $nome = $_POST['nomeCarro'];
    $idCategoria = $_POST['idCategoria'];
    $sinopse = $_POST['sinopse'];
    $diretor = $_POST['diretor'];
    $ano = $_POST['ano'];
    $produtora = $_POST['produtora'];
    $quantidade = $_POST['quantidade'];
    $trailer = $_POST['trailer'];


    $posicao = strpos($trailer, "watch?v=");
    if ($posicao == 0) {
        $mensagem = "O trailler do carro precisa ser do youtube EX: www.youtube.com/watch?v=Xithigfg7dA.";
        $tipo = "warning";
        header('Location: ../View/Carro/carroListar.php?mensagem="' . $mensagem . '"&tipo=' . $tipo);
    } else {
        $carro->setIdCarro($idCarro);
        $trailer = substr($trailer, $posicao + 8);
        $carro->setNome($nome);
        $carro->setIdCategoria($idCategoria);
        $carro->setSinopse($sinopse);
        $carro->setDiretor($diretor);
        $carro->setAno($ano);
        $carro->setProdutora($produtora);
        $carro->setQuantidade($quantidade);
        $carro->setTrailer($trailer);
        $carro->setStatus(1);


        //verifica se a imagem foi informada
        if ($_FILES['imagem']['name'] != "") {
            $imagem = $_FILES['imagem'];
            $imagem = $carro->upload_imagem($imagem);
            if ($imagem != null) {
                $carro->setImagem($imagem);
            }
        } else {

            $imagem = $_POST['ImagemCapa'];
            $carro->setImagem($imagem);
        }

        if ($carro->update()) {

            $mensagem = "O carro foi alterado com sucesso.";
            $tipo = "success";
        } else {
            $mensagem = "Nao foi possivel alterar o carro.";
            $tipo = "warning";
        }
    }
}

if (isset($_POST['excluir'])) {
    $idCarro = $_POST['idCarro'];

    if ($carro->delete($idCarro)) {
        $mensagem = "O carro foi excluido com sucesso.";
        $tipo = "success";
    } else {
        $mensagem = "Não foi possível excluir esse carro, só será possível inativalo.";
        $tipo = "danger";
    }
}

if (isset($_POST['status'])) {
    $idCarro = $_POST['idCarroStatus'];
    $status = $_POST['tipoStatus'];

    if ($carro->status($idCarro, $status)) {
        $mensagem = "O status do carro foi alterado com sucesso.";
        $tipo = "success";
    } else {
        $mensagem = "Não foi possível alterado o status do carro.";
        $tipo = "danger";
    }
}

if (isset($_GET['codigo'])) {
    $resultado = $carro->find($_GET['codigo']);
}
