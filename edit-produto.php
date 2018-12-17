<?php

    $sth = $pdo->prepare("SELECT *, a.id as cod  from $table a  INNER JOIN categoria c ON c.id = a.categoria WHERE a.id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um único bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    //var_dump($reg);
    
?>
    
    
    <input type="hidden" name="method" value="enviar"/>

    <div class="row">
        <div class="form-group col-md-3">
            <label class="control-label mb-10" for="exampleInputuname_2">ID*</label>
            <div class="input-group">
                <input type="number" placeholder="" value="<?php echo $reg->cod; ?>" name="id" class="form-control" readonly>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Descrição*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->descricao; ?>" name="descricao" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-4">
            <label class="control-label mb-10" for="exampleInputuname_2">SKU*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->sku; ?>" name="sku" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user-follow"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10">Tamanho*</label>
            <div class="input-group">    
                <select name="tamanho" class="form-control valid">
                <?php echo "<option value='".$reg->tamanho."' selected>". $reg->tamanho."</option>"; ?> 
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
                <input type="number" placeholder="" value="<?php echo $reg->quantidade; ?>" name="quantidade" class="form-control" readonly>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label mb-10">Categoria*</label>
            <div class="input-group">    
                <select name="categoria" class="form-control valid">
                <?php echo "<option value='".$reg->id."' selected>". $reg->descricao."</option>"; ?> 
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
                <input type="text" placeholder="" value="<?php echo $reg->valorcompra; ?>" name="valorcompra" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Valor de Venda (R$)*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->valorvenda; ?>" name="valorvenda" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Observação</label>
            
                <textarea type="text" placeholder="" value="<?php echo $reg->observacao; ?>" cols="2" rows="5" name="observacao" class="form-control" ></textarea>
            
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Imagem</label>
            <img class="img-thumbnail" src="assets/img/<?php echo $reg->imagem; ?>"/>
            <input type="hidden" name="foto" value="<?php echo $reg->imagem; ?>"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
            <input type="file" name="imagem" value="<?php echo $reg->imagem; ?>" />
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Confirmar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


