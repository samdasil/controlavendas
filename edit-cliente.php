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
            <label class="control-label mb-10" for="exampleInputuname_2">Nome*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->nome; ?>" name="nome" class="form-control" required>
                <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-3">
            <label class="control-label mb-10" for="exampleInputuname_2">Nº Celular*</label>
            <div class="input-group">
                <input type="text" placeholder="" data-mask="(99) 99999-9999" value="<?php echo $reg->celular; ?>" name="celular" class="form-control" required>
                <div class="input-group-addon"><i class="icon-phone"></i></div>
            </div>
        </div>
        <div class="form-group col-md-7">
            <label class="control-label mb-10" for="exampleInputuname_2">E-mail*</label>
            <div class="input-group">
                <input type="email" placeholder="" value="<?php echo $reg->email; ?>" name="email" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10">Tamanho*</label>
            <div class="input-group">    
                <select name="tamanho" class="form-control valid">
                    <?php echo "<option value='".$reg->tamanho."' selected>". $reg->tamanho ."</option>"; ?> 
                    <option value="P"> P </option>
                    <option value="M"> M </option>
                    <option value="G"> G </option>
                    <option value="GG"> GG </option>
                </select>
                <div class="input-group-addon"><i class="icon-size"></i></div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="form-group col-md-3">
            <label class="control-label mb-10" for="exampleInputuname_2">CEP*</label>
            <div class="input-group">
                <input type="text" placeholder="" data-mask="99.999-999" value="<?php echo $reg->cep; ?>" name="cep" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-7">
            <label class="control-label mb-10" for="exampleInputuname_2">Rua*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->rua; ?>" name="rua" class="form-control">
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10" for="exampleInputuname_2">Nº*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->numero; ?>" name="numero" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2">
            <label class="control-label mb-10" for="exampleInputuname_2">UF</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->uf; ?>" name="uf" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <label class="control-label mb-10" for="exampleInputuname_2">Cidade</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->cidade; ?>" name="cidade" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <label class="control-label mb-10" for="exampleInputuname_2">Bairro</label>
            <div class="input-group">
                <input type="text" placeholder="" value="<?php echo $reg->bairro; ?>" name="bairro" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
    </div>
   

    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Complemento</label>
        <div class="input-group">
            <input type="text" placeholder="" value="<?php echo $reg->complemento; ?>" name="complemento" class="form-control" required>
            <div class="input-group-addon"><i class="icon-globe"></i></div>
        </div>
    </div>
    
    <input type="hidden" name="situacao" value="<?php echo $reg->situacao; ?>"/>
    
    <div><hr></div>
    
    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Login de acesso ao App</label>
        <div class="input-group">
            <input type="text" placeholder="" value="<?php echo $reg->login; ?>" name="login" class="form-control" required>
            <div class="input-group-addon"><i class="icon-user"></i></div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Senha</label>
        <div class="input-group">
            <input type="password" placeholder="" value="<?php echo $reg->senha; ?>" name="senha" class="form-control" required>
            <div class="input-group-addon"><i class="icon-key"></i></div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-primary  mr-10">Atualizar <?php echo ucfirst($table); ?></button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


