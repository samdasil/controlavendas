<?php 
require_once('./cabecalho.php');
require_once('./conexao.php');

// Recebido da busca_resultados.php
$id    = $_GET['id'];
$table = base64_decode($_GET['t']);

// Mostrar nome da tabela
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
                            <h6 class="panel-title txt-dark">Exclusão de <?php echo ucfirst($table); ?></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">

                                    
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <h3>Deseja realmente desativá-lo?</h3><br>
                                            
                                            <?php

                                            $sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
                                            $sth->bindValue(':id', $id, PDO::PARAM_STR);
                                            $sth->execute();

                                            $reg = $sth->fetch(PDO::FETCH_OBJ);

                                                $sql = "SELECT * FROM $table";
                                                $sth = $pdo->query($sql);

                                                $num_campos = num_campos($table,$pdo);
                                                    
                                                for($x=0;$x<$num_campos;$x++){
                                                    $campo = nome_campo($sth, $x);
                                                    ?>
                                                    <!-- Mostrar nomes de campos e respectivos valores-->
                                                    <strong><?=ucfirst($campo)?>:</strong> <?=$reg->$campo?><br>
                                                    <?php
                                                }
                                            ?>
                                                    <br>
                                                    <form method="post" action="">
                                                        <input name="id" type="hidden" value="<?=$id?>">
                                                        <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
                                                        <input name="voltar" class="btn btn-warning" type="button" onclick="location='<?php echo ucfirst($table); ?>.php'" value="Voltar">
                                                    </form>
                                                    </div>
                                                <div>
                                            </div>

<?php
require_once('./rodape.php');
require_once('./desativarbd.php');
?>
