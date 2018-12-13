<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="Content-Type">
        
        <title>LeL</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
        <link rel="icon" href="#" type="image/x-icon">

        <!-- Data table CSS -->
        <link href="assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">

        <!-- Toast CSS -->
        <link href="assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

        <!-- Morris Charts CSS -->
        <link href="assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />

        <link href="assets/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css">

        <!-- select2 CSS -->
        <link href="assets/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Chartist CSS -->
        <link href="assets/vendors/bower_components/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />

        <!-- vector map CSS -->
        <link href="assets/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
<body>

        <!-- Preloader -->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!-- /Preloader -->
        <div class="wrapper theme-2-active navbar-top-light horizontal-nav">
            <!-- Top Menu Items -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="nav-wrap">
                    <div class="mobile-only-brand pull-left">
                        <div class="nav-header pull-left">
                            <div class="logo-wrap">
                                <a href="principal.php">
                                    <img class="brand-img" src="assets/img/logo.png" alt="brand" />
                                    <span class="brand-text"><img  src="assets/img/logo.png" alt="brand"/></span>
                                </a>
                            </div>
                        </div>
                        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
                    </div>
                </div>
            </nav>
            <!-- /Top Menu Items -->

            <!-- Left Sidebar Menu -->
            <div class="fixed-sidebar-left">
                <ul class="nav navbar-nav side-nav nicescroll-bar">
                    <li class="navigation-header">
                    </li>
                    <li>
                        <a href="principal.php" data-toggle="collapse" data-target="#dashboard_dr">
                            <div class="pull-left"><i class="ti-pulse mr-20"></i><span class="right-nav-text">Principal</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!--<%if(session.getAttribute("fun_tipo_funcionario_id").equals("Administrativo")  || session.getAttribute("fun_tipo_funcionario_id").equals("Gestor")){%>-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-settings  mr-20"></i><span class="right-nav-text">Gerenciar</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                        <ul id="ecom_dr" class="collapse collapse-level-1">
                            <li>
                                <a href="cliente.php">Clientes</a>
                            </li>
                            <li>
                                <a href="funcionario.php">Funcionários</a>
                            </li>
                            <li>
                                <a href="produto.php">Produtos</a>
                            </li>
                            <li>
                                <a href="venda.php">Vendas</a>
                            </li>
                            <li>
                                <a href="categoria.php">Categorias</a>
                            </li>
                            <li>
                                <a href="despesa.php">Despesas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="venda.php" data-toggle="collapse" data-target="#ecom_dr">
                            <div class="pull-left"><i class="ti-money mr-20"></i><span class="right-nav-text">Vendas</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!--<% } %>
                    
                    <%if(session.getAttribute("fun_tipo_funcionario_id").equals("Administrativo") || session.getAttribute("fun_tipo_funcionario_id").equals("Coletor")){%>-->
                    <li>
                        <a href="inserir.php?t=<?php base64_encode("venda");?>" data-toggle="collapse" data-target="#ecom_dr">
                            <div class="pull-left"><i class="ti-plus mr-20"></i><span class="right-nav-text">Realizar Venda</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!--<% } %>
                    <%if(session.getAttribute("fun_tipo_funcionario_id").equals("Gestor")){%>-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-pie-chart  mr-20"></i><span class="right-nav-text">Relatórios</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                        <ul id="ecom_dr" class="collapse collapse-level-1">
                            <li>
                                <a href="venda.php">Vendas Realizadas</a>
                            </li>
                            <li>
                                <a href="venda.php" target="_blank">Vendas Pendentes</a>
                            </li>
                            <li>
                                <a href="venda.php">Consulta Financeira</a>
                            </li>
                            <li>
                        </ul>
                    </li>

                    <li>
                        <a href="deslogar.php" data-toggle="collapse" data-target="#ecom_dr">
                            <div class="pull-left"><i class="ti-close mr-20"></i><span class="right-nav-text">Sair <?php echo "do ID: ".$usuario; ?></span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- /Left Sidebar Menu -->
