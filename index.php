<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- vector map CSS -->
        <link href="assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="assets/dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->

        <div class="wrapper  pa-0">
            <header class="sp-header">
                <div class="sp-logo-wrap pull-left">
                </div>
                <div class="clearfix"></div>
            </header>

            <?php
                if(isset($_GET['erro']) && $_GET['erro'] != null){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Senha incorreta!</strong> caso não lembre sua senha entre em contato com o suporte.
            </div>
            <?php } ?>
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h3 class="text-center txt-dark mb-10">
                                                <a href="#">
                                                    <span class="brand-text"><img  src="assets/img/cadeado.png" /></span><br>
                                                </a>Faça seu Login</h3>
                                        </div>	
                                        <div class="form-wrap">
                                            <form action="principal.php">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Login</label>
                                                    <input type="text" class="form-control" name="login" required="" id="exampleInputEmail_2">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Senha</label>
                                                    <div class="clearfix"></div>
                                                    <input type="password" class="form-control" name="senha" required="" id="exampleInputpwd_2">
                                                </div>

                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-orange btn-rounded">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="assets/dist/js/jquery.slimscroll.js"></script>

        <!-- Init JavaScript -->
        <script src="assets/dist/js/init.js"></script>
    </body>

</html>

<?php
    /*if (isset($_GET['login'])) {
        echo "<script>window.location.replace('index.php?erro=1');</script>";
    } else {
        echo "<script>window.location.replace('principal.php');</script>";
    }*/
?>
