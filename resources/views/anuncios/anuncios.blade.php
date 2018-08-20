@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 0;">
  <div class="container">
    <h1 class="display-4">Procurando por algo?</h1>
    <p class="lead">Explore os anúncios e encontre o que precisa</p>
  </div>
</div>
<form>
<div class="row bg-primary mb-2">
  <div class="col-sm-12 p-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="text-white pt-1">Ordenar pesquisa</h4>
        </div>
        <div class="col-sm-6">
          <div class="form-inline">
            <select class="form-control mr-2" name="paginate">
              <option value="10">10 anúncios por página</option>
              <option value="20">20 anúncios por página</option>
              <option value="30">30 anúncios por página</option>
              <option value="30">40 anúncios por página</option>
            </select>
            <select class="form-control" name="order">
              <option value="visualizacoes">Ordenar por relevância</option>
              <option value="created_at">Ordenar por data de criação</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h5>Filtros</h5>
      <small class="text-muted">Personalize a busca aos anúncios</small>
    </div>
    <div class="col-sm-9">

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Digite o que está procurando" aria-label="Digite o que está procurando" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button">Procurar</button>
          </div>
        </div>

    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
        <ul class="nav flex-column">
         <li class="nav-item">
           <div class="mt-2">
             <div class="card card-body">
               <div class="custom-control custom-checkbox">
                 <input type="checkbox" class="custom-control-input" id="moto" name="tipo[]" value="moto" checked>
                 <label class="custom-control-label" for="moto">Moto</label>
               </div>
               <div class="custom-control custom-checkbox">
                 <input type="checkbox" class="custom-control-input" id="carro" name="tipo[]" value="carro" checked>
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
             <input type="text" aria-label="Máximo" placeholder="Máximo" name="valor_maximo" class="form-control valor">
             <input type="text" aria-label="Mínimo" placeholder="Mínimo" name="valor_minimo" class="form-control valor">
           </div>
         </li>
         <li class="nav-item mt-2">
           <div class="input-group">
             <div class="input-group-prepend">
               <span class="input-group-text">Ano</span>
             </div>
             <input type="number" aria-label="Máximo" placeholder="Máximo" name="ano_maximo" class="form-control">
             <input type="number" aria-label="Mínimo" placeholder="Mínimo" name="ano_minimo" class="form-control">
           </div>
         </li>
         <li class="nav-item mt-2">
               <select class="form-control select2" name="marca" id="marca">
                       <option value="">Selecione a marca</option>
               </select>
         </li>
         <li class="nav-item mt-2">
               <select class="form-control select2" name="modelo" id="modelo">
                       <option value="">Selecione o modelo</option>
               </select>
         </li>
         <li class="nav-item mt-2">
           <select class="form-control select2" name="versao" id="versao">
                   <option value="">Selecione a versão</option>
           </select>
         </li>
         <input type="hidden" name="mais_buscados" value="0">
         <li class="nav-item mt-2">
           <button class="btn btn-primary">
             Filtrar
           </button>
          </li>
       </ul>
      </form>
    </div>
    <div class="col-sm-9">
      <div class="list-group">
        @forelse($anuncios as $anuncio)
          @include('elements.anuncios.anuncio', ['anuncio'=> $anuncio])
        @empty
        <div class="alert alert-primary" role="alert">
          Nenhum anúncio encontrado com as especificações fornecidas.
        </div>
        @endforelse
      </div>
      {{$anuncios->links()}}
    </div>
</div>
</div>

@endsection
