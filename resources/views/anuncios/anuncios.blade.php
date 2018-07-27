@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Procurando por algo?</h1>
    <p class="lead">Explore os anúncios e encontre o que precisa</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h5>Filtros</h5>
      <small class="text-muted">Personalize a busca aos anúncios</small>
    </div>
    <div class="col-sm-9">
      <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Digite o que está procurando" aria-label="Digite o que está procurando" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button">Procurar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
       <ul class="nav flex-column">
        <li class="nav-item">
          <div class="mt-2">
            <div class="card card-body">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="moto" checked>
                <label class="custom-control-label" for="moto">Moto</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="carro" checked>
                <label class="custom-control-label" for="carro">Carro</label>
              </div>
             </div>
          </div>
        </li>
        <li class="nav-item mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Preço</span>
            </div>
            <input type="text" aria-label="Máximo" placeholder="Máximo" name="ano_maximo" class="form-control valor">
            <input type="text" aria-label="Mínimo" placeholder="Mínimo" name="ano_minimo" class="form-control valor">
          </div>
        </li>
        <li class="nav-item mt-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Ano</span>
            </div>
            <input type="text" aria-label="Máximo" placeholder="Máximo" name="ano_maximo" class="form-control">
            <input type="text" aria-label="Mínimo" placeholder="Mínimo" name="ano_minimo" class="form-control">
          </div>
        </li>
        <li class="nav-item mt-2">
          <button class="btn btn-primary">
            Filtrar
          </button>
         </li>
      </ul>
    </div>
    <div class="col-sm-9">
      <div class="list-group">
        @foreach($anuncios as $anuncio)
          @include('elements.anuncios.anuncio', ['anuncio'=> $anuncio])
        @endforeach
      </div>
      {{$anuncios->links()}}
    </div>
</div>
</div>

@endsection
