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
                                        <form action="atualizar.php?t=<?php echo base64_encode($table); ?>" method="post">
                                            <input type="hidden" name="method" value="enviar"/>

                                            <?php
                                                $sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
                                                $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um único bindValue
                                                $sth->execute();

                                                $reg = $sth->fetch(PDO::FETCH_OBJ);

                                                $num_campos = num_campos($table,$pdo);
                                                        
                                                for($x=0;$x<$num_campos;$x++){
                                                    $campo = nome_campo($sth, $x);
                                            ?>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputuname_2"><?php echo ucfirst($campo); ?>*</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="" value="<?php echo $reg->$campo; ?>" name="<?php echo $campo; ?>" class="form-control" required>
                                                            <div class="input-group-addon"><i class=""></i></div>
                                                        </div>
                                                    </div>
                                            <?php
                                            }
                                            ?>
                                                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                                                        <div class="form-group mb-0">
                                                            <button type="submit" name="enviar" class="btn btn-primary  mr-10">Atualizar <?php echo ucfirst($table); ?></button>
                                                            <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
                                                        </div>
                                                    </form>
                                                    </div>
                                                <div>
                                            </div>

<?php
require_once('./rodape.php');
require_once('./atualizarbd.php');
?>

