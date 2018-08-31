@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Consulta FIPE</h1>
    <p class="lead">Consulte o preço do seu veículo com base na tebela FIPE.</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          @if(!Auth::check())
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" required placeholder="Digite o seu nome">
            </div>
            <div class="form-group">
              <label for="nome">E-mail</label>
              <input type="email" name="email" class="form-control" required placeholder="Digite o seu e-mail">
            </div>
          @endif
          <div class="form-group">
            <label for="marca">Marca do veículo</label>
            <select class="form-control select2" id="marca_fipe" name="marca">
              <option value="">Selecione a marca...</option>
            </select>
          </div>
          <div class="form-group">
            <label for="modelo">Modelo do veículo</label>
            <select class="form-control select2" id="modelo_fipe" name="modelo">
              <option value="">Selecione o modelo...</option>
            </select>
          </div>
          <div class="form-group">
            <label for="marca">Versão do veículo</label>
            <select class="form-control select2" id="versao_fipe" name="versao">
              <option value="">Selecione a versão...</option>
            </select>
          </div>
          <button type="button"  id="buscar_fipe" class="btn btn-primary">Consultar tabela FIPE</button>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div id="result" class="card d-none">
        <div class="card-body">
          <h4 class="card-title">Resultado - Consulta Tabela FIPE</h4>
          <h5 class="card-title" ><span id="preco_fipe" style="font-size: 30px;" class="badge badge-success"></span></h5>
          <h6 class="card-subtitle mb-2 text-muted" id="veiculo_fipe">Nome do veículo</h6>
          <div class="row">
            <div id="combustivel" class="col-sm-6">

            </div>
            <div id="marca" class="col-sm-6">

            </div>
            <div id="ano" class="col-sm-6">

            </div>
            <div id="referencia" class="col-sm-6">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
