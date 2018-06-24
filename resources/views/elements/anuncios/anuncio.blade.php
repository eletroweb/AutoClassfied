<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">{{$anuncio->titulo}}</h5>
    <small>{{$anuncio->created_at->format('d/m/Y H:i')}}</small>
  </div>
  <p class="mb-1">{{$anuncio->descricao}}</p>
  <small>{{var_dump($anuncio->user()->get())}}</small>
</a>
