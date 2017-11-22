        <div class="container aluno text-center">
            <figure class="figure">
              <img src="<?= base_url() . "assets/images/".$this->session->userdata('nivel').".png"?>" class="figure-img img-fluid rounded" alt="Nivel atual">
            </figure>
            <h3>Bem vindo <?= $this->session->userdata('nome')?></h3>
            <img src="<?= base_url() . "assets/images/sistemareputacao.png"?>" class="img-fluid" alt="Sistema de reputação">
            <div class="progress barra" style="width: 80%">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: <?= $this->session->userdata('pontos_por')?>%" aria-valuenow="<?= $this->session->userdata('pontos')?>" aria-valuemin="0" aria-valuemax="1900"></div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pontos</th>
                  <th scope="col">Nivel Atual</th>
                  <th scope="col">Próximo Nivel</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><?= $this->session->userdata('pontos')?> / <?= $this->session->userdata('pontos_nes')?></td>
                  <td><?= $this->session->userdata('nivel')?></td>
                  <td><?= $this->session->userdata('nivel_prox')?></td>
                </tr>
              </tbody>
            </table>
        </div>