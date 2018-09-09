<div class="row">
  <div class="col-sm-12">
    <a href='/anuncios/{{$anuncio->getNomeFormated()}}_{{$anuncio->id}}' class="list-group-item list-group-item-action flex-column align-items-start mt-1 mb-1 {{$anuncio->patrocinado?'patrocinado':''}}">
      <div class="row">
        <div class="col-sm-5">
          @php
            //var_dump($anuncio->id);exit;
            $img_anuncio = App\AnuncioImagem::where([['anuncio', $anuncio->id]])->first();
            $url = '';
            $imagem = App\Imagem::find($img_anuncio->imagem);
            if(!$anuncio->importado){
              $url = Storage::url($imagem->url);
            }else{
              $url = $imagem->url;
            }
          @endphp
          <img src="{{$url}}" width="300" alt="{{$anuncio->nome}}">
        </div>
        <div class="col-sm-7">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$anuncio->nome}}</h5>
            <small>{{$anuncio->created_at->format('d/m/Y H:i')}}</small>
          </div>
          <h5 class="mb-1">
            <span class="badge badge-success">
              R${{number_format(substr($anuncio->valor.'0', 0, -3), 2, ",", ".")}}
            </span>
          </h5>
          <p class="mb-1">{{str_limit($anuncio->descricao, 200, '...')}}</p>
          <hr>
          <div class="row">
            <div class="col-sm-4 text-center">
              <i class="fa fa-calendar-alt fa-2x"></i><br>
              {{$anuncio->ano}}
            </div>
            <div class="col-sm-4 text-center">
              <i class="fa fa-car fa-2x"></i><br>
              {{$anuncio->getKm()==0?'Veículo 0':$anuncio->getKm()}}KM
            </div>
            <div class="col-sm-4 text-center">
              <i class="fa fa-exchange-alt fa-2x"></i><br>
              {{$anuncio->getCambio()}}
            </div>
          </div>
          <hr>
          <div class="row">
            <small class="col-sm-6 text-left">
            {{
                $anuncio->users->isRevenda()?
                $anuncio->users->isRevenda()->nomefantasia : $anuncio->users->name
            }}
            </small> 
            <small class="col-sm-6 w-100 text-right" >
              {!! $anuncio->patrocinado?'<span class="badge badge-success">Anúncio em destaque</span>':'' !!}
            </small>  
          </div>
          
        </div>
      </div>
    </a>
  </div>
</div>
