<div class="row">
  <div class="col-sm-12">
    <h2>Informações principais</h2>
    <hr>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$revenda->anunciosPublicados()->count()}} anúncios publicados</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$revenda->anunciosAtivos()->count()}} destes anúncios estão ativos no momento.</h6>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$revenda->totalVisualizacoesAnuncios()->first()->visualizacoes}} visualizações</h5>
        <h6 class="card-subtitle mb-2 text-muted">Total de visualizações dos seus anúncios</h6>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <hr>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
    var dados = [];
    $.ajax({
      url: '/revenda/rel/chartjs',
      type: 'get',
      dataType: 'json',
      data: {revenda: {{$revenda->id}} },
      success: function(data){
        $.each(data, function(key, value){
          dados.push(value.visualizacoes);
        });
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                datasets: [{
                    label: 'Visualizações da sua revenda',
                    data: dados,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
      }
    });
    </script>
  </div>
</div>
