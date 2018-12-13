<?php 

// Connect to database.
require_once './conexao.php';

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
                        

                                <?php 

                                    echo '<table id="myTable1" class="table table-hover display  pb-50">';
                                    echo "<thead>";                                            
                                    echo "<tr>";
                                    echo "<th></th>";
                                    echo "<th></th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tfoot>";                                            
                                    echo "<tr>";
                                    echo "<th></th>";
                                    echo "<th></th>";
                                    echo "</tr>";
                                    echo "</tfoot>";
                                    // Seleciona todos os campos da tabela ordenador pelo id
                                    $sql = "SELECT *, p.id as cod, p.descricao as detalhe, c.descricao as categoria FROM produto p
                                            JOIN categoria c ON c.id = p.categoria
                                            ORDER BY cod";
    
                                    $sth = $pdo->query($sql);
                                    //$campo = $sth->fetch(PDO::FETCH_ASSOC);
                                    //$num_campos = num_campos($table,$pdo);
                                    
                                ?> 

                                <?php 
                                    echo "<tbody>";
                                ?>
                                <?php // Loop através dos registros recebidos
                                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)){ 
                                        echo "<pre>";
                                        //print_r($row);
                                        echo "</pre>";

                                        echo "<tr>";
                                        echo "<td>"; ?>
                                        
                                        <div class="card" style="width: 18rem;">
                                            <img class="img-thumbnail" src="assets/img/<?php echo $row['imagem']; ?>" alt="Imagem de capa do card">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>ID          : </strong><?php echo $row['cod']; ?></h5>
                                                <p class="card-text"><strong>Descrição   : </strong><?php echo $row['detalhe']; ?></p>
                                                <p class="card-text"><strong>SKU         : </strong><?php echo $row['sku']; ?></p>
                                                <p class="card-text"><strong>Tamanho     : </strong><?php echo $row['tamanho']; ?></p>
                                                <p class="card-text"><strong>Categoria   : </strong><?php echo $row['categoria']; ?></p>
                                                <p class="card-text"><strong>Valor Compra: </strong><?php echo $row['valorcompra']; ?></p>
                                                <p class="card-text"><strong>Valor Venda : </strong><?php echo $row['valorvenda']; ?></p>
                                                <p class="card-text"><strong>Estoque     : </strong><?php echo $row['quantidade']; ?></p>
                                                <!--<a href="#" class="btn btn-primary">Visitar</a>-->
                                            </div>
                                        </div>
                                <?php   echo "</td>";
                                        echo "<td>";
                                        echo "<a href='atualizar.php?t=".base64_encode($table)."&id=".$row['cod']."'><button class='btn btn-primary btn-icon-anim'><i class='fa fa-pencil'></i></button></a>
                                             <a href='desativar.php?t=".base64_encode($table)."&id=".$row['cod']."'><button class='btn btn-danger btn-icon-anim'><i class='fa fa-times'></i></button></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo '</table>';
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

<?php
    require_once './rodape.php';
?>
