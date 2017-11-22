        <div class="container professor_formulario">
            <?php echo validation_errors(); ?>
            <?php echo form_open('formularioProfessor'); ?>
              <h1>Entre com os dados:</h1>
              <div class="form-group">
                <label for="inputEmail">Endereço de email</label>
                <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="seuemail@email.com">
              </div>
              <div class="d-inline">
                    <div class="form-check float-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="enable-show">
                            Mostrar Senha
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" class="form-control" name="senha" value="<?php echo set_value('senha'); ?>" id="password-input">
                      </div>
                </div>
              <button type="submit" class="btn btn-success btn-lg">Entrar</button>
            </form> 
        </div>



