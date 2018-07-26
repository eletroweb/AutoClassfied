<div class="row">
  <div class="col-sm-12">
    <a href="/anuncios/{{$anuncio->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="row">
        <div class="col-sm-3">
          @php
            $url = App\AnuncioImagem::where([['anuncio', $anuncio->id], ['first', true]])->first()->url;
            if(!$anuncio->importado){
              $url = Storage::url($url);
            }
          @endphp
          <img src="{{$url}}" width="150" alt="{{$anuncio->nome}}">
        </div>
        <div class="col-sm-9">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$anuncio->nome}}</h5>

            <small>{{$anuncio->created_at->format('d/m/Y H:i')}}</small>
          </div>
          <h5 class="mb-1"><span class="badge badge-success">R${{number_format(substr($anuncio->valor.'0', 0, -3), 2, ",", ".")}}</span></h5>
          <p class="mb-1">{{str_limit($anuncio->descricao, 200, '...')}}</p>
          <small>{{App\User::find($anuncio->user)->name}}</small>
        </div>
      </div>
    </a>
  </div>
</div>
