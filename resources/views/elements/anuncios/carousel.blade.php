<div class="container-fluid">
  <h1 class="mb-3">Últimos anúncios de veículos</h1>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-auto">
      @foreach($recentes as $r)
      <div class="carousel-item col-md-4 active">
        <div class="card">
          <img class="card-img-top img-fluid" maxheight="200" src="{{Storage::url(App\AnuncioImagem::where([['anuncio', $r->id], ['first', true]])->first()->url)}}" alt="{{$r->nome}}">
          <div class="card-body">
            <h4 class="card-title">{{$r->nome}}</h4>
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
