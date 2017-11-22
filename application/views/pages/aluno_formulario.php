        <div class="container aluno_formulario">
            <?php echo validation_errors(); ?>
            <?php echo form_open('formularioAluno'); ?>
                <div class="text-center">
                    <h1>Informe seu RA</h1>
                    <div class="form-group">
                        <label for="inputRA" class="col-form-label"></label>
                        <input type="text" id="CPF" class="form-control form-control-lg text-center" name="ra" value="<?php echo set_value('ra'); ?>" size="20">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Consultar</button>
                </div>                
            </form>
        </div>



