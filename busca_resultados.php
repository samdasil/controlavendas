<?php 

// Connect to database.
require_once './conexao.php';
 
// Seleciona todos os campos da tabela ordenador pelo id
$sql = "select * from $table order by id";

?>
<!-- Main Content -->
<div class="page-wrapper">

    <div class="container pt-30">
        
        <!-- Alertas do sistema -->
        <?php require_once 'alertas.php'; ?>
        
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

                                <?php // inicio da tabela em PHP

                                    echo '<table id="myTable1" class="table table-hover display  pb-50">';
                                        
                                        // cabeçalho da tabela
                                        echo "<thead>";
                                            
                                            echo "<tr>";

                                                $sth = $pdo->query($sql);
                                                
                                                $num_campos = num_campos($table,$pdo);
                                                
                                                /*if($num_campos > 8){
                                                    $num_campos -= $num_campos - 8;
                                                }*/

                                                for($x=0;$x<$num_campos;$x++){

                                                    $campo = nome_campo($sth, $x);
                                            
                                                    echo "<th>".ucfirst($campo)."</th>";
                                            
                                                }

                                                echo "<th>Ação</th>";
                                                echo "<th></th>";
                                                
                                            echo "</tr>";
                                        echo "</thead>";

                                        // rodape da tabela
                                        echo "<tfoot>";
                                            echo "<tr>";
                                                
                                                $sth = $pdo->query($sql);
                                                
                                                $num_campos = num_campos($table,$pdo);
                                                
                                                /*if($num_campos > 8){
                                                    $num_campos -= $num_campos - 8;
                                                }*/

                                                for($x=0;$x<$num_campos;$x++){

                                                    $campo = nome_campo($sth, $x);
                                            
                                                    echo "<th>".ucfirst($campo)."</th>";
                                            
                                                }

                                                echo "<th>Ação</th>";
                                                echo "<th></th>";

                                            echo "</tr>";
                                        echo "</tfoot>";
                                    
                                        // corpo da tabela
                                        echo "<tbody>";
                                                
                                            /*if($num_campos > 8){
                                                $num_campos -= $num_campos - 8;
                                            }*/

                                            // Loop através dos registros recebidos
                                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)){

                                                echo "<tr>";
                                                    
                                                    for($x=0;$x<$num_campos;$x++){

                                                        $campo = nome_campo($sth, $x);
                                                        
                                                        if(($table == "produto") && ($campo == "imagem")){

                                                            echo "<td><img src='assets/img/".$row[$campo]."' class='img-thumbnail'></td>";    
                                                        
                                                        }else if($campo == "senha"){
                                                        
                                                            echo "<td>".base64_encode($row[$campo])."</td>";
                                                        
                                                        }else{

                                                            echo "<td>".$row[$campo]."</td>";

                                                        }

                                                    }
                                                    if($table == "venda"){
                                                        echo "<td><a href='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($row['id'])."'><button class='btn btn-primary btn-icon-anim'><i class='fa fa-pencil'></i></button></a></td>";
                                                    }else{
                                                        echo "<td><a href='atualizar.php?t=".base64_encode($table)."&id=".$row['id']."'><button class='btn btn-primary btn-icon-anim'><i class='fa fa-pencil'></i></button></a></td>";
                                                    echo "<td><a href='desativar.php?t=".base64_encode($table)."&id=".$row['id']."'><button class='btn btn-danger btn-icon-anim'><i class='fa fa-times'></i></button></a></td>";
                                                    }
                                                    
                                                echo "</tr>";
                                            }

                                        echo '</tbody>';    
                                    
                                    echo '</table>';
                                
                                // /Fim da tabela em PHP>
                                ?> 
                                

                            </div>
                            <!-- /Table-wrap -->

                        </div>
                        <!-- /Panel-body -->

                    </div>
                    <!-- /Panel-wrapper -->

                </div>
                <!-- /Panel -->

            </div>
            <!-- /Col-sm-12 -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->