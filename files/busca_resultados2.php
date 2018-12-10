<?php 

// Connect to database.
require_once './conexao.php';
 
// Include our pagination class / library.
//require_once './paginacao.php';
 
// Seleciona todos os campos da tabela ordenador pelo id
$sql = "select * from $table";

?>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container pt-30">
        <?php if (isset($_GET["success"]) && $_GET["success"] == "edit") { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> alterado com sucesso.</p> 
            <div class="clearfix"></div>
        </div>
        <?php } ?>
        <?php if (isset($_GET["success"]) && $_GET["success"] == "ativ") { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> ativado com sucesso.</p> 
            <div class="clearfix"></div>
        </div>
        <?php } ?>
        <?php if (isset($_GET["success"]) && $_GET["success"] == "delt") { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><?php echo ucfirst($table); ?> excluído com sucesso.</p> 
            <div class="clearfix"></div>
        </div>
        <?php } ?>
        <!-- Row -->
        
        <!-- Row -->
        <a href="inserir.php?t=<?php echo base64_encode($table); ?>"><button class="btn btn-light btn-rounded btn-lable-wrap right-label"><span class="btn-text">Adicionar <?php echo ucfirst($table); ?></span> <span class="btn-label"><i class="fa fa-plus"></i> </span></button></a><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Gerenciar <?php echo $table; ?></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <?php
                                        echo '<table id="myTable1" class="table table-hover display  pb-30">';
                                        echo "<thead>";
                                        // Mostrar os rótulos dos campos
                                        echo "<tr>";
                                            $sth = $pdo->query($sql);
                                            
                                            $num_campos = num_campos($table,$pdo);
                                            
                                            for($x=0;$x<$num_campos;$x++){

                                                $campo = nome_campo($sth, $x);
                                        ?>
                                                <th><?php echo ucfirst($campo);?></th>
                                        <?php
                                            }
                                            echo "<th>Ação</th>";
                                            echo "<th></th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        
                                        echo "<tfoot>";
                                        echo "<tr>";
                                            $sth = $pdo->query($sql);
                                            
                                            $num_campos = num_campos($table,$pdo);
                                            
                                            for($x=0;$x<$num_campos;$x++){

                                                $campo = nome_campo($sth, $x);
                                        ?>
                                                <th><?php echo ucfirst($campo);?></th>
                                        <?php
                                            }
                                            echo "<th>Ação</th>";
                                            echo "<th></th>";
                                        echo "</tr>";
                                        echo "</tfoot>";
                                        echo "<tbody>";
                                            // Loop através dos registros recebidos
                                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
                                                echo "<tr>";
                                                    for($x=0;$x<$num_campos;$x++){
                                                        $campo = nome_campo($sth, $x);
                                                        ?>
                                                        <!-- Mostrar os valores dos campos-->
                                                        <td><?php echo $row[$campo];?></td>
                                                        <?php
                                                    }
                                                        ?>
                                                    <td><a href="atualizar.php?t=<?php echo base64_encode($table); ?>&id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit" title="Editar"></a></td>
                                                    <td><a href="excluir.php?t=<?php echo base64_encode($table); ?>&id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td>
                                                    
                                            <?php
                                                echo "</tr>";
                                            }
                                        echo '</tbody>';    
                                    echo '</table>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
        <!-- /Row -->

    </div>


</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->