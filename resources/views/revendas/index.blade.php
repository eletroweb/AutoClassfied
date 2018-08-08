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
          <select class="form-control select2" id="estado" name="">
            <option value="">Selecione o estado...</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control select2" id="cidade" name="">
            <option value="">Selecione a cidade...</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </form>
    </div>
    <div class="col-sm-9">
      @foreach($revendas as $r)
        <div class="card  mb-2">
          <div class="card-body">
            <h5 class="card-title">{{$r->nomefantasia}}</h5>
            <p class="card-text">Endereço da revenda</p>
            <a href="#" class="btn btn-primary">Acessar página</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
