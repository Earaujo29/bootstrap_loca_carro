<html lang="pt">

    <head>

        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""><link rel="shortcut icon" href="../Template/image/logo6.ico" >

        <title>Sistema Locadora</title>

        <!-- Bootstrap Core CSS -->
        <link href="../Template/css/bootstrap.min.css" rel="stylesheet">

        <link href="../Template/plugins/morris.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../Template/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../Template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <?php
        require_once('../Template/menuLateral.php');
        require_once('../../Relatorio/RelatorioPrincipal.php');
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">                            
                            Principal
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Principal</a>

                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Gerenciamento
                    </div>
                    <div class="panel-body">

                        <form role="form">
                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="glyphicon glyphicon-usd fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?= $montante->valor ?></div>
                                                        <div>Faturamento desse Mês</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../Locacao/locacaoListar.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Ver mais</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>						

                                    <div class="col-xs-4 col-mg-4 col-lg-4">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-car fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?= $qtdLocacao->qtdLocados ?></div>
                                                        <div>Carros Locados!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../Carro/carroListar.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Ver mais</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>


                                    <div class="col-xs-4 col-mg-4 col-lg-4">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?= $qtdCliente->qtdClientes ?></div>
                                                        <div>Clientes Cadastrados</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="../Cliente/clienteListar.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Ver mais</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                </div>	



                                <div class="row">
                                    <div class="col-xs-6 col-mg-6 col-lg-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Faturamento</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-area-chart-faturamento"></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-xs-6 col-mg-6 col-lg-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Categoria mais locado</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart-genero"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <?php foreach ($listTop4 as $key => $value): ?>
                                        <div class="col-xs-6 col-mg-4 col-lg-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-car  fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge"><?= $value->categoria ?></div>
                                                            <div><?= $value->nome . "  (" . $value->qtd . ")" ?> Locação esse mês</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="../Carro/carroGerenciar.php?codigo=<?= $value->idCarro; ?>">
                                                    <div class="panel-footer">
                                                        <div>
                                                            <img src="../imgCapa/<?= $value->imagem ?>" class="img-rounded" alt="Cinque Terre" width="100%" height="250">
                                                        </div>
                                                        <span class="pull-left">Ver mais</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>									
                                        </div>
                                    <?php endforeach; ?>

                                </div>



                            </div>
                        </form>

                    </div>
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

    <!-- Morris Charts JavaScript -->
    <script src="../Template/js/plugins/morris/raphael.min.js"></script>
    <script src="../Template/js/plugins/morris/morris.min.js"></script>

    <script type="text/javascript">
        Morris.Donut({
        element: 'morris-donut-chart-genero',
                data: [
<?php foreach ($listQtdCategoria as $key => $result): ?>
                    {
                    label: "<?= $result->categoria ?>",
                            value: <?= $result->qtdCategoria ?>
                    },
<?php endforeach; ?>],
                resize: true
        });
        Morris.Bar({
        element: 'morris-area-chart-faturamento',
                data: [
<?php foreach ($listMontante as $key => $result): ?>
                    {
                    mes: "<?= $result->mes ?>",
                            valor: <?= $result->valor ?>
                    },
<?php endforeach; ?>],
                xkey: 'mes',
                ykeys: ['valor'],
                labels: ['Valor Faturado'],
                barRatio: 0.4,
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
        });

    </script>
</body>

</html>
