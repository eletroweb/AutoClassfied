<div class="container-fluid">
  <h1 class="mb-3">Últimos anúncios de veículos</h1>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-auto">
      @foreach($recentes as $r)
      <div class="carousel-item col-md-4 active">
        <div class="card">
          <a href="/anuncios/{{$r->nome}}_{{$r->id}}"><img class="card-img-top img-fluid" maxheight="200" src="{{$r->urlImagemFirst()}}" alt="{{$r->nome}}"></a>
          <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                  <h4 class="card-title"><a style="color: black;" href="/anuncios/{{$r->nome}}_{{$r->id}}">{{$r->nome}}</a></h4>
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
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
