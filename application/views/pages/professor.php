        <div class="container professor text-center">
        	<h3>Gráfico área do fluxo:</h3>
        	<script type="text/javascript" src="<?= base_url() . 'assets/js/loader.js'?>"></script>
            <script type="text/javascript">
                 google.charts.load('current', {packages: ['corechart', 'line']});
                 google.charts.setOnLoadCallback(drawBackgroundColor);
    
                 function drawBackgroundColor() {
                       var data = new google.visualization.DataTable();
                       data.addColumn('number', 'X');
                       data.addColumn('number', 'PF');
    
                       data.addRows([
                         [0, 0], [<?= $this->session->userdata('fluxo_habilidade')?>, <?= $this->session->userdata('fluxo_desafio')?>], [4,4]
                       ]);
    
                       var options = {
                         hAxis: {
                           title: 'Habilidade'
                         },
                         vAxis: {
                           title: 'Desafio'
                         },
                         backgroundColor: '#f1f8e9',
                       	 pointSize: 5
                       };
    
                       var chart = new google.visualization.LineChart(document.getElementById('chart_fluxo'));
                       chart.draw(data, options);
                 }
             </script>
  			 <div id="chart_fluxo"></div>
  			 <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Aluno</th>
                  <th scope="col">Ponto</th>
                  <th scope="col">Nivel</th>
                </tr>
              </thead>
                <?php
                $cont = 0;
                $media = 0;
                foreach($this->session->userdata('prof_alunos') AS $aluno){
                    $media += $aluno['ponto'];
                    echo('<tr>');
                    echo('<th scope="row">'.$cont.'</th>');
                    echo('<td>'.$aluno['nome'].'</td>');
                    echo('<td>'.$aluno['pontos'].'</td>');
                    echo('<td>'.$aluno['nivel'].'</td>');
                    echo('</tr>');
                    $cont++;
                }
                echo('<tr>');
                echo('<th scope="row" title = "Média">M</th>');
                echo('<td></td>');
                echo('<td>'.($media/$cont).'</td>');
                echo('<td></td>');
                echo('</tr>');
                ?>
              </tbody>
            </table>
            <a href="<?= base_url() . "attDados"?>">
                <button type="button" class="btn btn-warning btn-lg">Atualizar Dados</button>
            </a>
        </div>