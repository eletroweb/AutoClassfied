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
        <div class="form-group">
          <label for="razaosocial">Razão social</label>
          <input type="text" class="form-control" name="razaosocial" id="razaosocial" placeholder="Digite a razão social da revenda">
        </div>
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="nomefantasia">Nome fantasia</label>
          <input type="text" class="form-control" name="nomefantasia" id="nomefantasia" placeholder="Este nome será exibido">
        </div>
        <div class="form-group">
          <label for="cnpj">CNPJ</label>
          <input type="text" class="form-control cnpj" name="cnpj" id="cnpj" placeholder="CNPJ da revenda">
        </div>
        @include('enderecos.form')
      </div>
      <div class="col-sm-6">
        <div class="row">
          @foreach(App\Plano::all() as $plano)
          <div class="card col-sm-6">
            <h5 class="card-header">{{$plano->nome}}</h5>
            <div class="card-body">
              <h5 class="card-title">Por apenas R${{$plano->preco}}!</h5>
              <p class="card-text">{{$plano->descricao}}</p>
              <a href="#" class="btn btn-primary">Selecionar</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" name="button">Cadastrar revenda</button>
  </form>
</div>

</div>
@endsection
