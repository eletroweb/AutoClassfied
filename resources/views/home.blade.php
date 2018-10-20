@extends('layouts.app')

@section('content')
<div class="container-fluid" id="banner_principal">
    <anuncio-search-home></anuncio-search-home>
</div>
<div class="container-fluid bg-primary text-center text-white p-4 d-none d-sm-block">
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
    <div class="col-sm-12">
      <h1 class="mb-3 text-dark">Últimos anúncios de veículos</h1>
    </div>
      @include('elements.anuncios.carousel')
  </div>
</div>
@endsection
