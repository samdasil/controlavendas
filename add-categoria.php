
<?php
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = num_campos($table,$pdo);
?>
    
    
    <input type="hidden" name="method" value="enviar"/>
    
    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Descrição*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="descricao" class="form-control" required autofocus>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>
    
    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Confirmar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


