@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Encontre uma revenda</h1>
    <p class="lead">Através dos filtros você pode buscar revendas próximas à você.</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <form>
        <div class="form-group">
          <label for="nome">Nome da revenda</label>
          <input class="form-control" type="text" name="nome" value="" placeholder="Digite o nome da revenda">
        </div>
        <div class="form-group">
          <select class="form-control select2" id="estado" name="estado">
            <option value="">Selecione o estado...</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control select2" id="cidade" name="cidade">
            <option value="">Selecione a cidade...</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </form>
    </div>
    <div class="col-sm-9">
      @forelse($revendas as $r)
        <div class="card  mb-2">
          <div class="card-body">
            <h4 class="card-title">{{$r->nomefantasia}}</h4>
            <p class="card-text">{{$r->end->logradouro}}, {{$r->end->bairro}}, {{$r->end->numero}}ª
              <br>{{$r->end->cidade}} - {{$r->end->uf}}
            </p>
            <a href="{{$r->getUrl()}}" class="btn btn-primary">Acessar página</a>
          </div>
        </div>
      @empty
        <div class="alert alert-primary" role="alert">
          Nenhuma revenda foi encontrada.
        </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
