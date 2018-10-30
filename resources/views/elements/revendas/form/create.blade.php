<form method="post" id="cadastro-revenda" action="{{isset($revenda)?route('update_revenda', $revenda->id):route('store_revenda')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="row">
    <div class="col-sm-{{isset($revenda)?'12':'6'}}">
      <h3 class="mt-2">Configurações</h3>
      <hr>
      <div class="form-group">
      @if(isset($revenda) && $revenda->capa)
          <img src="{{Storage::url($revenda->capa)}}" class="thumbnail" height="50%" width="50%">
      @endif
      </div>
      <div class="form-group">
        <label for="capa">Capa da sua página ( 1200x250 )</label>
        <input id="capa" type="file" name="capa" class="form-control" accept="image/*">
        @if ($errors->has('capa'))
            <span class="help-block">
                <strong>{{ $errors->first('capa') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
      @if(isset($revenda) && $revenda->logo)
          <img src="{{Storage::url($revenda->logo)}}" class="thumbnail" height="130" width="130">
      @endif
      </div>
      <div class="form-group">
        <label for="logo">Logo da sua revenda</label>
        <input id="logo" type="file" name="logo" class="form-control" accept="image/*">
        @if ($errors->has('logo'))
            <span class="help-block">
                <strong>{{ $errors->first('logo') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="razaosocial">Razão social</label>
        <input value="{{isset($revenda)?$revenda->razaosocial:''}}" type="text" class="form-control" name="razaosocial" id="razaosocial" placeholder="Digite a razão social da revenda" required>
        @if ($errors->has('razaosocial'))
            <span class="help-block">
                <strong>{{ $errors->first('razaosocial') }}</strong>
            </span>
        @endif
      </div>
      <input type="hidden" name="user" value="{{isset($revenda)?$revenda->user:''}}">
      <div class="form-group">
        <label for="nomefantasia">Nome fantasia</label>
        <input value="{{isset($revenda)?$revenda->nomefantasia:''}}" type="text" class="form-control" name="nomefantasia" id="nomefantasia" placeholder="Este nome será exibido" required>
        @if ($errors->has('nomefantasia'))
            <span class="help-block">
                <strong>{{ $errors->first('nomefantasia') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="cnpj">CNPJ</label>
          <input value="{{isset($revenda)?$revenda->cnpj:''}}" type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da revenda" required>
          @if ($errors->has('cnpj'))
              <span class="help-block">
                  <strong>{{ $errors->first('cnpj') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <h3 class="mt-2">Endereço</h3>
      <hr>
      @if(isset($revenda))
        @include('enderecos.form', ['endereco'=> $revenda->end])
      @else
        @include('enderecos.form')
      @endif
    </div>
    @if(!isset($revenda))
    <div class="col-sm-6">
      <h3 class="mt-2">Planos</h3>
      <hr>
      <div class="row m-auto">
        @foreach(App\Plano::all() as $plano)
        <button type="button" value="{{$plano->id}}" class="card text-left text-dark bg-light mb-3 col-sm-6 plano">
          <div class="card-body">
            <h4 class="card-title">{{$plano->nome}}</h4>
            <span class="badge badge-success mb-2" style="font-size: 20px;">R${{$plano->preco}}</span>
            <p class="card-text">{{$plano->descricao}}</p>
          </div>
        </button>
        @endforeach
      </div>
    </div>
    @endif
  </div>
  @if(!isset($revenda))
    <input type="hidden" name="plano" id="plano" required>
  @endif
  <button type="submit" class="btn btn-primary mt-3" id="{{isset($revenda)?'':'cadastrar_revenda'}}">{{isset($revenda)?'Atualizar revenda':'Cadastrar revenda'}}</button>
</form>
