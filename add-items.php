<?php
require_once('./cabecalho.php');
require_once('./conexao.php');

// Receebr o id via POST deste arquivo ou via GET
/*if(isset($_POST['enviar'])){
    $sql = "SELECT * FROM itemvenda";
    $sth = $pdo->query($sql);
   
    $table=base64_decode($_GET['t']);
    $venda=base64_decode($_GET['v']);
    echo $venda;
    echo $table;
    exit;
    $num_campos = num_campos($table,$pdo);
    require_once('./inserirbd.php');
}else
*/
if(isset($_GET['t']) && isset($_GET['v'])){
    $table=base64_decode($_GET['t']);
    $venda=base64_decode($_GET['v']);

    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = num_campos($table,$pdo);
}else{
    echo "Erro ao receber dados da abertura da venda.";
    exit;
}

// Mostrar nome da Tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>
<?php

    $sql = "select sum(valorvenda) as 'valor' from itemvenda i
    inner join produto p on p.id = produto
    inner join venda v on v.id = venda
    where venda = $venda";
    $sth = $pdo->query($sql);
    
    $valortotal = $sth->fetch(PDO::FETCH_OBJ);
    $valortotal = $valortotal->valor;
    
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
                            <h6 class="panel-title txt-dark">Adicione os itens da venda </h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form action="add-items.php?t=<?php echo base64_encode($table); ?>&v=<?php echo base64_encode($venda); ?>" method="post">
                                            <input type="hidden" name="method" value="enviar"/>
                                            
                                            <input type="hidden" name="venda" value="<?php echo $venda; ?>"/>

                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label mb-10" for="exampleInputuname_2">Informe ID do produto</label>
                                                    <div class="input-group">
                                                        <input type="text" placeholder="" value="" name="produto" class="form-control" autofocus required>
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label mb-10" for="exampleInputuname_2">Quantidade</label>
                                                    <div class="input-group">
                                                        <input type="number" placeholder="" value="" min='1' name="quantidade" class="form-control" autofocus required>
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group mb-0">
                                                <button type="submit" name="enviar" class="btn btn-primary  mr-10">Adiciona</button>
                                            </div>
                                        </form>
                                        <hr>
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="panel-title txt-dark">Lista de produtos adicionados </h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                        
                                            <div class="panel-wrapper collapse in">

                                                <div class="panel-body">
                                                
                                                    <div class="table-wrap">

                                                        <?php // inicio da tabela em PHP

                                                            echo '<table id="myTable1" class="table table-hover display  pb-30">';
                                                                
                                                                // cabeçalho da tabela
                                                                echo "<thead>";
                                                                    
                                                                    echo "<tr>";
                                                                        
                                                                        $sql = "select i.venda, i.produto, p.descricao, i.quantidade as 'qtd', p.valorvenda from itemvenda i
                                                                                inner join produto p on p.id = produto
                                                                                inner join venda v on v.id = venda
                                                                                where venda = $venda";
                                                                        
                                                                        $sth = $pdo->query($sql);
                                                                        $num_campos = $sth->columnCount();
                                                                        
                                                                        /*if($num_campos > 8){
                                                                            $num_campos -= $num_campos - 8;
                                                                        }*/
                                                                        for($x=0;$x<$num_campos;$x++){

                                                                            $campo = nome_campo($sth, $x);
                                                                    
                                                                            echo "<th>".ucfirst($campo)."</th>";
                                                                    
                                                                        }

                                                                        echo "<th>Ação</th>";
                                                                        
                                                                    echo "</tr>";
                                                                echo "</thead>";

                                                                // rodape da tabela
                                                                echo "<tfoot>";
                                                                    echo "<tr>";

                                                                        $sth = $pdo->query($sql);
                                                                        
                                                                        $num_campos = $sth->columnCount();
                                                                        /*if($num_campos > 8){
                                                                            $num_campos -= $num_campos - 8;
                                                                        }*/
                                                                        for($x=0;$x<$num_campos;$x++){

                                                                            $campo = nome_campo($sth, $x);
                                                                    
                                                                            echo "<th>".ucfirst($campo)."</th>";
                                                                    
                                                                        }

                                                                        echo "<th>Ação</th>";

                                                                    echo "</tr>";
                                                                echo "</tfoot>";
                                                            
                                                                // corpo da tabela
                                                                echo "<tbody>";
                                                                    // Loop através dos registros recebidos
                                                                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)){

                                                                        echo "<tr>";
                                                                            /*if($num_campos > 8){
                                                                                $num_campos -= $num_campos - 8;
                                                                            }*/
                                                                            for($x=0;$x<$num_campos;$x++){

                                                                                $campo = nome_campo($sth, $x);
                                                                                
                                                                                echo "<td>".$row[$campo]."</td>";
                                                                                
                                                                            }

                                                                            echo "<td><a href='desativar.php?t=".base64_encode($table)."&id=".$row['venda']."&p=".$row['produto']."'><button class='btn btn-danger btn-icon-anim'><i class='fa fa-times'></i>  Desativar</button></a></td>";
                                                                            
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
                                            <hr>
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h3 class="panel-title">Valor Total =  <?php echo $valortotal; ?></h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <hr>
                                            <input name="id" type="hidden" value="<?php echo $venda; ?>">
                                            <div class="form-group mb-0">
                                                <!--<button type="submit" name="enviar" class="btn btn-primary  mr-10">Adiciona</button>-->
                                                <a href="desativar.php?t=<?php echo base64_encode("venda") ?>&id=<?php echo $venda;?>"><button type='button' class='btn btn-warning  mr-10'>Cancelar Venda</button></a>
                                                <a href="fin-venda.php?t=<?php echo base64_encode("venda") ?>&id=<?php echo base64_encode($row['id']);?>"><button type='button' class='btn btn-success  mr-10'>Finalizar Venda</button></a>
                                            </div>
                                        </div>


                                    <div>
                                </div>

<?php

    $sql = "select * from itemvenda";
                            
    $sth = $pdo->query($sql);

require_once('./inserirbd.php');
require_once('./rodape.php');
?>