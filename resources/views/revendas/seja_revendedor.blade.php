@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Torne-se um revendedor</h1>
    <p class="lead">Você poderá publicar anúncios com destaque e ter uma página no site.</p>
  </div>
</div>
<div class="container">
  <form method="post" id="cadastro-revenda" action="{{route('store_revenda')}}">
    {{csrf_field()}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mt-2">Informações principais</h3>
        <hr>
        <div class="form-group">
          <label for="razaosocial">Razão social</label>
          <input type="text" class="form-control" name="razaosocial" id="razaosocial" placeholder="Digite a razão social da revenda" required>
        </div>
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="nomefantasia">Nome fantasia</label>
          <input type="text" class="form-control" name="nomefantasia" id="nomefantasia" placeholder="Este nome será exibido" required>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da revenda" required>
          </div>
        </div>
        <h3 class="mt-2">Endereço</h3>
        <hr>
        @include('enderecos.form')
      </div>
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
    </div>
    <input type="hidden" name="plano" id="plano" required>
    <button type="button" class="btn btn-primary mt-3" id="cadastrar_revenda">Cadastrar revenda</button>
  </form>
</div>
</div>
@endsection
