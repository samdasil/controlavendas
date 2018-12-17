<?php 
require_once('./cabecalho.php');
require_once('./conexao.php');

// Recebido da busca_resultados.php
if((isset($_GET['t'])) && ($_GET['t'] == "itemvenda")){
    $venda = $_GET['v'];    
    $table = base64_decode($_GET['t']);
}else if((isset($_GET['t'])) && ($_GET['t'] == "venda")){
    $venda = $_GET['v'];    
    $table = base64_decode($_GET['t']);
}else if(isset($_GET['id'])){
    $id    = $_GET['id'];
}

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
                    <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> deletado com sucesso.</p> 
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

                                                $next = 0;
                                                
                                                if($table == "venda"){
                                                    $venda   = $_GET['id'];
                                                    $next = 1;
                                                    $sql = "SELECT v.id, c.nome as cliente, f.nome as funcionario, v.valortotal, v.valorpago, v.parcela, v.datavenda, v.situacao FROM venda v
                                                            INNER JOIN cliente c ON c.id = v.cliente
                                                            INNER JOIN funcionario f ON f.id = v.funcionario";
                                                    $sth = $pdo->query($sql);
                                                    $reg = $sth->fetch(PDO::FETCH_OBJ);
                                                }

                                                if($table == "itemvenda"){
                                                    $venda   = $_GET['id'];
                                                    $produto = $_GET['p'];
                                                    $sth = $pdo->prepare("SELECT * from itemvenda 
                                                                        INNER JOIN produto ON id = produto
                                                                        WHERE venda = :venda AND produto = :produto");
                                                    $sth->bindValue(':venda', $venda, PDO::PARAM_INT);
                                                    $sth->bindValue(':produto', $produto, PDO::PARAM_INT);
                                                    $next = 1;
                                                    $sth->execute();

                                                    $reg = $sth->fetch(PDO::FETCH_OBJ);
                                                }
                                                
                                                if($next == 0){
                                                    $sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
                                                    $sth->bindValue(':id', $id, PDO::PARAM_STR);
                                                    $sth->execute();

                                                    $reg = $sth->fetch(PDO::FETCH_OBJ);
                                                }

                                                $sql = "SELECT * FROM $table";
                                                $sth = $pdo->query($sql);

                                                $num_campos = num_campos($table,$pdo);
                                                    
                                                for($x=0;$x<$num_campos;$x++){
                                                    $campo = nome_campo($sth, $x);
                                                    ?>
                                                    <!-- Mostrar nomes de campos e respectivos valores-->
                                                    <?php if($campo == "senha"){
                                                        continue;
                                                    }else{ ?>

                                                    <div class="col-md-3"><strong><?=ucfirst($campo)?>:</div><div></strong> <?=$reg->$campo?><br></div>
                                                    <?php }
                                                }
                                            ?>
                                                    <br>
                                                    <form method="post" action="">
                                                        
                                                        <?php if($table == "itemvenda"){?>
                                                            <input name="venda" type="hidden" value="<?=$venda?>">
                                                            <input name="produto" type="hidden" value="<?=$produto?>">
                                                        <?php }else{ ?>
                                                            <input name="id" type="hidden" value="<?=$id?>">
                                                        <?php } ?>

                                                        <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
                                                        <input name="voltar" class="btn btn-warning" type="button" onclick="location='<?php echo strtolower($table); ?>.php'" value="Voltar">
                                                    </form>
                                                    </div>
                                                <div>
                                            </div>

<?php
require_once('./rodape.php');
require_once('./desativarbd.php');
?>
