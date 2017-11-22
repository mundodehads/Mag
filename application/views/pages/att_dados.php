        <div class="container att_formulario">
            <?php echo validation_errors(); ?>
            <?php echo form_open('formularioDados'); ?>
                <div class="text-center">
                    <h1>Informe os novos dados ¹:</h1>
                    <h5>Área do Fluxo:</h5>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputH" class="col-form-label">Habilidade</label>
                        	<input type="text" id="Habilidade" class="form-control form-control-lg text-center" name="habilidade" value="<?php echo set_value('habilidade'); ?>">
                        </div>
                        <div class="col">
                          <label for="inputD" class="col-form-label">Desafio</label>
                          <input type="text" id="Desafio" class="form-control form-control-lg text-center" name="desafio" value="<?php echo set_value('desafio'); ?>">
                    	</div>
                    </div>
                    <h5>Aluno:</h5>
                    <div class="form-row">
                        <div class="col">
                            <label for="inputAlunoNome" class="col-form-label">Nome</label>
                        	<input type="text" id="AlunoNome" class="form-control form-control-lg text-center" name="nome" value="<?php echo set_value('nome'); ?>">
                        </div>
                        <div class="col">
                          <label for="inputAlunoPonto" class="col-form-label">Adicionar Ponto</label>
                          <input type="text" id="AlunoPonto" class="form-control form-control-lg text-center" name="ponto" value="<?php echo set_value('ponto'); ?>">
                    	</div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Atualizar</button>
                </div>                
            </form>
            <small>¹ Ao atualizar os dados a sessão é reiniciada.</small>
        </div>



