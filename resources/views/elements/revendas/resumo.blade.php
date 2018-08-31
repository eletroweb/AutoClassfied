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
</div>
