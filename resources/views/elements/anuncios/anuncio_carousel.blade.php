<div class="carousel-item col-md-4 active">
  <div class="card">
    <a href="{{$r->getUrl()}}"><img class="card-img-top img-fluid" height="200" src="{{$r->urlImagemFirst()}}" alt="{{$r->nome}}"></a>
    <div class="card-body">
      <div class="row">
          <div class="col-sm-12 mb-3">
            <h4 class="card-title"><a style="color: black;" href="{{$r->getUrl()}}">{{$r->titulo}}</a></h4>
          </div>
          <div class="col-sm-12">
            <span class="badge badge-success mb-1" style="font-size: 14px;">R${{number_format(substr($r->valor.'0', 0, -3), 2, ",", ".")}}</span>
          </div>
      </div>
      <p class="card-text">{{str_limit($r->descricao, 200, '...')}}</p>
      <p class="card-text"><small class="text-muted">Criado em {{$r->created_at->format('d/m/Y')}}</small></p>
  </div>
  </div>
</div>
