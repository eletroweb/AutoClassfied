<div class="row">
  <div class="col-sm-12">
    <a href="/anuncios/{{$anuncio->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="row">
        <div class="col-sm-3">
          <img src="http://via.placeholder.com/150x150" width="150" alt="{{$anuncio->nome}}">  
        </div>
        <div class="col-sm-9">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$anuncio->nome}}</h5>
            <small>{{$anuncio->created_at->format('d/m/Y H:i')}}</small>
          </div>
          <p class="mb-1">{{$anuncio->descricao}}</p>
          <small>{{App\User::find($anuncio->user)->name}}</small>  
        </div>  
      </div>
    </a>    
  </div>
</div>

