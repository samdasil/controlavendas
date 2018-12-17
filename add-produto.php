    
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
                <input type="text" placeholder="" value="" name="descricao" class="form-control" autofocus required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-4">
            <label class="control-label mb-10" for="exampleInputuname_2">SKU*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="sku" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user-follow"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10">Tamanho*</label>
            <div class="input-group">    
                <select name="tamanho" class="form-control valid">
                    <option value="" disabled selected> Selecione ... </option>
                    <option value="P"> P </option>
                    <option value="M"> M </option>
                    <option value="G"> G </option>
                    <option value="GG"> GG </option>
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10" for="exampleInputuname_2">Quantidade*</label>
            <div class="input-group">
                <input type="number" placeholder="" value="" min='1' name="quantidade" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label mb-10">Categoria*</label>
            <div class="input-group">    
                <select name="categoria" class="form-control valid">
                    <option value="" disabled selected> Selecione ... </option>
                    <?php 
                        $sql = "SELECT * FROM categoria";
                        $res = $pdo->query($sql);
                        while($row = $res->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$row['id']."'> ".$row['descricao']." </option>";    
                    ?>
                    <?php } ?>                    
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Valor de Compra (R$)*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="valorcompra" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Valor de Venda (R$)*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="valorvenda" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Observação</label>
            
                <textarea type="text" placeholder="" value="" cols="2" rows="5" name="observacao" class="form-control" ></textarea>
            
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Imagem</label>
            <div class="input-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                <input type="file" name="imagem" />
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Confirmar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


