<?php
require_once('./cabecalho.php');
require_once('./conexao.php');

// Mostrar nome da Tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container pt-30">
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET["success"]) && $_GET["success"] == "adic"){ ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> adicionado com sucesso.</p> 
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Adicionar <?php echo ucfirst($table); ?></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form action="inserir.php?t=<?php echo base64_encode($table); ?>" method="post">

                                            <?php require_once "add-".$table.".php"; ?>

                                        </form>
                                    
                                    </div>
                                <div>
                        </div>

<?php
require_once('./rodape.php');
require_once('./inserirbd.php');
?>
