
<?php
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = num_campos($table,$pdo);
?>
    
    
    <input type="hidden" name="method" value="enviar"/>
    
    <div class="row">
        <div class="form-group col-md-3">
            <label class="control-label mb-10">Perfil*</label>
            <div class="input-group">    
                <select name="tipo" class="form-control valid">
                    <option value="" disabled selected> Selecione ... </option>
                    <?php 
                        $sql = "SELECT * FROM tipousuario";
                        $res = $pdo->query($sql);
                        while($row = $res->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['id']."> ".$row['descricao']." </option>";    
                    ?>
                    <?php } ?>                    
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Nome*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="nome" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Login*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="login" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user-follow"></i></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Senha* (5 catacteres)</label>
            <div class="input-group">
                <input type="password" placeholder=""  value="" name="senha" class="form-control" required>
                <div class="input-group-addon"><i class="icon-key"></i></div>
            </div>
        </div>
    </div>
    
    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Confirmar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


