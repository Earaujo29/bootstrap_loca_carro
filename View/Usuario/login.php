<!DOCTYPE html>
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

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Principal/index.php">Sistema Locadora</a>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid m-t-5">


                <div class="row">
                    <div class="col-lg-5 col-md-offset-3"> 
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">

                                <h1>ACESSO AO SISTEMA</h1>
                            </div>

                            <div class="panel-body">
                                <form role="form" action="../../Usuario/UsuarioController.php" method="POST">

                                    <div class="row form-group">
                                        <div class="col-lg-12 "> 
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                                <input type="email" class="form-control" id="login" name="login" placeholder="Informe seu e-mail.." aria-describedby="basic-addon1" required>
                                            </div>
                                        </div>
                                    </div>									

                                    <div class="row form-group">
                                        <div class="col-lg-12 "> 
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a sua senha.." aria-describedby="basic-addon1" required>
                                            </div>
                                        </div>
                                    </div>	

                                    <div class="row form-group">
                                        <div class="col-lg-12 "> 
                                            <button class="btn btn-primary btn-block" id="logar" name="logar" type="submit" >ENTRAR</button>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-lg-6 text-right"> 
                                            <!-- Button trigger modal -->
                                            <a  data-toggle="modal" data-target="#cadastro">
                                                Cadastro
                                            </a>
                                        </div>

                                        <div class="col-lg-6"> 
                                            <a   data-toggle="modal" data-target="#esqueciSenha">
                                                Esqueci a Senha
                                            </a>
                                        </div>
                                    </div>


                                    <?php if (isset($_GET['mensagem']) && isset($_GET['tipo'])) { ?>
                                        <div class="alert alert-<?= $_GET['tipo'] ?> m-t-1">
                                            <strong><?= $_GET['tipo'] ?>!</strong> <?= $_GET['mensagem'] ?>
                                        </div>
                                    <?php } ?>

                            </div>

                            </form>
                        </div>	

                    </div>
                </div>


                <div class="col-lg-offset-3"> 

                </div>

            </div>






            <!-- Modal -->
            <?php require_once('modal/cadastro.php'); ?>
            <?php require_once('modal/esqueciSenha.php'); ?>
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
<script src="../Template/js/plugins/morris/morris-data.js"></script>

</body>

</html>
