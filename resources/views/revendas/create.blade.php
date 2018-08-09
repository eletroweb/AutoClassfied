@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Torne-se um revendedor</h1>
    <p class="lead">Você poderá publicar anúncios com destaque e ter uma página no site.</p>
  </div>
</div>
<div class="container">
  <form method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mt-2">Informações principais</h3>
        <hr>
        <div class="form-group">
          <label for="razaosocial">Razão social</label>
          <input type="text" class="form-control" name="razaosocial" id="razaosocial" placeholder="Digite a razão social da revenda">
        </div>
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="nomefantasia">Nome fantasia</label>
          <input type="text" class="form-control" name="nomefantasia" id="nomefantasia" placeholder="Este nome será exibido">
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da revenda">
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
          <div class="col-sm-12 alert alert-primary" role="alert">
            Selecione o seu plano de anúncios
          </div>
          @foreach(App\Plano::all() as $plano)
          <button type="button" value="{{$plano->id}}" class="card text-dark bg-light mb-3 col-sm-6 plano">
            <div class="card-body">
              <h4 class="card-title">{{$plano->nome}}</h4>
              <p class="card-text">{{$plano->descricao}}</p>
            </div>
          </button>
          @endforeach
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" name="button">Cadastrar revenda</button>
  </form>
</div>

</div>
@endsection
