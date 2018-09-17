@extends('layouts.app')

@section('content')
<div class="container-fluid" id="banner_principal">
    @include('elements.homepage.anuncios_pesquisa')
</div>
<div class="container-fluid bg-secondary text-center text-white p-4">
  <div class="row mt-3">
      <div class="col-sm-12 text-center">
          <h1>Procure o seu veículo pela carroceria</h1>
          <hr>
      </div>
      <div class="col-sm-12 m-auto">
        <div class="container">
          @include('elements.homepage.carrocerias', ['marcas'=>$marcas])
        </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row mt-4">
    <div class="col-sm-8">
      @include('elements.homepage.chamada_ofertas')
    </div>
    <div class="col-sm-4">
      @include('elements.homepage.concessionaria')
    </div>
  </div>
  <hr>
  <div class="row">
      @include('elements.anuncios.carousel')
  </div>
</div>
@endsection
