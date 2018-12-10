<!-- ********************************************************************************************************************************** -->

<!-- alerta de atualização -->
<?php if (isset($_GET["success"]) && $_GET["success"] == "edit") { ?>

    <div class="alert alert-success alert-dismissable">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> alterado com sucesso.</p> 

        <div class="clearfix"></div>

    </div>

<?php } ?>
<!-- alerta de atualização -->

<!-- ********************************************************************************************************************************** -->

<!-- alerta de ativação -->
<?php if (isset($_GET["success"]) && $_GET["success"] == "ativ") { ?>

    <div class="alert alert-success alert-dismissable">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> ativado com sucesso.</p> 

        <div class="clearfix"></div>

    </div>

<?php } ?>
<!-- /alerta de ativação -->

<!-- ********************************************************************************************************************************** -->

<!-- alerta de exclusão -->
<?php if (isset($_GET["success"]) && $_GET["success"] == "delt") { ?>

    <div class="alert alert-success alert-dismissable">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> excluído com sucesso.</p> 

        <div class="clearfix"></div>

    </div>

<?php } ?>
<!-- /alerta de exclusão -->

<!-- ********************************************************************************************************************************** -->