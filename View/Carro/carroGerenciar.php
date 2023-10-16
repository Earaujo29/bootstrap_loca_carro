<!DOCTYPE html>
<html lang="pt">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""><link rel="shortcut icon" href="../Template/image/logo6.ico" >
        <link rel="shortcut icon" href="../Template/image/logo6.ico" >


        <title>Sistema Locadora</title>

        <!-- Bootstrap Core CSS -->
        <link href="../Template/css/bootstrap.min.css" rel="stylesheet">

        <link href="../Template/plugins/morris.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../Template/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../Template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style>
            .btn-file {
                position: relative;
                overflow: hidden;
            }
            .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }

        </style>

    </head>

    <body>

        <?php
        require_once('../Template/menuLateral.php');
        require_once('../../Categoria/CategoriaController.php');
        require_once('../../Carro/CarroController.php');
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                            Carro
                            <small>Gerenciamento</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-film"></i>  <a href="carroListar.php">Carro</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-circle"></i>Cadastrar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de Carro</h4></div>
                    <div class="panel-body">

                        <form role="form"  method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">


                                    <?php if ($mensagem != "" && $tipo != "") { ?>
                                        <div class="alert alert-<?= $tipo ?> m-t-1">
                                            <strong><?= $tipo ?>!</strong> <?= $mensagem ?>
                                        </div>
                                    <?php } ?>


                                    <!-- COLUNA ESQUERDA !-->
                                    <div class="col-lg-6">

                                        <div class="col-lg-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <div class="huge">Imagem</div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                            <div>
                                                                <label class="btn btn-success btn-file">
                                                                    <i class="fa fa-file-video-o"></i>
                                                                    <input type="file" id="imagem" value="<?php
                                                                    if (isset($resultado->imagem)) {
                                                                        echo $resultado->imagem;
                                                                    }
                                                                    ?>"  name="imagem" style="display: none;">
                                                                </label>
                                                                <button type="button" class="btn btn-danger"  onclick="limparCampoFile();"><i class="fa fa-close"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#">

                                                    <div class="panel-footer">
                                                        <div>
                                                            <img id="imagemCapa" src="<?php
                                                            if (isset($resultado->imagem)) {
                                                                echo '../imgCapa/' . $resultado->imagem;
                                                            } else {
                                                                echo '../imgCapa/imgAdd.png';
                                                            }
                                                            ?>" class="img-rounded" alt="<?= $resultado->imagem; ?>" width="100%">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="nomeCarro">Nome do carro:</label>
                                            <input type="text" id="nomecarro" name="nomeCarro" class="form-control" value="<?php
                                            if (isset($resultado->nome)) {
                                                echo $resultado->nome;
                                            }
                                            ?>" placeholder="Nome do carro" required />
                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="idCategoria">Categoria:</label>
                                            <select name="idCategoria" class="form-control" required>
                                                <option value="" >-- Selecione --</option>

                                                <?php foreach ($categoria->findAll() as $key => $value): ?>
                                                    <option value="<?= $value->idCategoria; ?>" <?php
                                                    if (isset($resultado->idCategoria)) {

                                                        if ($value->idCategoria == $resultado->idCategoria) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>   ><?= $value->categoria; ?></option>
                                                        <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="sinopse">Descrição:</label>
                                            <TEXTAREA NAME="sinopse" ROWS=5 COLS=35 placeholder="" class="form-control" required><?php
                                                if (isset($resultado->sinopse)) {
                                                    echo $resultado->sinopse;
                                                }
                                                ?></TEXTAREA>
                                        </div>

                                    </div>
                                    <!-- FIM COLUNA ESQUERDA !-->

                                    <!-- COLUNA DIREITA !-->
                                    <div class="col-lg-6">
                                        
                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                             <label for="valor_locacao">Valor da Locação:</label>
                                             <input type="number" id="valor_locacao" name="valor_locacao" class="form-control" value="<?php
                                            if (isset($resultado->valor_locacao)) {
                                                echo $resultado->valor_locacao;
                                            }
                                            ?>" placeholder="Valor da Locação" required />

                                        </div>

                                         <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="diretor">Marca:</label>
                                            <input type="text" id="diretor" name="diretor" class="form-control" value="<?php
                                            if (isset($resultado->diretor)) {
                                                echo $resultado->diretor;
                                            }
                                            ?>"  placeholder="Marca" required />
                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="produtora">Cor:</label>
                                            <input type="text" id="produtora" name="produtora" class="form-control" value="<?php
                                            if (isset($resultado->idCarro)) {
                                                echo $resultado->produtora;
                                            }
                                            ?>" placeholder="Cor" required />
                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                             <label for="ano">Ano:</label>
                                             <input type="number" id="ano" name="ano" class="form-control" value="<?php
                                            if (isset($resultado->ano)) {
                                                echo $resultado->ano;
                                            }
                                            ?>" placeholder="Ano" required />

                                        </div>

                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="quantidade">Quantidade disponíveis do veículo:</label>
                                            <input type="text" id="quantidade" name="quantidade" class="form-control" value="<?php
                                            if (isset($resultado->quantidade)) {
                                                echo $resultado->quantidade;
                                            }
                                            ?>" placeholder="Quantidade disponíveis do veículo:"  required />
                                        </div>


                                         <div class="col-lg-12" style="padding: 0 15px 15px 15px;">
                                            <label for="trailer">Anuncio do Carro:</label>

                                            <div class="input-group">

                                                <input type="text" id="trailer" name="trailer" class="form-control" value="<?php
                                                if (isset($resultado->trailer)) {
                                                    echo "https://www.youtube.com/watch?v=" . $resultado->trailer;
                                                }
                                                ?>" placeholder="https://www.youtube.com/watch?v=UAlH3gysjOQ" required />

                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button" onclick="testarLink()">OK</button>
                                                </span>
                                             </div>
                                        </div>


                                        <div class="col-lg-12" style="padding: 0 15px 15px 15px; <?php
                                        if (!isset($resultado->trailer)) {
                                            echo 'display: none';
                                        }
                                        ?>" id="blocoYoutube">
                    
                                             <div class="panel panel-primary">
                                                  <div class="panel-heading"><h4>Preview do trailer</h4></div>
                                                  <div class="panel-body" id="video"> 
                                                           <iframe width="100%" id="youtube" height="315"src="https://www.youtube.com/embed/<?php
                                                    if (isset($resultado->trailer)) {
                                                        echo $resultado->trailer;
                                                    } else {
                                                        echo"AcN6Yh8ge-U";
                                                    }
                                                    ?>"></iframe>
                                                       </div>
                                             </div>
                                        </div>


                                        <!-- FIM COLUNA DIREITA !-->

                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-mg-12 col-lg-12" style=" text-align: center; padding: 20px 0 0 0; margin-top: 1%">

                                            <?php if (isset($resultado->idCarro)) { ?>
                                                <div class="col-xs-2 col-mg-2 col-lg-2">
                                                    <input class="btn btn-warning btn-block" type="submit" name="update" value="Alterar"><span style="padding:0 0 0 30px;">
                                                        <input type="hidden" name="ImagemCapa" value="<?php
                                                        if (isset($resultado->imagem)) {
                                                            echo $resultado->imagem;
                                                        }
                                                        ?>"/>
                                                        <input type="hidden" name="idCarro" value="<?= $_GET['codigo']; ?>" />
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-xs-2 col-mg-2 col-lg-2">
                                                    <input class="btn btn-primary btn-block" type="submit" name="insert" value="Cadastrar"><span style="padding:0 0 0 30px;">
                                                </div>
                                                <div class="col-xs-2 col-mg-2 col-lg-2">
                                                    <input class="btn btn-success btn-block" type="reset" name="limpar" value="Limpar"><span style="padding:0 0 0 30px;">
                                                </div>
                                            <?php } ?>
                                            <div class="col-xs-2 col-mg-2 col-lg-2">
                                                <a class="btn btn-info btn-block" href="carroListar.php" name="limpar">Voltar</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </form>



                        <!-- /.container-fluid -->

                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->

                <!-- jQuery -->
                <script src="../Template/js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="../Template/js/bootstrap.min.js"></script>

                <!-- JavaScript de manipulação da imagem e video do youtube -->
                <script type="text/javascript">
                                                        $(document).on('change', ':file', function (event) {
                                                            var input = $(this),
                                                                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                                                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                                            input.trigger('fileselect', [numFiles, label]);

                                                            var output = document.getElementById('imagemCapa');
                                                            output.src = URL.createObjectURL(event.target.files[0]);

                                                        });


                                                        function limparCampoFile() {

                                                            document.getElementById("imagem").value = "";
                                                            document.getElementById("imagemCapa").src = "../imgCapa/imgAdd.png";
                                                        }

                                                        function testarLink() {
                                                            var link = document.getElementById("trailer").value;
                                                            var posicao = 0;
                                                            posicao = link.indexOf("watch?v=");
                                                            link = link.substr((posicao + 8), 99);

                                                            if (posicao > 0) {

                                                                var video = '<iframe width="100%" id="youtube" height="315"src="https://www.youtube.com/embed/' + link + '"></iframe>';
                                                                $('#video').empty();
                                                                $('#video').append(video);
                                                                document.getElementById('blocoYoutube').style.display = "block";
                                                            } else {
                                                                alert('Formato de video invalido!');
                                                            }

                                                        }


                                                                                                                                                                                                        </script>

                </body>

                </html>
