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
        require_once('../../Cliente/ClienteControle.php');
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                            Cliente
                            <small>Gerenciamento</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-users"></i>  <a href="clienteListar.php">Cliente</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-circle "></i> Cadastrar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro</h4></div>
                    <div class="panel-body">

                        <form role="form" action="" method="POST">
                            <div class="form-group">
                                <?php if ($mensagem != "" && $tipo != "") { ?>
                                    <div class="alert alert-<?= $tipo ?> m-t-1">
                                        <strong><?= $tipo ?>!</strong> <?= $mensagem ?>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="nome">Nome do Cliente:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">																			
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" required="true" 
                                               value="<?php
                                               if (isset($resultado->nome)) {
                                                   echo $resultado->nome;
                                               }
                                               ?>" />				
                                    </div>

                                </div>

                                <div class="row m-t-1">						
                                    <div class="col-lg-4">							
                                        <label for="cpf">CPF:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">																			
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu CPF" required="true"
                                               accesskey="" value="<?php
                                               if (isset($resultado->cpf)) {
                                                   echo $resultado->cpf;
                                               }
                                               ?> "/>				
                                    </div>
                                </div>

                                <div class="row m-t-1">
                                    <div class="col-lg-4">							
                                        <label for="datanascimento">Data de Nascimento:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">																			
                                        <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" placeholder="Digite sua data de nascimento" required="true" value="<?= $resultado->dataNascimento ?>" />				
                                    </div>
                                </div>

                                <div class="row m-t-1">
                                    <div class="col-lg-4">							
                                        <label for="sexo">Sexo:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1">																			
                                        <input type="radio" id="sexo" name="sexo" value="1" <?php
                                        if (isset($resultado->sexo)) {
                                            if ($resultado->sexo == 1) {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?> />Masculino									
                                    </div>
                                    <div class="col-lg-1">	
                                        <input type="radio" id="sexo" name="sexo"  <?php
                                        if (isset($resultado->sexo)) {
                                            if ($resultado->sexo == 0) {
                                                echo 'checked="checked"';
                                            }
                                        }
                                        ?> />Feminino	
                                    </div>
                                </div>

                                <div class="row m-t-1">
                                    <div class="col-lg-4">							
                                        <label for="email">E-mail:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">																			
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu E-mail" required="true" value= "<?php
                                        if (isset($resultado->email)) {
                                            echo $resultado->email;
                                        }
                                        ?>" />				
                                    </div>
                                </div>

                                <div class="row m-t-1">
                                    <div class="col-lg-4">							
                                        <label for="telefone">Telefone:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">																			
                                        <input type="number" pattern="\(\d{2}\)\d{4}-\d{4}" id="telefone" name="telefone" class="form-control" placeholder="Digite seu telefone" required="true" value= "<?php
                                        if (isset($resultado->telefone)) {
                                            echo $resultado->telefone;
                                        }
                                        ?>" />			
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-mg-12 col-lg-12" style="margin-top: 1%">	
                                        <?php if (isset($_GET['codigo'])) { ?>
                                            <div class="col-xs-2 col-mg-2 col-lg-2">
                                                <input type="hidden" name="idCliente" value="<?= $_GET['codigo']; ?>" />
                                                <input class="btn btn-warning btn-block" type="submit" name="editar" value="Alterar">
                                            </div>
                                        <?php } else {
                                            ?>
                                            <div class="col-xs-2 col-mg-2 col-lg-2">												
                                                <input class="btn btn-primary btn-block" type="submit" name="insert" value="cadastrar">				
                                            </div>

                                            <div class="col-xs-2 col-mg-2 col-lg-2">
                                                <input class="btn btn-primary btn-block" type="reset" name="limpar" value="limpar">				
                                            </div>
                                        <?php } ?>
                                        <div class="col-xs-2 col-mg-2 col-lg-2">
                                            <a class="btn btn-info btn-block" href="clienteListar.php" name="limpar">Voltar</a>
                                        </div>
                                    </div>
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

</body>

</html>
