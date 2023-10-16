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

        <link href="../Template/plugins/morris.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../Template/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../Template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <?php
        require_once('../Template/menuLateral.php');
        require_once('../../Locacao/LocacaoController.php');
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
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-8">                        
                                <h4>Todos as Locações</h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar pelome do cliente" id="busca">
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning" type="button" onclick="buscar()">Buscar</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Cliente</th>
                                        <th>Qtd Carro</th>
                                        <th>dataEntrega</th>
                                        <th>dataCadastro</th>
                                        <th>Status</th>
                                        <th class="text-center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $lista = [];
                                    if (isset($_GET['busca'])) {
                                        $nome = '%' . $_GET['busca'] . '%';
                                        $lista = $locacao->findList($nome);
                                    } else {
                                        $lista = $locacao->findAll();
                                    }

                                    foreach ($lista as $key => $value):
                                        ?>

                                        <tr>
                                            <td><?= $value->idLocacao; ?></td>
                                            <td><?= $value->nome; ?></td>
                                            <td><?= $value->qtdCarro; ?></td>
                                            <td><?= $value->dataEntrega; ?></td>
                                            <td><?= $value->dataCadastro; ?></td>
                                            <td><?php
                                                if ($value->status == 1 && $dateAtual < $value->dataEntrega) {
                                                    echo '<div class="alert alert-info"><strong> Alugado';
                                                } else if ($value->status == 2 && $value->dataDevolucao != '') {
                                                    echo '<div class="alert alert-success"><strong> Devolvido';
                                                } else if ($value->status == 3 && $value->dataDevolucao != '') {
                                                    echo '<div class="alert alert-warning"><strong> Devolvido com Multa';
                                                } else if ($dateAtual > $value->dataEntrega && $value->status == 1) {
                                                    echo '<div class="alert alert-danger"><strong> Pendente!';
                                                } else {
                                                    echo '<div class="alert alert-danger"><strong> Cancelado';
                                                }
                                                ?>

                                                </strong>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <a href="locacaoCadastrar.php?codigo=<?= $value->idLocacao; ?>" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                                <a data-toggle="modal" data-target="#confirmacao" class="btn btn-danger" onclick="confirmacao(<?= $value->idLocacao ?>)"><i class="fa fa-close" title="Excluir" ></i></a>

                                                <?php if ($value->status != 1) { ?>
                                                    <a data-toggle="modal" data-target="#confirmacaoStatus" class="btn btn-success" onclick="confirmacaoStatus(<?= $value->idLocacao ?>, 1)" title="Ativar"><i class="glyphicon glyphicon-ok"></i></a>
                                                <?php } else { ?>
                                                    <a data-toggle="modal" data-target="#confirmacaoStatus" class="btn btn-info" onclick="confirmacaoStatus(<?= $value->idLocacao ?>, 0)" title="Inativar"><i class="fa fa-minus-circle "></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row  m-t-1">
                            <div class="col-lg-2 col-mg-2 col-sm-2">
                                <a href="locacaoCadastrar.php" class="btn btn-success btn-block">Nova Locação</a>

                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    require_once('modal/confirmacao.php');
    require_once('modal/confirmacaoStatus.php');
    ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../Template/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Template/js/bootstrap.min.js"></script>

    <script type="text/javascript">
                                                        function confirmacao(id) {
                                                            document.getElementById("idLocacao").value = id;
                                                        }

                                                        function confirmacaoStatus(id, tipo) {

                                                            document.getElementById("idLocacaoStatus").value = id;
                                                            document.getElementById("tipoStatus").value = tipo;


                                                            if (tipo === 1) {
                                                                document.getElementById("lbTipo").innerHTML = "Ativar";
                                                                document.getElementById("status").value = "Ativar";
                                                            } else {
                                                                document.getElementById("lbTipo").innerHTML = "Inativar";
                                                                document.getElementById("status").value = "Inativar";
                                                            }
                                                        }

                                                        function buscar() {
                                                            var busca;
                                                            busca = document.getElementById("busca").value;
                                                            window.location.assign("locacaoListar.php?busca=" + busca);
                                                        }
    </script>

</body>

</html>
