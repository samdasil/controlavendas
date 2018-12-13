<?php
require_once('./cabecalho.php');
require_once('./conexao.php');

// Receebr o id via POST deste arquivo ou via GET do busca_resultados.php
if(isset($_POST['id'])){
	$id=$_POST['id'];
}else{
	$id=$_GET['id'];
}

// Mostrar nome da Tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container pt-30">
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">

                <?php require_once 'alertas.php'; ?>
                
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Atualização de <?php echo ucfirst($table); ?></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form action="atualizar.php?t=<?php echo base64_encode($table); ?>&id=<?php echo $id ; ?>" method="post" enctype="multipart/form-data" >
                                            
                                            <?php require_once "edit-".$table.".php"; ?>

                                        </form>

                                    </div>

                                <div>

                            </div>

<?php
require_once('./rodape.php');
require_once('./atualizarbd.php');
?>

