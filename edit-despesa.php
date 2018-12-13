<?php

    $sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um único bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
?>
    
    
    <input type="hidden" name="method" value="enviar"/>
    <input type="hidden" name ="id" value="<?php echo $reg->id; ?>"/>
    
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
        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Data*</label>
            <div class="input-group">
                <input type="date" placeholder="" value="<?php echo $reg->data; ?>" name="data" class="form-control" required>
                <div class="input-group-addon"><i class="icon-time"></i></div>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label class="control-label mb-10" for="exampleInputuname_2">Valor (R$)*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->valor; ?>" name="valor" class="form-control" required>
                <div class="input-group-addon"><i class="icon-dollar"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label mb-10" for="exampleInputuname_2">Observação*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->observacao; ?>" name="observacao" class="form-control" required>
                <div class="input-group-addon"><i class="icon-pencil"></i></div>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-primary  mr-10">Atualizar <?php echo ucfirst($table); ?></button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


