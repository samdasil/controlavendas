
<?php
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = num_campos($table,$pdo);
?>
    
    
    <input type="hidden" name="method" value="enviar"/>
    
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
        <div class="form-group col-md-3">
            <label class="control-label mb-10" for="exampleInputuname_2">Nº Celular*</label>
            <div class="input-group">
                <input type="text" placeholder="" data-mask="(99) 99999-9999" value="" name="celular" class="form-control" required>
                <div class="input-group-addon"><i class="icon-phone"></i></div>
            </div>
        </div>
        <div class="form-group col-md-7">
            <label class="control-label mb-10" for="exampleInputuname_2">E-mail*</label>
            <div class="input-group">
                <input type="email" placeholder="" value="" name="email" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
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
    </div>
   
    <div class="row">
        <div class="form-group col-md-3">
            <label class="control-label mb-10" for="exampleInputuname_2">CEP*</label>
            <div class="input-group">
                <input type="text" placeholder="" data-mask="99.999-999" value="" name="cep" class="form-control" required>
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-7">
            <label class="control-label mb-10" for="exampleInputuname_2">Rua*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="rua" class="form-control">
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label class="control-label mb-10" for="exampleInputuname_2">Nº*</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="numero" class="form-control" >
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2">
            <label class="control-label mb-10" for="exampleInputuname_2">UF</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="uf" class="form-control" >
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <label class="control-label mb-10" for="exampleInputuname_2">Cidade</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="cidade" class="form-control" >
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
        <div class="form-group col-md-5">
            <label class="control-label mb-10" for="exampleInputuname_2">Bairro</label>
            <div class="input-group">
                <input type="text" placeholder="" value="" name="bairro" class="form-control" >
                <div class="input-group-addon"><i class="icon-globe"></i></div>
            </div>
        </div>
    </div>
   

    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Complemento</label>
        <div class="input-group">
            <input type="text" placeholder="" value="" name="complemento" class="form-control" >
            <div class="input-group-addon"><i class="icon-globe"></i></div>
        </div>
    </div>
    
    <input type="hidden" name="situacao" value="ativo"/>
    <div><hr></div>
    
    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Login de acesso ao App</label>
        <div class="input-group">
            <input type="text" placeholder="" value="" name="login" class="form-control" required>
            <div class="input-group-addon"><i class="icon-user"></i></div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label mb-10" for="exampleInputuname_2">Senha</label>
        <div class="input-group">
            <input type="password" placeholder="" value="" name="senha" class="form-control" required>
            <div class="input-group-addon"><i class="icon-key"></i></div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" name="enviar" class="btn btn-success  mr-10">Confirmar</button>
        <a href="<?php echo $table; ?>.php"><button type="button" class="btn btn-warning  mr-10">Cancelar</button></a>
    </div>


