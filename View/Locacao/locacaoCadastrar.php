<!DOCTYPE html>
<html lang="pt">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""><link rel="shortcut icon" href="../Template/image/logo6.ico" >

        <title>Sistema Locadora</title>

        <!-- Bootstrap Core CSS -->
        <link href="../Template/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../Template/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../Template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <link rel="stylesheet" type="text/css" href="css/bootstrap-duallistbox.css">
        <script src="../Template/js/jquery.min.js"></script>
        <script src="../Template/js/jquery.bootstrap-duallistbox.js"></script>

    </head>

    <body>

        <?php
        require_once('../Template/menuLateral.php');
        require_once('../../Locacao/LocacaoController.php');
        ?>


        <?php
        $listaCliente = [];

        $listaCliente = $cliente->findSelect();
        foreach ($listaCliente as $key => $value):
            $value->nome;
        endforeach;
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                            Locação
                            <small>Gerenciamento</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-money"></i>  <a href="locacaoListar.php">Locação</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-circle"></i> Nova Locação
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Nova Locação</h4></div>
                    <div class="panel-body">

                        <form role="form"  method="POST">
                            <div class="form-group">

                                <?php if ($mensagem != "" && $tipo != "") { ?>
                                    <div class="alert alert-<?= $tipo ?> m-t-1">
                                        <strong><?= $tipo ?>!</strong> <?= $mensagem ?>
                                    </div>
                                <?php } ?>


                                <div class="row form-group">
                                    <div class="col-lg-12 col-mg-12 col-sm-12">
                                        <label for="cliente">Cliente:</label>
                                    </div>

                                    <div class="col-xs-4 col-mg-4 col-sm-4">
                                        <select id="cliente" class="form-control" id="idCliente" name="idCliente">
                                            <option>-- Selecione o Cliente  --</option>
                                            <?php
                                            $listaCliente = [];

                                            $listaCliente = $cliente->findSelectActive();
                                            foreach ($listaCliente as $key => $value):
                                                ?>
                                                <option value="<?= $value->idCliente; ?>"
                                                <?php
                                                if (isset($resultado->idCliente)) {
                                                    if ($resultado->idCliente == $value->idCliente) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>      
                                                        >
                                                            <?= $value->nome; ?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12 col-mg-12 col-sm-12">
                                        <h2>Selecione o carro para locação:</h2>
                                    </div>

                                    <div class="col-lg-12 col-mg-12 col-sm-12">

                                        <select id="id_carro" class="form-control" name="id_carro">
                                            <option>-- Selecione o Carro  --</option>
                                            <?php
                                            $listaCarro = [];

                                            $listaCarro = $carro->findAll();
                                            $i = 0;
                                            foreach ($listaCarro as $key => $value):
                                                ?>
                                                <option value="<?= $value->idCarro; ?>"
                                                <?php
                                                if (isset($carroLocado->idCarro)) {

                                                    if ($carroLocado->idCarro == $value->idCarro) {
                                                        echo "selected";
                                                        $i++;
                                                    }
                                                }
                                                ?>      
                                                        >
                                                            <?= $value->nome; ?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>                                         
                                    </div>                                    
                                </div>

                                <div class="form-group row">
                                    <label for="dataEntrega" class="col-xs-12 col-mg-12 col-form-label"> Data de entrega:</label>
                                    <div class="col-xs-4 col-mg-4 col-sm-4">
                                        <input class="form-control" type="date" min="<?php
                                        if (!isset($resultado->dataEntrega)) {
                                            print date('Y-m-d');
                                        }
                                        ?>" value="<?php
                                               if (isset($resultado->dataEntrega)) {
                                                   echo $resultado->dataEntrega;
                                               } else {
                                                   echo $dateAtual;
                                               }
                                               ?>" id="dataEntrega" name="dataEntrega">
                                    </div>
                                </div>

                                <?php if (isset($resultado->idLocacao)) { ?>


                                    <div class="form-group row">
                                        <label for="status" class="col-xs-12 col-mg-12 col-form-label">Status:</label>
                                        <div class="col-xs-4 col-mg-4 col-sm-4">
                                            <select id="status" class="form-control" name="status">
                                                <option>-- Selecione o Cliente  --</option>
                                                <option value="0"  <?php
                                                if (isset($resultado->status)) {
                                                    if ($resultado->status == 0) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?> >Cancelado</option>
                                                <option value="1" <?php
                                                if (isset($resultado->status)) {
                                                    if ($resultado->status == 1) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?> >Alugado</option>
                                                <option value="2" <?php
                                                if (isset($resultado->status)) {
                                                    if ($resultado->status == 2) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?> >Devolvido</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dataDevolucao" class="col-xs-12 col-mg-12 col-form-label">Data de devolucao:</label>
                                        <div class="col-xs-4 col-mg-4 col-sm-4">
                                            <input class="form-control" type="date" value="<?php
                                            if (isset($resultado->dataDevolucao)) {
                                                if ($resultado->dataDevolucao != null && $resultado->dataDevolucao != '0000-00-00') {
                                                    echo $resultado->dataDevolucao;
                                                }
                                            };
                                            ?>" id="dataDevolucao" name="dataDevolucao">
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="form-group row">
                                    <label for="valor" class="col-xs-12 col-mg-12 col-form-label">Valor da Locação:</label>
                                    <div class="col-xs-4 col-mg-4 col-sm-4">
                                        <input class="form-control" type="number" value="<?php
                                        if (isset($resultado->valor)) {
                                            echo $resultado->valor;
                                        }
                                        ?>" readonly id="valor" name="valor">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xs-12 col-mg-12 col-lg-12" style="margin-top: 1%">												
                                        <input type="hidden" id="dataCadastro" value="<?= $dateAtual ?>" />                                            
                                        <input type="hidden" id="valor_locacao" name="valor_locacao" value="<?php
                                        if (isset($carroLocado->valor_locacao)) {
                                            print $carroLocado->valor_locacao;
                                        } else {
                                            print 0;
                                        }
                                        ?>" />
                                               <?php if (isset($resultado->idLocacao)) { ?>
                                            <div class="col-lg-2">
                                                <input class="btn btn-warning btn-block" type="submit" name="update" value="Alterar">                                                        
                                                <input type="hidden" name="idLocacao" value="<?= $_GET['codigo']; ?>" />
                                                <input type="hidden" name="dataCadastro" value="<?= $resultado->dataCadastro; ?>" />
                                            </div>
                                        <?php } else { ?>   
                                            <div class="col-lg-2">
                                                <input class="btn btn-primary btn-block" type="submit" name="insert" value="Cadastrar">
                                            </div>
                                            <div class="col-lg-2">
                                                <input class="btn btn-success btn-block" type="reset" name="limpar" value="Limpar">
                                            </div>
                                        <?php } ?>
                                        <div class="col-lg-2">
                                            <a class="btn btn-info btn-block" href="locacaoListar.php" name="limpar">Voltar</a>
                                        </div>	
                                    </div>	
                                </div>	

                            </div>

                        </form>	



                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../Template/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../Template/js/bootstrap.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {


                function calcula_valor(valor_locacao) {
                    var dataFim;
                    if ($('#dataDevolucao').val()) {
                        dataFim = new Date($('#dataDevolucao').val());
                    } else {
                        dataFim = new Date($('#dataEntrega').val());
                    }

                    var dataInicio = new Date($('#dataCadastro').val());
                    var diffMilissegundos = dataFim - dataInicio;
                    var diffSegundos = diffMilissegundos / 1000;
                    var diffMinutos = diffSegundos / 60;
                    var diffHoras = diffMinutos / 60;
                    var diffDias = diffHoras / 24;

                    var dias = diffDias + 1;

                    var valor = (dias * valor_locacao);

                    $('#valor').val(valor);
                }

                $('#dataEntrega').on('change', '', function (e) {

                    var valor = parseInt($('#valor_locacao').val());
                    if (valor > 0) {
                        calcula_valor($('#valor_locacao').val());
                    } else {
                        alert('Por Favor selecione um carro');
                        $('#id_carro').focus();
                    }
                });

                $('#dataDevolucao').on('change', '', function (e) {

                    var valor = parseInt($('#valor_locacao').val());
                    if (valor > 0) {
                        calcula_valor($('#valor_locacao').val());
                    } else {
                        alert('Por Favor selecione um carro');
                        $('#id_carro').focus();
                    }
                });

                $('#id_carro').on('change', '', function (e) {
                    if ($('#id_carro').val()) {
                        $.ajax({
                            url: "../../Locacao/carregaCarroAjax.php",
                            type: "post",
                            data: {id_carro: $('#id_carro').val()},
                            datatype: 'json',
                            success: function (response) {
                                var result = $.parseJSON(response);
                                $('#valor_locacao').val(result.data.valor_locacao);
                                calcula_valor($('#valor_locacao').val());

                            },
                        });
                    }
                });


            });
        </script>

    </body>

</html>
