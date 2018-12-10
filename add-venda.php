
<?php
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = num_campos($table,$pdo);
?>
    
    
    <input type="hidden" name="method" value="enviar"/>

    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label mb-10">Cliente*</label>
            <div class="input-group">    
                <select name="cliente" class="form-control valid">
                    <option value="" disabled selected> Selecione ... </option>
                    <?php 
                        $sql = "SELECT * FROM cliente";
                        $res = $pdo->query($sql);
                        while($row = $res->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$row['id']."'> ".$row['nome']." </option>";    
                    ?>
                    <?php } ?>                    
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label mb-10">Funcionário*</label>
            <div class="input-group">    
                <select name="funcionario" class="form-control valid">
                    <option value="" disabled selected> Selecione ... </option>
                    <?php 
                        $sql = "SELECT * FROM funcionario WHERE tipo IN(1,2)";
                        $res = $pdo->query($sql);
                        while($row = $res->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$row['id']."'> ".$row['nome']." </option>";    
                    ?>
                    <?php } ?>                    
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
    </div>

        <input type="hidden" name="valortotal" value="0" >
        <input type="hidden" name="valorpago" value="0" >
        <input type="hidden" name="parcela" value="0" >
        <input type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>" >
        <input type="hidden" name="situacao" value="aberta" >

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Avançar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


