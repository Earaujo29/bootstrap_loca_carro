<?php
include_once '../../ultilidades/validaSessao.php';
?>

<div id="wrapper">

    <!-- Navigation -->
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
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
                        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['nome'] ?>  <b class="caret"> </b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="../../Usuario/UsuarioController.php?logout=now"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="../Principal/index.php"><i class="fa fa-fw fa-home"></i> Principal</a>
                </li>

                <li>
                    <a aria-expanded="false" class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#cliente"><i class="fa fa-fw fa-users"></i> Cliente <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul style="height: 0px;" aria-expanded="false" id="cliente" class="collapse">
                        <li>
                            <a href="../Cliente/clienteCadastrar.php"><i class="fa fa-fw fa-plus-circle "></i>Novo Cliente</a>
                        </li>
                        <li>
                            <a href="../Cliente/clienteListar.php"><i class="fa fa-fw fa-list-alt"></i>Todos os Cliente</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a aria-expanded="false" class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#carro"><i class="fa fa-fw fa-film"></i> Carros <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul style="height: 0px;" aria-expanded="false" id="carro" class="collapse">
                        <li>
                            <a href="../Carro/carroGerenciar.php"><i class="fa fa-fw fa-plus-circle"></i>Novo Carro</a>
                        </li>
                        <li>
                            <a href="../Carro/carroListar.php"><i class="fa fa-fw fa-list-alt"></i>Todos os Carros</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a aria-expanded="false" class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#locacao"><i class="fa fa-money"></i> Locação <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul style="height: 0px;" aria-expanded="false" id="locacao" class="collapse">
                        <li>
                            <a href="../Locacao/locacaoCadastrar.php"><i class="fa fa-fw fa-plus-circle"></i>Nova Locação</a>
                        </li>
                        <li>
                            <a href="../Locacao/locacaoListar.php"><i class="fa fa-fw fa-list-alt"></i>Todas as Locações</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>